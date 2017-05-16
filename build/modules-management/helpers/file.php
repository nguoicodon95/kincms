<?php

if (!function_exists('get_folders_in_path')) {
    /**
     * @param $path
     * @return array
     */
    function get_folders_in_path($path)
    {
        if(!File::exists($path)) {
            return [];
        }
        return File::directories($path);
    }
}

if (!function_exists('get_file_data')) {
    /**
     * @param string $path
     * @return string
     */
    function get_file_data($path)
    {
        if(!File::exists($path) || !File::isFile($path)) {
            return null;
        }
        return File::get($path, true);
    }
}

if (!function_exists('get_file_name')) {
    /**
     * @param string $path
     * @param null|string $suffix
     * @return string
     */
    function get_file_name($path, $suffix = null)
    {
        if (is_dir($path)) {
            return '';
        }
        $path = basename($path);
        if ($suffix === null) {
            return $path;
        }
        return str_replace($suffix, '', $path);
    }
}

if (!function_exists('get_base_folder')) {
    function get_base_folder($path) {
        if(is_dir($path)) {
            return $path;
        }

        $path = dirname($path);
        
        if(!ends_with('/', $path)) {
            $path .= '/';
        }

        return $path;
    }
}

if (!function_exists('module_relative_path')) {
    /**
     * @param string $alias
     * @return string
     */
    function module_relative_path($alias)
    {
        $module = get_module_information($alias);
        $path =str_replace('module.json', '', array_get($module, 'file', ''));
        $relativePath = str_replace(base_path() . '/', '', $path);
        return $relativePath;
    }
}