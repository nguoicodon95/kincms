<?php

namespace App\Build\ModulesManagement\Console\Generators;

class MakeProvider extends AbstractGenerator
{
    protected $signature = 'module:make:provider
        {alias : Alias của module}
        {name : Tên class}';

    protected $description = 'Tạo provider cho module';

    protected $type = 'Provider';

    protected function getStub()
    {
        return __DIR__ . '/../../../resources/stubs/providers/provider.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return 'Providers\\' . $this->argument('name');
    }
}