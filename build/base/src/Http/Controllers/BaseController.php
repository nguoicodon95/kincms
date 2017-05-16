<?php namespace App\Build\Base\Http\Controllers;

use App\Http\Controllers\Controller;

abstract class BaseController extends Controller
{
    protected $data = [];

    public function __construct()
    {
        //
    }

    abstract public function view($viewName, $data = null);
}
