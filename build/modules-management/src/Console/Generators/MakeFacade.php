<?php

namespace App\Build\ModulesManagement\Console\Generators;

class MakeFacade extends AbstractGenerator
{
    protected $signature = 'module:make:facade
        {alias : Alias của module}
        {name : Tên class}';

    protected $description = 'Tạo Facade cho module';

    protected $type = 'Facade';

    protected function getStub()
    {
        return __DIR__ . '/../../../resources/stubs/facades/facade.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return 'Facades\\' . $this->argument('name');
    }
}