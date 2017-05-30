<?php namespace App\Build\Base\Http\Controllers;

use Assets;

class BaseAdminController extends BaseController
{
    protected $assets;
    protected $data = [];

    public function __construct () {
        parent::__construct();
        $this->assets = Assets::getAssetsFrom('admin');
    }

    public function view($viewName, $data = null) {
        if(is_null($data))
            $data = $this->data;
            
        if(property_exists($this, 'module'))
            return view($this->module.'::'.$viewName, $data);
        
        return view($viewName, $data);
    }
}
