<?php

namespace App\Build\ModulesManagement\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Migrations\Migrator;
use App\Build\ModulesManagement\Services\ModuleMigrator;

class ConsoleServiceProvider extends ServiceProvider
{
    public function boot() {

    }

    public function register() {
        $this->allCommands();
        $this->registerModuleMigrator();
        $this->registerRollbackCommand();
    }

    private function allCommands() {
        $all = [
            // setup
            'module_manager.console.command.get-list-module' => \App\Build\ModulesManagement\Console\Commands\GetAllModulesCommand::class,
            'module_manager.console.command.install-module' => \App\Build\ModulesManagement\Console\Commands\InstallModuleCommand::class,
            'module_manager.console.command.enabled-module' => \App\Build\ModulesManagement\Console\Commands\EnableModuleCommand::class,
            'module_manager.console.command.disabled-module' => \App\Build\ModulesManagement\Console\Commands\DisableModuleCommand::class,
            'module_manager.console.command.uninstall-module' => \App\Build\ModulesManagement\Console\Commands\UninstallModuleCommand::class,
            //make
            'module_manager.console.generator.make-module' => \App\Build\ModulesManagement\Console\Generators\MakeModule::class,
            'module_manager.console.generator.make-console' => \App\Build\ModulesManagement\Console\Generators\MakeCommand::class,
            'module_manager.console.generator.make-controller' => \App\Build\ModulesManagement\Console\Generators\MakeController::class,
            'module_manager.console.generator.make-facade' => \App\Build\ModulesManagement\Console\Generators\MakeFacade::class,
            'module_manager.console.generator.make-middleware' => \App\Build\ModulesManagement\Console\Generators\MakeMiddleware::class,
            'module_manager.console.generator.make-migration' => \App\Build\ModulesManagement\Console\Generators\MakeMigration::class,
            'module_manager.console.generator.make-model' => \App\Build\ModulesManagement\Console\Generators\MakeModel::class,
            'module_manager.console.generator.make-provider' => \App\Build\ModulesManagement\Console\Generators\MakeProvider::class,
            'module_manager.console.generator.make-repository' => \App\Build\ModulesManagement\Console\Generators\MakeRepository::class,
            'module_manager.console.generator.make-request' => \App\Build\ModulesManagement\Console\Generators\MakeRequest::class,
            'module_manager.console.generator.make-service' => \App\Build\ModulesManagement\Console\Generators\MakeService::class,
            'module_manager.console.generator.make-support' => \App\Build\ModulesManagement\Console\Generators\MakeSupport::class,
            'module_manager.console.generator.make-view' => \App\Build\ModulesManagement\Console\Generators\MakeView::class,
            // migrate
            'module_manager.console.command.module-migrate' => \App\Build\ModulesManagement\Console\Migrations\ModuleMigrateCommand::class
        ];
        foreach($all as $slug => $class) {
            $this->app->singleton($slug, function($app) use($slug, $class) {
                return $app[$class];
            });

            $this->commands($slug);
        }
    }

    /**
     * Register the "rollback" migration command.
     *
     * @return void
     */
    protected function registerRollbackCommand()
    {
        $this->app->singleton('module_manager.console.command.migration-rollback', function ($app) {
            return new \App\Build\ModulesManagement\Console\Migrations\RollbackCommand($app['module.migrator']);
        });
        $this->commands('module_manager.console.command.migration-rollback');
    }

    protected function registerModuleMigrator()
    {
        // The migrator is responsible for actually running and rollback the migration
        // files in the application. We'll pass in our database connection resolver
        // so the migrator can resolve any of these connections when it needs to.
        $this->app->singleton('module.migrator', function ($app) {
            return new ModuleMigrator($app);
        });
    }
}