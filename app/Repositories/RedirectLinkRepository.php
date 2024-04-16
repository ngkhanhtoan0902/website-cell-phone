<?php

namespace App\Repositories;

use RSolution\RCms\Repositories\EloquentRepository;
use App\Models\RedirectLink;


class RedirectLinkRepository extends EloquentRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return RedirectLink::class;
    }

    public function filter($request)
    {
        $query = $this->model::query();

        if (!empty($request->search))
            $query->where('issue_link', 'like', '%' . $request->search . '%');

        return $query->orderBy('created_at', 'desc')->paginate($request->limit ? $request->limit : 10);
    }

    public function getDataByIssueLink($issueLink)
    {
		$issueLink = urldecode($issueLink);
        $redirect = $this->model->where('issue_link', $issueLink)->first();

        if ($redirect) return $redirect;

        return null;
    }
}