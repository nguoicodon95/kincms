<?php namespace App\Build\ModulesManagement\Providers;

use Illuminate\Support\ServiceProvider;
use File;

class LoadModulesServiceProvider extends ServiceProvider
{
    protected $modules = [];

    protected $notLoadedModules = [];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->modules = get_all_module_information();
        foreach ($this->modules as $module) {
            if (array_get($module, 'enabled', null) === true) {
                /**
                 * Register module
                 */
                $moduleProvider = $module['namespace'] . '\Providers\ModuleProvider';
                if (class_exists($moduleProvider)) {
                    $this->app->register($moduleProvider);
                } else {
                    // $this->notLoadedModules[] = $moduleProvider;
                    dd("Class $moduleProvider không tồn tại");
                }
            }
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

}
