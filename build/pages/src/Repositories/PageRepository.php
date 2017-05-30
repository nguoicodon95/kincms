<?php namespace App\Build\Pages\Repositories;

use App\Build\Base\Repositories\AbstractBaseRepository;
use App\Build\Pages\Repositories\Contracts\PageRepositoryContract;
use App\Build\Pages\Models\Page;

class PageRepository extends AbstractBaseRepository implements PageRepositoryContract
{
	public function getPages(array $select = ['*'], array $order = ['id', 'DESC'], array $pagination = []) {
		$model = $this->order($order);
		/**
		 * Base @param $pagination keys in array
		 */
		$basePagination = [
			'isPagination' => false,
			'perPage' => 10,
			'pageName' => 'page',
			'page' => null
		];
		$pagination = array_merge($basePagination, $pagination);
		if($pagination['isPagination']) {
			return $model->paginate($pagination['perPage'], $select, $pagination['pageName'], $pagination['page']);
		}
		return $model->get($select, $order);
	}

	public function createPage(array $attributes = []) {
		return $this->create($attributes);
	}

	public function updatePage($id, array $attributes = []) {
		return $this->update($id, $attributes);
	}

	public function destroyPage($id) {
		return $this->destroy($id);
	}

	public function findPageId($id, array $select = ['*']) {
		return $this->findById($id, $select);
	}
}
