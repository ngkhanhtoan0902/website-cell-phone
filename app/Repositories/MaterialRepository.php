<?php

namespace App\Repositories;

use App\Models\Material;
use Illuminate\Support\Facades\DB;
use RSolution\RActiveCampaign\Services\ActiveCampaignService;
use RSolution\RCms\Repositories\EloquentRepository;

class MaterialRepository extends EloquentRepository
{
	const STATUS_ACTIVE = 1;
	const STATUS_INACTIVE = -1;
	const STATUS_SPECIAL = 2;

	/**
	 * get model
	 * @return string
	 */
	public function getModel()
	{
		return Material::class;
	}

	public function filter($request)
	{
		$query = $this->model::query();

		if (!empty($request->search))
			$query->where('title', $request->title);

		if (!empty($request->created_at))
			$query->whereDate('created_at', $request->created_at);

		if (!empty($request->status))
			$query->where('status', $request->status);

		return $query->latest()->paginate($request->limit ? $request->limit : 10);
	}

	public function getMaterialActive($request)
	{
		$query = $this->model::query()->with('category');

		if (!empty($request->type)) {
			$query->whereRelation('category', 'slug', $request->type);
		}

		if (!empty($request->search)) {
			$query->where('title', 'like', '%' . $request->search . '%');
		}

		return $query->where('status', '!=', self::STATUS_INACTIVE)->orderBy('created_at', 'desc')->paginate($request->limit ? $request->limit : 15);
	}

	public function subscribeMaterial($request)
	{
		$user = [
			'contact' => [
				'email'          => $request->email,
				'fieldValues' => [
					[
						'field' => config('r-activecampaign.list_id.fields.expertise'),
						'value' =>  $request->expertise,
					],
					[
						'field' => config('r-activecampaign.list_id.fields.job_title'),
						'value' =>  $request->job_title,
					],
				]
			]
		];

		$activeCampaign = new ActiveCampaignService;
		$activeCampaign->syncContact($user, false);

		return $activeCampaign->addUserToAutomation($request->email, $request->flow_id);
	}

	public function findByKey($key, $value)
	{
		return $this->model->where($key, $value)->first();
	}

	public function getByKey($key, $value)
	{
		return $this->model->with('category')->where($key, $value)->get();
	}

	public function uploadFile($request)
	{
		$type = $request->file->getClientOriginalExtension();
		$fileName = $request->material_file ?? $request->slug;
		$fileName = $fileName . '.' . $type;
		$path = $request->material_folder . '/' . $fileName;

		if (!file_exists($path)) {
			$request->file->move($request->material_folder, $fileName);
			return '/' . $request->material_folder . '/' . $fileName;
		}

		return null;
	}

	public function updateMaterial($request, $id)
	{
		$data = $this->find($id);
		if (isset($request->file)) {
			if ($data->url && file_exists(public_path($data->url))) unlink(public_path($data->url));

			$url = $this->uploadFile($request);

			if (!empty($url))
				$request->request->add(['url' => $url]);
		}

		$data->update($request->all());
	}

	public function getMaterialByIds(array $ids)
	{
		return $this->model->whereIn('id', $ids)->get();
	}

	public function getMaterialSpecial()
	{
		$query = $this->model::query()->with('category')->select('id', 'category_id', 'title', 'subtitle', 'slug','description', 'thumbnail', 'graphic', 'status');

		return $query->where('status', self::STATUS_SPECIAL)->orderBy('created_at', 'desc')->get();
	}
	
	public function getMaterialSitemap()
	{
		return $this->model->where('status', self::STATUS_ACTIVE)->orderBy('updated_at', 'desc')->get();
	}
}
