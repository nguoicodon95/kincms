<?php

namespace App\Build\ModulesManagement\Providers;

use Illuminate\Support\ServiceProvider;
use App\Build\ModulesManagement\Facades\ModulesManagementFacade;
use Illuminate\Foundation\AliasLoader;

class ModuleProvider extends ServiceProvider
{
    /**
    * @return void
    */
    public function boot() {

    }
    
    /**
    * @return void
    */
    public function register() {
        // Load config
        $this->mergeConfigFrom(__DIR__ . '/../../config/module-config.php', 'module-config');
        //Load helpers
        $this->loadHelpers();

        $this->app->register(LoadModulesServiceProvider::class);
        $this->app->register(ConsoleServiceProvider::class);

        //Register related facades
        $loader = AliasLoader::getInstance();
        $loader->alias('ModulesManagement', ModulesManagementFacade::class);
    }

    private function loadHelpers() {
        $helpers = $this->app['files']->glob(__DIR__ . '/../../helpers/*.php');
        foreach ($helpers as $helper) {
            require_once $helper;
        }
    }

}