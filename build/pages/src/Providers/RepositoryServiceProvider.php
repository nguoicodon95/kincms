<?php

namespace App\Build\Pages\Providers;

use Illuminate\Support\ServiceProvider;
use App\Build\Pages\Repositories\Contracts\PageRepositoryContract;
use App\Build\Pages\Repositories\PageRepository;
use App\Build\Pages\Models\Page;

class RepositoryServiceProvider extends ServiceProvider
{
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
    		$this->app->bind(PageRepositoryContract::class, function () {
    			$repository = new PageRepository(new Page());

    			return $repository; 
    		});
    }
}