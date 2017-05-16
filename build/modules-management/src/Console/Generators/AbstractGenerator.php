<?php

namespace App\Build\ModulesManagement\Console\Generators;

use Illuminate\Console\GeneratorCommand;

abstract class AbstractGenerator extends GeneratorCommand
{
    /**
    * @var array
    */
    protected $moduleInformation;

    /**
    * @en Get root folder of every modules by module type
    * @vi Nhận thư mục gốc của mỗi module theo loại module
    * @param array $module
    * @return string
    */
    protected function resolveModuleRootFolder($module)
    {
        switch(array_get($module, 'type')) {
            case config('module-config.module'):
                $path = module_path();
                break;

            case config('module-config.plugin'):
            default:
                $path = plugin_path();
                break;
        }
        
        if(!ends_with('/', $path))
            $path .= '/';
        return $path;
    }
    
    /**
    * @EN: current module information
    * @VI: Thông tin module hiện tại
    * @return array
    */
    protected function getCurrentModule()
    {
        $alias = $this->argument('alias');
        $module = get_module_information($alias);
        if(!$module) {
            $this->error('Module not exists');
            die();
        }
        $moduleRootFolder = $this->resolveModuleRootFolder($module);
        return $this->moduleInformation = array_merge($module, [
            'module-path' => $moduleRootFolder . basename(str_replace('/module.json', '', $module['file'])) . '/'
        ]);
    }

    /**
     * Get module information by key
     * @param $key
     * @return array|mixed
     */
    protected function getModuleInfo($key = null)
    {
        if (!$this->moduleInformation) {
            $this->getCurrentModule();
        }
        if (!$key) {
            return $this->moduleInformation;
        }
        return array_get($this->moduleInformation, $key, null);
    }
   
    /**
     * @EN: Parse the name and format according to the root namespace.
     * @VI: Phân tích tên và định dạng theo không gian tên gốc.
     * @param  string $name
     * @return string
     */
    protected function parseName($name)
    {
        if (str_contains($name, '/')) {
            $name = str_replace('/', '\\', $name);
        }
        return $this->getDefaultNamespace($name);
    }
    
    /**
     * Get the destination class path. [ * Lấy đường dẫn lớp đích.] 
     * @param  string $name
     * @return string
     */
    protected function getPath($name)
    {
        $path = $this->getModuleInfo('module-path') . 'src/' . str_replace('\\', '/', $name) . '.php';
        return $path;
    }

    /**
     * Get the full namespace name for a given class.
     * @param  string $name
     * @return string
     */
    protected function getNamespace($name)
    {
        $namespace = trim( implode('\\', array_slice( explode('\\', $this->getModuleInfo('namespace') . '\\' . str_replace('/', '\\', $name) ), 0, -1)), '\\');
        return $namespace;
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  string $stub
     * @param  string $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        $class = class_basename($name);
        return str_replace('DummyClass', $class, $stub);
    }

    /**
     * Replace the namespace for the given stub.
     *
     * @param  string $stub
     * @param  string $name
     * @return $this
     */
    protected function replaceNamespace(&$stub, $name)
    {
        $stub = str_replace(
            'DummyNamespace', $this->getNamespace($name), $stub
        );
        $stub = str_replace(
            'DummyRootNamespace', $this->laravel->getNamespace(), $stub
        );
        if (method_exists($this, 'replaceParameters')) {
            $this->replaceParameters($stub);
        }
        return $this;
    }

    protected function qualifyClass($name)
    {
        $rootNamespace = $this->rootNamespace();
        return $this->getDefaultNamespace(trim($rootNamespace, '\\'));
    }
}