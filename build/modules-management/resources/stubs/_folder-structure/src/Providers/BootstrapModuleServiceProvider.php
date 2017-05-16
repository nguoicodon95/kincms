<?php

namespace DummyNamespace\Providers;

use Illuminate\Support\ServiceProvider;

class BootstrapModuleServiceProvider extends ServiceProvider
{
    protected $module = 'DummyNamespace';

    /**
    * @EN: Bootstrap the application service
    * @VN: Khởi động dịch vụ ứng dụng
    * @return void
    */
    public function boot()
    {
        //
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
        // setup module
    }
}