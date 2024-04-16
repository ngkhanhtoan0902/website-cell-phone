<?php

namespace App\Repositories;

use RSolution\RCms\Repositories\EloquentRepository;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Session;

class PostRepository extends EloquentRepository
{
	const STATUS_ACTIVE = 1;
	const STATUS_INACTIVE = 2;

	const FEATURED = 1;
	const NORMAL = 0;

	const SPECIAL = 1;
	const SPECIAL_TOP = 2;
	const SPECIAL_CATEGORY = 3;

	/** 
	 * get model
	 * @return string
	 */
	public function getModel()
	{
		return Post::class;
	}

	public function filter($request)
	{
		$query = $this->model::query();

		if (!empty($request->status))
			$query->where('status', $request->status);

		if (!empty($request->search))
			$query->where('title', 'like', '%' . $request->search . '%');

		if (!empty($request->created_at))
			$query->whereDate('created_at', $request->created_at);

		if (!empty($request->featured))
			$query->where('featured', $request->featured);

		if (!empty($request->special))
			$query->where('special', $request->special);

		if (!empty($request->type))
			$query->where('type', $request->type);

		return $query->orderBy('special', 'desc')->orderBy('featured', 'desc')->orderBy('status', 'asc')->orderBy('created_at', 'desc')->paginate($request->limit ? $request->limit : 10);
	}

	public function add($request)
	{
		if ($request->special == self::SPECIAL_TOP) {
			$current = $this->model->where('special', self::SPECIAL_TOP)->get()->pluck('id');
			$this->model->whereIn('id', $current)->update(['special' => self::NORMAL]);
		}
		return $this->create($request->all());
	}

	public function updateCustom($id, $request)
	{
		if ($request->special == self::SPECIAL_TOP) {
			$current = $this->model->where('special', self::SPECIAL_TOP)->get()->pluck('id');
			$this->model->whereIn('id', $current)->update(['special' => self::NORMAL]);
		}

		return $this->update($id, $request->all());
	}

	public function getPostBySlug($slug)
	{
		return $this->model->with(['tags'])->where('status', self::STATUS_ACTIVE)->where('slug', $slug)->first();
	}

	public function getPostRelevant(Post $post, $limit = 5)
	{
		return $this->model->where('status', self::STATUS_ACTIVE)
			->where('id', '!=', $post->id)
			->where('category_id', $post->category_id)
			->select('id', 'title', 'slug', 'thumbnail', 'meta_description', 'tag', 'featured', 'status', 'created_at', 'author_info', 'type', 'extra_info', 'category_id', 'special')
			->inRandomOrder()
			->limit($limit)
			->get();
	}

	public function getPostActive($request)
	{
		$query = $this->model::query()->where('status', self::STATUS_ACTIVE);

		if (!empty($request->search))
			$query->where('title', 'like', '%' . $request->search . '%')
				->orWhere('tag', 'like', '%' . $request->search . '%')
				->distinct();

		return $query->orderBy('created_at', 'desc')->get();
	}


	public function getLatestPost($request)
	{
		$query = $this->model::query()->where('status', self::STATUS_ACTIVE)->with('category');

		empty($request->limit) || $request->limit > 50  ? $query->limit(1) : $query->limit($request->limit);

		$data = $query->orderBy('created_at', 'desc')->get();

		for ($i = 0; $i < count($data); $i++) {
			$content = null;
			if (!empty($request->detail))
				$content = $request->detail == "false" ? strip_tags($data[$i]->content) : $data[$i]->content;

			$data[$i] = (object)[
				'title'         => $data[$i]->title,
				'snippet'       => $data[$i]->meta_description,
				'tags'          => explode(',', $data[$i]->tag),
				'content' 		=> $content,
				'author'        => $data[$i]->author_info,
				'url'           => route('blog.detail', $data[$i]->slug),
				'thumbnail'     => $data[$i]->thumbnail,
				'category'		=> @$data[$i]->category
			];
		}

		return  $data;
	}

	public function getUserHasPost()
	{
		return (new User)->has('posts')->get();
	}

	public function getArticleSitemap()
	{
		return $this->model->where('status', self::STATUS_ACTIVE)->orderBy('updated_at', 'desc')->get();
	}

	public function getPostSpecial($limit = 20, $types = [])
	{
		$query = $this->model->with('category')->where('status', self::STATUS_ACTIVE);

		if (!empty($types)) $query->whereIn('special', $types);
		else $query->where('special', '!=', self::NORMAL);

		return $query->orderBy('special', 'desc')
			->orderBy('created_at', 'desc')
			->limit($limit)
			->get();
	}

	public function searchPost($request)
	{
		$query = $this->model::query();
		$query->with(['category', 'tags']);

		if (!empty($request->search)) {
			$query->where(function ($q) use ($request) {
				return $q->where('title', 'like', '%' . $request->search . '%')
					->orWhere('meta_description', 'like', '%' . $request->search . '%');
			});
		}

		if (!empty($request->tag)) {
			$query->whereRelation('tags', 'slug', $request->tag);
		}

		if (!empty($request->category))
			$query->whereRelation('category', 'slug', $request->category);

		return $query->where('status', self::STATUS_ACTIVE)->orderBy('featured', 'desc')->orderBy('created_at', 'desc')->paginate($request->limit ? $request->limit : 10);
	}

	public function getPostByCategory($cate, $limit = 20)
	{
		return $this->model->with('category')
			->whereRelation('category', 'slug', $cate)
			->where('status', self::STATUS_ACTIVE)
			->orderBy('special', 'desc')
			->orderBy('featured', 'desc')
			->orderBy('created_at', 'desc')
			->paginate($limit);
	}

	public function getPostByTag($tag, $limit = 20)
	{
		return $this->model->with('tags')
			->whereRelation('tags', 'slug', $tag)
			->where('status', self::STATUS_ACTIVE)
			->orderBy('featured', 'desc')
			->orderBy('created_at', 'desc')
			->paginate($limit);
	}

	public function getPostByIds(array $ids)
	{
		return $this->model->whereIn('id', $ids)->get();
	}

	public function getPostRecent($limit = 6)
	{
		return $this->model->with('category')
			->where('status', self::STATUS_ACTIVE)
			->orderBy('created_at', 'desc')
			->paginate($limit);
	}

	public function incrementViewCount(Post $post)
	{
		$lastViewedAt = Session::get('post_last_viewed_' . $post->id);

		if (!$lastViewedAt || now()->diffInMinutes($lastViewedAt) >= 10) {
			$post->count_view++;
			$post->save();
			Session::put('post_last_viewed_' . $post->id, now());
		}
	}

	public function getPostMostView($limit = 20)
	{
		return $this->model->with('category')
			->where('status', self::STATUS_ACTIVE)
			->orderBy('count_view', 'desc')
			->orderBy('created_at', 'desc')
			->paginate($limit);
	}

	public function getPostToSelect()
	{
		return $this->model->where('status', self::STATUS_ACTIVE)->select('id', 'title')->get();
	}
	public function getByKey($tag)
	{
		return $this->model->with('tags')
			->whereRelation('tags', 'slug', $tag)
			->where('status', self::STATUS_ACTIVE)
			->orderBy('featured', 'desc')
			->orderBy('created_at', 'desc')->get();			
	}
}
