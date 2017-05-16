<?php namespace App\Build\ModulesManagement\Facades;

use Illuminate\Support\Facades\Facade;
use App\Build\ModulesManagement\Support\ModulesManagement;

class ModulesManagementFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return ModulesManagement::class;
    }
}
