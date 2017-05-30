<?php namespace App\Build\AssetsManagement;

class Assets
{
    protected $js = [];
    protected $css = [];
    protected $fonts = [];
    protected $getFrom;

    public function getAssetsFrom($environment = 'admin')
    {
        $this->getFrom = $environment;
        $this->js = array_merge(
            config('asset-config.default.' . $environment . '.js'),
            $this->js
        );

        $this->css = array_merge(
            config('asset-config.default.' . $environment . '.css'),
            $this->css
        );

        $this->fonts = array_merge(
            config('asset-config.default.' . $environment . '.fonts'),
            $this->fonts
        );

        return $this;
    }

    public function addJs(array $js)
    {
        $js_get_src = array_get($js, 'src');
        $this->js = array_unique(
            array_merge(
                $this->js, $js_get_src
            )
        );
        return $this;
    }

    public function addCss(array $css)
    {
        $css_get_src = array_get($css, 'src');
        $this->css = array_unique(
            array_merge(
                $this->css, $css_get_src
            )
        );
        return $this;
    }

    public function addFonts(array $fonts)
    {
        $this->css = array_unique(
            array_merge(
                $this->fonts, $fonts
            )
        );

        return $this;
    }

    public function renderCss()
    {
        $data = null;
        foreach($this->fonts as $row) {
            $getRow = array_get(
                config('asset-config.resources.fonts'),
                $row
            );
            $fontResourceUrl = array_get($getRow, 'src');
            foreach($fontResourceUrl as $resource) {
                $data .= PHP_EOL . '<link rel="stylesheet" type="text/css" href="'.$resource.'">';
            }
        }

        foreach($this->css as $rowCss) {
            $getRow = array_get(
                config('asset-config.resources.css'),
                $rowCss
            );
            if(!$getRow == '')
                $cssResourceUrl = array_get($getRow, 'src');
            else 
                $cssResourceUrl = [$rowCss];
            
            foreach($cssResourceUrl as $resource) {
                $data .= PHP_EOL . '<link rel="stylesheet" type="text/css" href="'.$resource.'">';
            }
        }
        return $data;
    }

    public function renderJs()
    {
        $data = null;
        foreach($this->js as $row) {
            $getRow = array_get(
                config('asset-config.resources.js'),
                $row
            );
            if(!$getRow == '')
                $jsResourceUrl = array_get($getRow, 'src');
            else 
                $jsResourceUrl = [$row];
            
            foreach($jsResourceUrl as $resource) {
                $data .= PHP_EOL . '<script type="text/javascript" src="' . $resource . '"></script>';
            }
        }
        return $data;
    }

    public function getAssetsList()
    {
        return [
            'js' => [
                $this->js
            ],
            'css' => [
                $this->css
            ],
            'fonts' => [
                $this->fonts
            ],
        ];
    }
}
