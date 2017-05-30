<?php namespace App\Build\Base\Http\Controllers;


class DashboardController extends BaseAdminController
{
    protected $module = 'base';

    public function __construct() {
        parent::__construct();

        $this->assets->addCss([
            'src' => [
                // Jvectormap
                asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css'),
            ],
        ]);

        $this->assets->addJs([
            'src' => [
                // Jvectormap
                asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'),
                asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'),
                // Sparkline
                asset('admin/plugins/sparkline/jquery.sparkline.min.js'),
                // ChartJS 1.0.1
                asset('admin/plugins/chartjs/Chart.min.js'),
                asset('modules/base/js/pages/dashboard.js'),
            ],
        ]);
    }

    public function index() {
        $data['name'] = 'Kin';
        return $this->view('admin.dashboard', $data);
    }

}
