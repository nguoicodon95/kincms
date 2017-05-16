<?php

namespace App\Build\ModulesManagement\Console\Commands;

use Illuminate\Console\Command;

class GetAllModulesCommand extends Command
{
    protected $signature = 'module:list {--type=}';

    protected $description = 'Show tất cả các module hiện tại';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        if($this->option('type')) {
            $modules = get_modules_by_type($this->option('type'));
        } else {
            $modules = get_all_module_information();
        }

        $header = ['Tên', 'Alias', 'Loại', 'Phiên bản', 'Namespace', 'Autoload type', 'Trạng thái'];
        $result = [];
        foreach($modules as $module) {
            $result[] = [
                array_get($module, 'name'),
                array_get($module, 'alias'),
                array_get($module, 'type'),
                array_get($module, 'version'),
                array_get($module, 'namespace'),
                array_get($module, 'autoload'),
                array_get($module, 'enabled') ? 'Đang hoạt động' : 'Chưa cài đặt',
            ];
        }
        $this->table($header, $result);
    }
}