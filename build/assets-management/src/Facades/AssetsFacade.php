<?php namespace App\Build\AssetsManagement\Facades;

use Illuminate\Support\Facades\Facade;
use App\Build\AssetsManagement\Assets;

class AssetsFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Assets::class;
    }
}
