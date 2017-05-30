<?php

use Illuminate\Routing\Router;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$adminPrefix = env('ADMIN_PREFIX');

// Cpanel management systems
Route::group([ 'prefix' => $adminPrefix ], function(Router $router) {
    $router->get('/pages', 'PageController@index')
            ->name('admin.pages');

    $router->get('/pages/create', 'PageController@create')
            ->name('admin.pages.create');

    $router->post('/pages/create', 'PageController@store')
            ->name('admin.pages.store');

    $router->get('/pages/{id}/edit', 'PageController@update')
            ->name('admin.pages.update')
            ->where('id', '[0-9]+');

    $router->put('/pages/{id}/edit', 'PageController@edit')
            ->name('admin.pages.edit')
            ->where('id', '[0-9]+');

    $router->delete('/pages/{id}/delete', 'PageController@delete')
            ->name('admin.pages.delete')
            ->where('id', '[0-9]+');
});
