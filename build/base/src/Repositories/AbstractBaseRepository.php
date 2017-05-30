<?php namespace App\Build\Base\Repositories;

use App\Build\Base\Repositories\Contracts\AbstractBaseRepositoryContract;
use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

abstract class AbstractBaseRepository  implements AbstractBaseRepositoryContract
{
	protected $model;
	public function __construct($model) {
		$this->model = $model;
	}

	public function get(array $select = ['*']) {
		return $this->model->get($select);
	}

	public function paginate($perPage = null, $select = ['*'], $pageName = 'page', $page = null)  {
		return $this->model->paginate($perPage, $select, $pageName, $page);
	}

	public function order(array $order = ['id', 'DESC']) {
		if(empty($order)) {
			$order = ['id', 'DESC'];
		}
		list($orderField, $orderType) = $order;
		return $this->model->orderBy($orderField, $orderType);
	}

	public function where(array $parameter = [])
	{
		# code...
	}

	public function create(array $attributes) {
		return $this->model->create($attributes);
	}

	public function update($id, array $attributes) {
		$row = $this->model->find($id);
		try {
			$row->update($attributes);
		} catch(\Exception $e) {
			$error = $e->getMessage();
	            	Log::error($error);
	            dd($error);
	            return false;
		}
		return true;
	}

	public function findById($id, array $select = ['*']) {
		return $this->model->find($id, $select);
	}

	public function findBySlug($slug, array $select = ['*']) {
		return $this->model->where('slug', $slug)->first($select);
	}

	public function destroy($id) {
		if(is_array($id)) {
			$rows = $this->model->whereIn('id', $id);
		} else {
			$rows = $this->model->find($id);
		}
		try {
			$rows->delete();
		} catch(\Exception $e) {
			$error = $e->getMessage();
	            	Log::error($error);
	            dd($error);
	            return false;
		}
		return true;
	}
}
