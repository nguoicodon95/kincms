<?php

if(!function_exists('module_path'))
{
    /**
     * @param string $path
     * @return string
     */
    function module_path($path = '')
    {
        $moduleDirectory = base_path(config('module-config.module'));
        return $moduleDirectory . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}

if(!function_exists('plugin_path'))
{
    /**
     * @param string $path
     * @return string
     */
    function plugin_path($path = '')
    {
        $pluginDirectory = base_path(config('module-config.plugin'));
        return $pluginDirectory . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}

if(!function_exists('json_encode_prettify'))
{
    /**
     * @param array $data
     * @return string
     */
    function json_encode_prettify(array $data)
    {
        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
}

if (!function_exists('get_all_module_information'))
{
    /**
     * @return array
     */
    function get_all_module_information()
    {
        $moduleArr = [];
        $modulePluginDirectory = [
            config('module-config.module'),
            config('module-config.plugin')
        ];
        foreach($modulePluginDirectory as $type) {
            if(!$type)
                continue;

            $modules = get_folders_in_path(base_path($type));
            
            foreach($modules as $row) {
                $file = $row . '/module.json';
                $data = json_decode(get_file_data($file), true);

                if($data === null || !is_array($data))
                    continue;

                $moduleArr[] = array_merge($data, [
                    'file' => $file,
                    'type' => $type,
                ]);
            }
        }
        return $moduleArr;
    }
}

if (!function_exists('get_module_information'))
{
    /**
    * @param alias
    * @return array
    */
    function get_module_information($alias)
    {
        return collect(get_all_module_information())
            ->where('alias', $alias)
            ->first();
    }
}

if (!function_exists('get_all_module_aliases'))
{
    /**
    * @return array
    */
    function get_all_module_aliases()
    {
        return collect(get_all_module_information())
            ->pluck('alias')->unique()->all();
    }
}

if (!function_exists('get_modules_by_type'))
{
    /**
     * @param $type
     * @return mixed
     */
    function get_modules_by_type($type)
    {
        return collect(get_all_module_information())
            ->where('type', '=', $type)
            ->all();
    }
}

if (!function_exists('save_module_information'))
{
    /**
     * @param $alias
     * @param array $data
     * @return bool
     */
     function save_module_information($alias, array $data)
     {
        $module = is_array($alias) ? $alias : get_module_information($alias);
        if (!$module) {
            return false;
        }
        $editableFields = [
            'name', 'author', 'description', 'image', 'version', 'enabled', 'installed'
        ];
        $count = 0;
        foreach ($data as $key => $item) {
            if (in_array($key, $editableFields)) {
                $module[$key] = $item;
                $count++;
            }
        }
        if (\File::exists(array_get($module, 'file'))) {
            $file = $module['file'];
            unset($module['file']);
            if (array_key_exists('type', $module)) {
                unset($module['type']);
            }
            \File::put($file, json_encode_prettify($module));
        }
        if ($count > 0) {
            return true;
        }
        return false;
     }
}