<?php namespace App\Build\Base\Http\Controllers;


class DashboardController extends BaseAdminController
{
    protected $module = 'base';

    public function __construct() {
        parent::__construct();

        $this->assets->addCss([
            'src' => [
                // 'jvectormap'
                asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css'),
            ],
        ]);
    }

    public function index() {
        $data['name'] = 'Kin';
        return $this->view('admin.dashboard', $data);
    }

}
