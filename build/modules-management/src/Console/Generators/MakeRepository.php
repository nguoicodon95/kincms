<?php

namespace App\Build\ModulesManagement\Console\Generators;

class MakeRepository extends AbstractGenerator
{
    protected $signature = 'module:make:repository
        {alias : Alias của module}
        {name : Tên class}';

    protected $description = 'Tạo repository cho module';

    protected $type = 'Repository';

    protected $buildStep;

    /**
     * Execute the console command.
     *
     * @return bool|null
     */
    public function fire()
    {
        $nameInput = $this->getNameInput();
        $name = $this->parseName($nameInput);
        $path = $this->getPath($name);
        if ($this->alreadyExists($nameInput)) {
            $this->error($this->type . ' already exists!');
            return false;
        }
        /**
         * Make repository
         */
        $this->makeDirectory($path);
        $this->files->put($path, $this->buildClass($name));
        
        /*
         * Create model contract
         */
        $this->buildStep = 'make-contract';
        $contractName = 'Contracts/' . get_file_name($path, '.php');
        $contractPath = get_base_folder($path) . $contractName . 'Contract.php';
        $this->makeDirectory($contractPath);
        $this->files->put($contractPath, $this->buildClass('Repositories\\' . $contractName));
        $this->info($this->type . ' created successfully.');
    }
    protected function getStub()
    {
        if ($this->buildStep === 'make-contract') {
            return __DIR__ . '/../../../resources/stubs/repositories/repository.contract.stub';
        }
        return __DIR__ . '/../../../resources/stubs/repositories/repository.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        if ($this->buildStep === 'make-contract') {
            return 'Repositories\\Contracts\\' . $this->argument('name');
        }
        return 'Repositories\\' . $this->argument('name');
    }
}