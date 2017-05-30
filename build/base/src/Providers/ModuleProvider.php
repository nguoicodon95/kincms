<?php 

namespace App\Build\Base\Providers;

use Illuminate\Support\ServiceProvider;
use App\Build\ModulesManagement\Providers\ModuleProvider as ModulesManagementProvider;
use App\Build\Pages\Providers\ModuleProvider as PageProvider;

class ModuleProvider extends ServiceProvider
{
   /**
	* @return void
	*/
	public function boot() {
		$this->loadViewsFrom(__DIR__ . '/../../resources/views', 'base');
		
		// Publish
		$this->publishes([
			__DIR__ . '/../../resources/assets' => resource_path('assets/modules/base'),
		], 'base-assets');

	}
	
	/**
	* @return void
	*/
	public function register() {
		// Load config
		$this->mergeConfigFrom(__DIR__ . '/../../config/base-admin.php', 'base-admin');
	   
		/**
		* @register provider
		*/
		$this->app->register(ModulesManagementProvider::class);
		$this->app->register(PageProvider::class);

		/*Load helper*/
		$this->loadHelpers();
	}

	private function loadHelpers() {
		$helpers = $this->app['files']->glob(__DIR__ . '/../../helpers/*.php');
		foreach ($helpers as $key => $helper) {
			require_once $helper;
		}
	}
}