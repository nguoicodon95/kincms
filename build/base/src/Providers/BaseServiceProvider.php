<?php 

namespace App\Build\Base\Providers;

use Illuminate\Support\ServiceProvider;

class BaseServiceProvider extends ServiceProvider
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
        /**
        * @register provider
        */
        $this->app->register(ModuleProvider::class);
        $this->app->register(RouteServiceProvider::class);
    }

}