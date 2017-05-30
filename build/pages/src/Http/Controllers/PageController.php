<?php namespace App\Build\Pages\Http\Controllers;

use App\Build\Base\Http\Controllers\BaseAdminController;
use Illuminate\Http\Request;
use App\Build\Pages\Repositories\Contracts\PageRepositoryContract;
use App\Build\Pages\Models\Page;

class PageController extends BaseAdminController
{
		protected $module = 'pages';
		
		protected $repository;

		public function __construct(PageRepositoryContract $repository)
		{
			parent::__construct();
			$this->repository = $repository;
		}

		public function index()
		{
			$this->assets->addCss([
				'src' => [
					// DataTable
					asset('admin/plugins/datatables/jquery.dataTables.min.css')
				]
			]);
			$this->assets->addJs([
				'src' => [
					// DataTable
					asset('admin/plugins/datatables/jquery.dataTables.min.js')
				]
			]);
			/**
			 * Parameter
			 */
			$select = ['*'];
			$order = ['id', 'asc'];
			$pagination = [
				'isPagination' => true,
				'perPage' => 15,
			];

			$this->data['pages'] = $this->repository->getPages($select, $order, $pagination);
			return $this->view('admin.list', $this->data);
		}

		public function create(Page $page)
		{
			$this->data['page'] = $page;
			return $this->view('admin.form', $this->data);
		}

		public function store(Request $request)
		{
			$attributes = $request->all(); 
			$this->repository->createPage($attributes);
			return redirect()->route('admin.pages');
		}

		public function update($id)
		{
			$page = $this->repository->findPageId($id);
			$this->data['page'] = $page;
			return $this->view('admin.form', $this->data);
		}

		public function edit(Request $request, $id)
		{
			$attributes = $request->all(); 
			$this->repository->updatePage($id, $attributes);
			return redirect()->route('admin.pages');
		}

		public function delete($id)
		{
			dd('store page');
		}

}
