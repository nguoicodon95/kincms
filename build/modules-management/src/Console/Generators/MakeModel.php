<?php

namespace App\Build\ModulesManagement\Console\Generators;

class MakeModel extends AbstractGenerator
{
    protected $signature = 'module:make:model
        {alias : Alias của module}
        {name : Tên class}
    	{--with-contract : create model related contract}';

    protected $description = 'Tạo model cho module [--with-contract]';

    protected $type = 'Model';

    protected $buildContract = false;

    public function fire()
    {
        $nameInput = $this->getNameInput();
        $name = $this->parseName($nameInput);
        $path = $this->getPath($name);

        if($this->alreadyExists($nameInput)) {
            $this->error($this->type . ' already exists');
            return false;
        }

        $this->makeDirectory($path);

        $this->files->put($path, $this->buildClass($name));

        /**
         * Create model contract
         */
        if($this->option('with-contract')) {
            $this->buildContract = true;

            $contractName = 'Contracts/' . get_file_name($path, '.php');
            $contractPath = get_base_folder($path) . $contractName . 'ModelContract.php';
            
            $this->makeDirectory($contractPath);
            $this->files->put($contractPath, $this->buildClass('Models\\' . $contractName));
        }
        
        $this->info($this->type . ' tạo thành công.');
    }

    protected function getStub()
    {
        if ($this->buildContract === true) {
            return __DIR__ . '/../../../resources/stubs/models/model.contract.stub';
        }
        return __DIR__ . '/../../../resources/stubs/models/model.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        if ($this->buildContract === true) {
            return 'Models\\Contracts\\' . $this->argument('name');
        }
        return 'Models\\' . $this->argument('name');
    }
    
    protected function replaceParameters(&$stub)
    {
        $stub = str_replace([
            '{table}',
        ], [
            snake_case(str_plural($this->argument('name'))),
        ], $stub);
    }
}