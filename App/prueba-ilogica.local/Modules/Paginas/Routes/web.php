<?php

use Modules\Paginas\Entities\Paginas;
use Modules\Paginas\Entities\menu;
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


Route::prefix('backend')->middleware(['auth', 'web'])->group(function() {
    Route::prefix('paginas')->group(function() {
        Route::get('/', 'PaginasController@index')->name('paginas');
        Route::get('/crear', 'PaginasController@create')->name('crear.paginas');
        Route::post('/carga-archivos', 'PaginasController@uploadFile')->name('uploadFile.pages');
        Route::post('/guardar', 'PaginasController@store')->name('guardar.pages');
        Route::get('/datatable', 'PaginasController@datatable')->name('datatable.pagina');
        Route::get('/eliminar', 'PaginasController@destroy')->name('eliminar.pagina');
        Route::get('/editar/{id}', 'PaginasController@edit')->name('edit.pagina');
        Route::post('/editar', 'PaginasController@update')->name('editar.paginas');
    });
    Route::prefix('media')->group(function() {
        Route::get('/', 'MediaController@index')->name('media');
        Route::post('/guardar', 'MediaController@guardar')->name('guardar.media');
        Route::get('/datatable', 'MediaController@datatable')->name('datatable.media');
        Route::get('/eliminar', 'MediaController@destroy')->name('eliminar.media');
    });
    Route::prefix('menu')->group(function() {
        Route::get('/', 'MenuController@index')->name('menu');
        Route::post('/guardar', 'MenuController@guardar')->name('guardar.menu');
        Route::get('/datatable', 'MenuController@datatable')->name('datatable.menu');
        Route::get('/eliminar', 'MenuController@destroy')->name('eliminar.menu');
        Route::get('/editar', 'MenuController@edit')->name('editar.menu');
    });
});





$segments = Request::segments();
$slug_url = implode('/', $segments);

if($slug_url == ""){
    $slug_url = "/";
};

$pagina = Paginas::where('slug', $slug_url)->first();

if ($pagina) {
    $router->get($slug_url, function () use ($pagina) {
        return view('paginas::public.pages.public', 
            ['page' => $pagina, 'menus' => menu::menus()]);
    });
}
