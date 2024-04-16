<?php

namespace App\Repositories;

use RSolution\RCms\Repositories\EloquentRepository;
use App\Models\Tag;


class TagRepository extends EloquentRepository
{
    const TYPE_WEBINAR_SERIES = '2';

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Tag::class;
    }

    public function filter($request)
    {
        $query = $this->model::query();

        return $query->orderBy('created_at', 'desc')->paginate($request->limit ? $request->limit : 10);
    }

    public function findByKey($key, $value)
	{
		return $this->model->where($key, $value)->first();
	}
    public function getTagSitemap()
	{
        return $this->model->orderBy('updated_at', 'desc')->get();
	}
    public function getTagByType($type)
    {
        return $this->model->where('type', $type)->get();
    }
}