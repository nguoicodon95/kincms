<?php

namespace App\Build\ModulesManagement\Console\Generators;

class MakeCommand extends AbstractGenerator
{
    protected $signature = 'module:make:command
        {alias : Alias của module}
        {name : Tên class}';

    protected $description = 'Tạo command cho module';

    protected $type = 'Command';

    protected function getStub()
    {
        return __DIR__ . '/../../../resources/stubs/console/command.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return 'Console\\Commands\\' . $this->argument('name');
    }
}