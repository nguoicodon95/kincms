<?php

namespace App\Build\ModulesManagement\Console\Generators;

class MakeView extends AbstractGenerator
{
    protected $signature = 'module:make:view
        {alias : Alias của module}
        {name : Tên class}';

    protected $description = 'Tạo view cho module';

    protected $type = 'View';

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
        $this->makeDirectory($path);
        $this->files->put($path, $this->buildClass($name));
        $this->info($this->type . ' created successfully.');
    }

    /**
     * Get the destination class path.
     *
     * @param  string $name
     * @return string
     */
    protected function getPath($name)
    {
        $path = $this->getModuleInfo('module-path') . 'resources/views/' . str_replace('\\', '/', $name) . '.blade.php';
        return $path;
    }

    protected function getStub()
    {
        return __DIR__ . '/../../../resources/stubs/views/view.stub';
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