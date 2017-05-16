<?php

namespace DummyNamespace\Providers;

use Illuminate\Support\ServiceProvider;

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
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'DummyAlias');
        // Load Language
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'DummyAlias');
        // Load migration
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        // Publish
        $this->publishes([
            __DIR__ . '/../../resources/assets' => resource_path('assets'),
            __DIR__ . '/../../resources/public' => public_path(),
        ], 'assets');
        $this->publishes([
            __DIR__ . '/../../resources/views' => config('view.paths')[0] . '/vendor/DummyAlias',
        ], 'views');
        $this->publishes([
            __DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/DummyAlias'),
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
        
    }

    protected function loadHelpers()
    {
        $helpers = $this->app['files']->glob(__DIR__.'/../../helpers/*.php');
        foreach($helpers as $helper) {
            require_once $helper;
        }
    }
}