<?php

namespace App\Build\ModulesManagement\Console\Generators;

class MakeService extends AbstractGenerator
{
    protected $signature = 'module:make:service
        {alias : Alias của module}
        {name : Tên class}';

    protected $description = 'Tạo service cho module';

    protected $type = 'Service';

    protected function getStub()
    {
        return __DIR__ . '/../../../resources/stubs/services/service.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return 'Services\\' . $this->argument('name');
    }
}