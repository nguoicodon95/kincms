<?php

namespace App\Build\ModulesManagement\Console\Generators;

class MakeRequest extends AbstractGenerator
{
    protected $signature = 'module:make:request
        {alias : Alias của module}
        {name : Tên class}';

    protected $description = 'Tạo request cho module';

    protected $type = 'Request';

    protected function getStub()
    {
        return __DIR__ . '/../../../resources/stubs/requests/request.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return 'Http\\Requests\\' . $this->argument('name');
    }
}