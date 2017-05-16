<?php

namespace App\Build\ModulesManagement\Console\Generators;

class MakeMiddleware extends AbstractGenerator
{
    protected $signature = 'module:make:middleware
        {alias : Alias của module}
        {name : Tên class}';

    protected $description = 'Tạo middleware cho module';

    protected $type = 'Middleware';

    protected function getStub()
    {
        return __DIR__ . '/../../../resources/stubs/middleware/middleware.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return 'Http\\Middleware\\' . $this->argument('name');
    }
}