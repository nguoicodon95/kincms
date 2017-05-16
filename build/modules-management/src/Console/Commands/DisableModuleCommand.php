<?php

namespace App\Build\ModulesManagement\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Composer;

class DisableModuleCommand extends Command
{
    /*
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:disable {alias : Tên module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Disable plugins';

    /**
     * @var array
     */
    protected $container = [];
    /**
     * @var Composer
     */
    protected $composer;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Composer $composer)
    {
        parent::__construct();
        $this->composer = $composer;
        $this->composer->setWorkingPath(base_path());
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $plugin = get_module_information($this->argument('alias'));
        $enabled = array_get($plugin, 'enabled');
        if(!$enabled) {
            $this->info("\nModule đã ngừng hoạt động. Hãy Enable nếu cần.");
            die();
        }
        \ModulesManagement::disableModule(array_get($plugin, 'alias'));

        // echo PHP_EOL;
        \ModulesManagement::refreshComposerAutoload();
        $this->info("\nModule $this->argument('alias') disabled successfully.");
    }
    
}