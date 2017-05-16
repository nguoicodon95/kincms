<?php

namespace App\Build\ModulesManagement\Console\Generators;

class MakeSupport extends AbstractGenerator
{
    protected $signature = 'module:make:support
        {alias : Alias của module}
        {name : Tên class}';

    protected $description = 'Tạo support cho module';

    protected $type = 'Support';

    protected function getStub()
    {
        return __DIR__ . '/../../../resources/stubs/support/support.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return 'Support\\' . $this->argument('name');
    }
}