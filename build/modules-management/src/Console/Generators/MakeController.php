<?php

namespace App\Build\ModulesManagement\Console\Generators;

class MakeController extends AbstractGenerator
{
    protected $signature = 'module:make:controller
        {alias : Alias của module}
        {name : Tên class}
    	{--resource : Generate a controller with route resource}';

    protected $description = 'Tạo Controller cho module';

    protected $type = 'Controller';

    protected function getStub()
    {
        if ($this->option('resource')) {
            return __DIR__ . '/../../../resources/stubs/controllers/controller.resource.stub';
        }

        return __DIR__ . '/../../../resources/stubs/controllers/controller.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return 'Http\\Controllers\\' . $this->argument('name');
    }
    
    protected function replaceParameters(&$stub)
    {
        $stub = str_replace([
            '{alias}',
        ], [
            $this->argument('alias'),
        ], $stub);
    }
}