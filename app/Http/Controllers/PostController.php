<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\MaterialRepository;
use Illuminate\Http\Request;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;

class PostController extends Controller
{
	const PAGE_LIMIT = 20;
	const ACTIVE = 1;
	const INACTIVE = 2;
	const FEATURED = 1;

	private $categoryRepository;
	private $postRepository;
	private $materialRepository;
	private $tagRepository;
	private $messageValidate = [
		'required' => ' The :attribute field is required.',
		'unique'   => ' The :attribute field must be unique. Please chose another :attribute !',
		'image'    => ' Invalid :attribute ',
		'max'      => ' The maximum of :attribute is :max',
		'alpha'    => "The :attribute field shouldn't contain special characters"
	];

	public function __construct()
	{
		$this->postRepository = new PostRepository;
		$this->categoryRepository = new CategoryRepository;
		$this->materialRepository = new MaterialRepository;
		$this->tagRepository = new TagRepository;
	}

	public function create()
	{
		$categories = $this->categoryRepository->getAll();
		$tags = $this->tagRepository->getAll();
		$posts = $this->postRepository->getPostToSelect();
		return view('cms.posts.create', compact('categories', 'tags', 'posts'));
	}

	public function index(Request $request)
	{
		return view('cms.posts.index', [
			'data'    => $this->postRepository->filter($request),
		]);
	}

	public function show($slug)
	{
		$data['article'] = $this->postRepository->getPostBySlug($slug);

		if ($data['article']) {
			$this->postRepository->incrementViewCount($data['article']);
			$data['related'] = !empty($data['article']->related_ids) ? $this->postRepository->getPostByIds($data['article']->related_ids) : [];
			return view('/pages/blog/detail', compact('data'));
		}

		return abort('404');
	}

	public function edit($id)
	{
		$categories = $this->categoryRepository->getAll();
		$data = $this->postRepository->find($id);
		$tags = $this->tagRepository->getAll();
		$tagged = $data->tags->pluck('pivot.tag_id')->toArray();
		$posts = $this->postRepository->getPostToSelect();
		return $data ? view('cms.posts.edit', compact('data', 'categories', 'tags', 'tagged', 'posts')) : abort('404');
	}

	public function store(Request $request)
	{
		$this->validate(
			$request,
			[
				'title'             => 'bail|required|max:255|unique:posts,title,',
				'meta_description'  => 'bail|max:160',
				'content'           => 'bail|required',
				'slug'              => 'bail|required|max:255|unique:posts,slug,',
				'thumbnail'         => 'bail|required',
			],
			$this->messageValidate
		);

		$data = $this->postRepository->add($request);
		$data->tags()->attach($request->tags);
		return redirect()->route('rcms.posts.edit', $data->id)->with(['success' => 'Success']);
	}

	public function destroy($id)
	{
		$this->postRepository->delete($id);
		return back()->with(['success' => 'Success']);
	}

	public function update(Request $request, $id)
	{
		$this->validate(
			$request,
			[
				'title'             => 'bail|required|max:255|unique:posts,title,' . $id,
				'meta_description'  => 'bail|max:160',
				'content'           => 'bail|required',
				'slug'              => 'bail|required|max:255|unique:posts,slug,' . $id,
				'thumbnail'         => 'bail|required',
			],
			$this->messageValidate
		);

		if(!isset($request->related_ids)) $request->request->add(['related_ids' => null ]);
		$data = $this->postRepository->updateCustom($id, $request);
		$data->tags()->sync($request->tags);
		return back()->with(['success' => 'Success']);
	}

	public function updateField(Request $request)
	{

		if (isset($request->created_at))
			$this->validate($request, [
				'created_at' => "required|date"
			]);

		if (isset($request->status))
			$this->validate($request, [
				'status' => "required|in:" . self::ACTIVE . "," . self::INACTIVE
			]);

		return $this->postRepository->updateFillable($request->id, $request);
	}

	public function getBlog(Request $request)
	{
		$specialPosts = $this->postRepository->getPostSpecial(4, [$this->postRepository::SPECIAL_TOP, $this->postRepository::SPECIAL]);
		$data['special_top'] = $specialPosts->where('special', $this->postRepository::SPECIAL_TOP)->first();
		$data['special'] = $specialPosts->where('special', $this->postRepository::SPECIAL)->values();
		$data['recent'] = $this->postRepository->getPostRecent(3);
		$data['categories'] = $this->categoryRepository->getCategoryHasPost(3);
		$data['material'] = $this->materialRepository->getMaterialSpecial()->first();
		return view('/pages/blog/index', compact('data'));
	}

	public function getBlogRecent(Request $request)
	{
		$data['posts'] = $this->postRepository->getPostRecent();
		return view('/pages/blog/recent', compact('data'));
	}

	public function searchBlog(Request $request)
	{
		$data['posts'] = $this->postRepository->searchPost($request);
		$data['mostView'] = $this->postRepository->getPostMostView(6);
		$data['categories'] = $this->categoryRepository->getByKey('type', 'blog');
		if (isset($request->tag) && $request->tag) $data['tag'] = $this->tagRepository->findByKey('slug', $request->tag);
		return view('/pages/blog/search', compact('data'));
	}

	public function getBlogByCategory(Request $request, $categorySlug)
	{
		$special = [$this->postRepository::SPECIAL, $this->postRepository::SPECIAL_TOP, $this->postRepository::SPECIAL_CATEGORY];
		$data['categories'] = $this->categoryRepository->getByKey('type', 'blog');
		$data['category'] = array_column($data['categories']->toArray(), null, 'slug')[$categorySlug] ?? null;

		if( !empty($data['category']) ){
			$data['posts'] = $this->postRepository->getPostByCategory($categorySlug, 6);
			$data['special_top'] = $data['posts']->whereIn('special', $special)->sortByDesc('special')->first();
			$data['material'] = $this->materialRepository->getMaterialSpecial()->first();
			return view('/pages/blog/category', compact('data'));
		}
		
		return abort('404');
	}

	public function getBlogByTag(Request $request, $tag)
	{
		$data['tag'] = $this->tagRepository->findByKey('slug', $tag);
		if (!empty($data['tag'])) {
			$data['posts'] = $this->postRepository->getPostByTag($tag, 6);
			$data['mostView'] = $this->postRepository->getPostMostView(6);
			return view('/pages/blog/tag', compact('data'));
		}

		return abort('404');
	}
}
