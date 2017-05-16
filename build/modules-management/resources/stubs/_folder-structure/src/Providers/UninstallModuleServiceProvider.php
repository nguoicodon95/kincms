<?php

namespace DummyNamespace\Providers;

use Illuminate\Support\ServiceProvider;
use Artisan;

class UninstallModuleServiceProvider extends ServiceProvider
{
    protected $module = 'DummyNamespace';

    protected $moduleAlias = 'DummyAlias';

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
        $this->dropSchema();
    }
    private function dropSchema()
    {
        return Artisan::call('module:migrate:rollback', ['alias' => $this->moduleAlias]);
    }
}