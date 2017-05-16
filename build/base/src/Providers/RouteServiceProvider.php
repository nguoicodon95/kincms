<?php 

namespace App\Build\Base\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
   protected $namespace = 'App\Build\Base\Http\Controllers';

    /**
    * @EN: Bootstrap the application service
    * @VN: Khởi động dịch vụ ứng dụng
    * @return void
    */
    public function boot()
    {
        parent::boot();
    }

    /**
    * @EN: Define the routes for the application
    * @VN: Xác định các tuyến đường cho ứng dụng
    * @return void
    */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace' => $this->namespace
        ], function () {
            require __DIR__ . '/../../routes/web.php';
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
             'middleware' => 'api',
             'namespace' => $this->namespace,
             'prefix' => 'api'
         ], function ($router) {
            require __DIR__ . '/../../routes/api.php';
        });
    }
}