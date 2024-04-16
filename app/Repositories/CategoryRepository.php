<?php

namespace App\Repositories;

use RSolution\RCms\Repositories\EloquentRepository;
use App\Models\Category;

class CategoryRepository extends EloquentRepository
{
	const TYPE_BLOG = Category::TYPE_BLOG;
	const TYPE_MATERIAL = Category::TYPE_MATERIAL;
	const TYPE_CASE_STUDY = Category::TYPE_CASE_STUDY;
	const TYPE_WEBINAR_SERIES = Category::TYPE_WEBINAR_SERIES;

	const STATUS_ACTIVE = 1;
	const STATUS_INACTIVE = -1;

	/**
	 * get model
	 * @return string
	 */

	public function getModel()
	{
		return Category::class;
	}

	public function filter($request)
	{
		$query = $this->model::query();

		if (!empty($request->created_at))
			$query->whereDate('created_at', $request->created_at);

		if (!empty($request->type))
			$query->where('type', $request->type);

		if (!empty($request->status))
			$query->where('status', $request->status);

		return $query->latest()->paginate($request->limit ? $request->limit : 10);
	}

	public function findByKey($key, $value)
	{
		return $this->model->where($key, $value)->first();
	}

	public function getCategoryHasPost($limit = 20)
	{
		$categories = collect($this->model->with('posts')->where('type', self::TYPE_BLOG)->get());
		$data = [];
		foreach ($categories as $category) {
			$data[] = [
				'title' => $category->title,
				'slug' => $category->slug,
				'posts' => $category->posts->sortByDesc('created_at')->sortByDesc('featured')->take($limit)->values()
			];
		}
		return $data;
	}

	public function getCategoryHasCaseStudy($limit = 20)
	{
		$categories = collect($this->model
			->with('caseStudies')
			->where('status', self::STATUS_ACTIVE)
			->where('type', self::TYPE_CASE_STUDY)->get());
		$data = [];
		foreach ($categories as $category) {
			$data[] = [
				'title' => $category->title,
				'slug' => $category->slug,
				'posts' => $category->posts->sortByDesc('created_at')->sortByDesc('featured')->take($limit)->values()
			];
		}
		return $data;
	}

	public function getByKey($key, $value, $desc = '')
	{
		$query = $this->model->where($key, $value);

		if (!empty($desc))
			$query->orderBy($desc, 'desc');

		return $query->where("status", self::STATUS_ACTIVE)->get();
	}
}
