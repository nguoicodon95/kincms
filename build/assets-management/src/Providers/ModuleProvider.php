<?php

namespace App\Build\AssetsManagement\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use App\Build\AssetsManagement\Facades\AssetsFacade;

class ModuleProvider extends ServiceProvider
{
    /**
    * @EN: Bootstrap the application service
    * @VN: Khởi động dịch vụ ứng dụng
    * @return void
    */
    public function boot()
    {
        // Load view
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'assets-management');
        // Load Language
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'assets-management');
        // Load migration
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        // Publish
        $this->publishes([
            __DIR__ . '/../../resources/public' => public_path(),
        ], 'public-assets');
        $this->publishes([
            __DIR__ . '/../../resources/views' => config('view.paths')[0] . '/vendor/assets-management',
        ], 'views');
        $this->publishes([
            __DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/assets-management'),
        ], 'lang');
        $this->publishes([
            __DIR__ . '/../../database' => base_path('database'),
        ], 'migrations');
    }

    /**
    * @EN: Register the application services.
    * @VN: Đăng ký dịch vụ ứng dụng
    * @return void
    */
    public function register()
    {
        // Load helper
        $this->loadHelpers();
        // get config
        $this->mergeConfigFrom(__DIR__ . '/../../config/assets-config.php', 'asset-config');
    
        //Register related facades
        $loader = AliasLoader::getInstance();
        $loader->alias('Assets', AssetsFacade::class);
    }

    protected function loadHelpers()
    {
        $helpers = $this->app['files']->glob(__DIR__.'/../../helpers/*.php');
        foreach($helpers as $helper) {
            require_once $helper;
        }
    }
}