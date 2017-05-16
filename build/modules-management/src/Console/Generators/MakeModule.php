<?php

namespace App\Build\ModulesManagement\Console\Generators;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeModule extends Command
{
    /**
     * @var string
     */
    protected $signature = 'make:module {alias : Đặt alias cho module}';

    /**
     * @var string
     */
    protected $description = 'Tạo mới một module';

    protected $files;

    /**
     * Array to store the configuration details.
     *
     * @var array
     */
    protected $container = [];
    
    /**
     * Accepted module types
     * @var array
     */
    protected $acceptedTypes = [
        'module' => 'Build',
        'plugin' => 'Plugin',
    ];

    protected $moduleType;

    protected $moduleFolderName;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle()
    {
        $ask = $this->ask('Kiểu module của bạn? Lựa chọn: module hoặc plugin. Mặc định chọn "plugin".', 'plugin');
        $this->moduleType = $ask;
        if(!in_array($this->moduleType, array_keys($this->acceptedTypes))) {
            $this->moduleType = 'plugin';
        }
        $this->container['alias'] = snake_case($this->argument('alias'));
        if(get_module_information($this->container['alias'])) {
            $this->error("\nModule đã tồn tại.");
            die();
        }
        $this->step1();
    }

    private function step1()
    {
        $ask = $this->ask('Tên thư mục:', $this->container['alias']);
        $this->moduleFolderName = $ask;
        $this->container['name'] = $this->ask('Tên module:', $this->container['alias']);
        $this->container['author'] = $this->ask('Tên tác giả:', 'Nhật Phạm');
        $this->container['description'] = $this->ask('Giới thiệu module:', $this->container['name']);
        $this->container['namespace'] = $this->ask('Tên namespace module:', 'App\\' . $this->acceptedTypes[$this->moduleType] . '\\' . studly_case($this->container['alias']));
        $this->container['version'] = $this->ask('Module version.', '1.0');
        $this->container['autoload'] = $this->ask('Autoloading type.', 'psr-4');
        $this->step2();
    }

    private function step2()
    {
        $this->generatingModule();
        $this->info("\nModule đã được tạo thành công.");
    }

    private function generatingModule()
    {
        $pathType = $this->makeModuleFolder();
        // pathType trả về helper ko có "()" > module_path hoặc plugin_path -> để sử dụng helper => $pathType()
        $directory = $pathType($this->moduleFolderName);
         
        $source = __DIR__ . '/../../../resources/stubs/_folder-structure';
         
        /**
         * Tạo thư mục
         */
        $this->files->makeDirectory($directory);
        
        /**
        * Copy cấu trúc thư mục sang module
        */
        $this->files->copyDirectory($source, $directory, null);

        /**
         * Thay thế files placeholder
         */
        $files = $this->files->allFiles($directory);

        foreach($files as $file) {
            $contents = $this->replacePlaceholders($file->getContents());
            $filePath = $pathType($this->moduleFolderName . '/' . $file->getRelativePathname());
            
            $this->files->put($filePath, $contents);
        }
        /**
         * Sửa đổi thông tin module.json
         */
         \File::put($directory .'/module.json', json_encode_prettify($this->container));
    }

    private function makeModuleFolder()
    {
        switch ($this->moduleType) {
            case 'module':
                if(!$this->files->isDirectory(module_path()))
                    $this->files->makeDirectory(module_path());
                
                return 'module_path';
                break;

            case 'plugin':
            default:
                if(!$this->files->isDirectory(plugin_path()))
                    $this->files->makeDirectory(plugin_path());
                
                return 'plugin_path';
                break;
        }
    }

    private function replacePlaceholders($contents)
    {
        $find = [
            'DummyNamespace',
            'DummyAlias',
            'DummyName',
        ];

        $replace = [
            $this->container['namespace'],
            $this->container['alias'],
            $this->container['name'],
        ];

        return str_replace($find, $replace, $contents);
    }
}