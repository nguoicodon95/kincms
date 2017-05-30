<?php

namespace App\Build\Pages\Providers;

use Illuminate\Support\ServiceProvider;
use Artisan;

class InstallModuleServiceProvider extends ServiceProvider
{
    protected $module = 'App\Build\Pages';

    protected $moduleAlias = 'pages';

    /**
    * @EN: Bootstrap the application service
    * @VN: Khởi động dịch vụ ứng dụng
    * @return void
    */
    public function boot()
    {
        app()->booted(function () {
            $this->booted();
        });
    }

    /**
    * @EN: Register the application services.
    * @VN: Đăng ký dịch vụ ứng dụng
    * @return void
    */
    public function register()
    {
        //
    }

    private function booted()
    {
        $this->createSchema();
    }

    private function createSchema()
    {
        return Artisan::call('module:migration', ['alias' => $this->moduleAlias]);
    }
}