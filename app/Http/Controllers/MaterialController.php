<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\MaterialRepository;
use App\Repositories\PostRepository;

class MaterialController extends Controller
{
	private $materialRepository;
	private $categoryRepository;
	private $postRepository;
	private $messageValidate = [
		'required' => ' The :attribute field is required.',
		'unique' => ' The :attribute field must be unique. Please chose another :attribute !',
		'image' => ' Invalid :attribute ',
		'max' => ' The maximum of :attribute is :max',
		'alpha' => "The :attribute field shouldn't contain special characters",
		'material_folder.required_with' => 'The material folder field is required when file is present.',
		'file.required_with' => 'The file field is required when material folder is present.',
		'file.mimes' => 'The file must be a document or PDF file.',
		
	];

	public function __construct()
	{
		$this->materialRepository = new MaterialRepository;
		$this->categoryRepository = new CategoryRepository;
		$this->postRepository = new PostRepository;
	}

	public function index(Request $request)
	{
		return view('cms.materials.index', [
			'data' => $this->materialRepository->filter($request),
			'categories' => $this->categoryRepository->getByKey('type', 'material')
		]);
	}

	public function show(Request $request, $slug = null)
	{
		if (!$slug) $slug = $request->slug;

		$data = $this->materialRepository->findByKey('slug', $slug);

		if (!$data || $data->status == $this->materialRepository::STATUS_INACTIVE) return abort('404');

		$related = !empty($data->related_ids) ? $this->materialRepository->getMaterialByIds($data->related_ids) : [];

		$blog = !empty($data->related_blog_ids) ? $this->postRepository->getPostByIds($data->related_blog_ids) : [];

		$isSubmitted = isset($request->isSubmitted) ? true : false;

		return view('pages.materials.download', compact('data', 'related', 'blog', 'isSubmitted'));
	}

	public function create(Request $request)
	{
		$categories = $this->categoryRepository->getByKey('type', 'material');

		$materials = Material::select('title', 'id')->where('status', $this->materialRepository::STATUS_ACTIVE)->get();
		$blog = $this->postRepository->getPostToSelect();

		return view('cms.materials.create', compact('categories', 'materials', 'blog'));
	}

	public function store(Request $request)
	{
		$this->validate(
			$request,
			[
				'title' => 'bail|required|max:255|unique:materials,title,',
				'slug' => 'bail|required|max:255',
				'thumbnail' => 'bail|required',
				'form_submit' => 'bail|required',
				'material_folder' => 'bail|required_with:file',
				'material_file' => 'bail',
				'file' => 'bail|required_with:material_folder|mimes:doc,docx,pdf',
			],
			$this->messageValidate
		);
		if (!empty($request->file)) {
			$url = $this->materialRepository->uploadFile($request);
			if (!empty($url)) {
				$request->request->add(['url' => $url]);
			} else {
				return redirect()->back()->with(['error' => 'Upload file already exists']);
			}
		}

		$request['preview'] = explode(",", $request->preview);
		$data = $this->materialRepository->create($request->all());
		return redirect()->route('rcms.materials.edit', $data->id)->with(['success' => 'Success']);
	}

	public function edit($id, Request $request)
	{
		$data = $this->materialRepository->find($id);
		$categories = $this->categoryRepository->getByKey('type', 'material');

		$materials = Material::select('title', 'id')->where('status', $this->materialRepository::STATUS_ACTIVE)->get();
		$blog = $this->postRepository->getPostToSelect();

		return view('cms.materials.edit', compact('data', 'categories', 'materials', 'blog'));
	}

	public function update(Request $request, $id)
	{
		$data = $this->materialRepository->find($id);
		$rules = [
			'title' => 'bail|required|max:255|unique:materials,title,' . $id,
			'slug' => 'bail|required|max:255',
			'thumbnail' => 'bail|required',
			'form_submit' => 'bail|required',
			'material_file' => 'bail',
		];

		if($request->file) {
			$rules['material_folder'] = 'bail|required';
			$rules['file'] = 'bail|required|mimes:doc,docx,pdf';
		}

		$this->validate(
			$request,
			$rules,
			$this->messageValidate
		);

		$request['preview'] = explode(",", $request->preview);

		$this->materialRepository->updateMaterial($request, $id);

		return back()->with(['success' => 'Success']);
	}

	public function destroy($id)
	{
		$data = $this->materialRepository->find($id);
		if (!empty($data->url) && file_exists(public_path($data->url))) {
			unlink(public_path($data->url));
		}

		$data->delete();

		return back()->with(['success' => 'Success']);
	}

	public function getMaterialPage(Request $request)
	{
		$data['categories'] = $this->categoryRepository->getByKey('type', 'material');
		$data['materials'] = $this->materialRepository->getMaterialActive($request);
		$data['special'] = $this->materialRepository->getMaterialSpecial();
		return view('/pages/materials/index', compact('data'));
	}

	public function getMaterialCategory($category, Request $request)
	{
		$request->request->add(['type' => $category]);
		$data['materials'] = $this->materialRepository->getMaterialActive($request);
		$data['categories'] = $this->categoryRepository->getByKey('type', 'material');
		$data['category'] = $data['categories']->where('slug', $category)->first();
		return view('/pages/materials/index', compact('data'));
	}
}
