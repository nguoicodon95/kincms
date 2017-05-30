const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');

const modulePath = './build/';

// module Base
mix.js(modulePath + '/base/resources/public/js/app.js', 'public/modules/base/js')
   .js( modulePath + '/base/resources/public/js/theme.js', 'public/modules/base/js')
   .js(modulePath + '/base/resources/public/js/pages/dashboard.js', 'public/modules/base/js/pages')
   .combine(modulePath + '/base/resources/public/css/AdminLTE.css', 'public/modules/base/css/AdminLTE.css')
   .combine(modulePath + '/base/resources/public/css/skins/_all-skins.css', 'public/modules/base/css/skins/all-skins.css');