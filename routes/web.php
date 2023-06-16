<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\ProductosController;


//Generamos la vista principal de la pagina
Route::get('/', [HomeController::class , 'index'])->name('home');

//Ruta para mostrar todos los productos de acuerdo a un menu
Route::get('/menus/{menu}' , [MenusController::class , 'show'])->name('menus');

//Ruta usada para mostrar los productos de acuerdo a un catalogo
Route::get('/catalogos/{catalogo}' , [CatalogoController::class , 'show'])->name('catalogo');

Route::controller(ProductosController::class)->group(function(){
    //Ruta usada para hacer una busqueda especifica de un producto por medio de un valor dado por el usuario
    Route::get('/search' , 'show')->name('searchProducts');

    //Ruta usada para busqueda personalizada
    Route::get('/custom-search/{marca}/{submarca?}' , 'custom_search')->name('custom-search');

    //Ruta usada para mostrar la información detallada de un producto
    Route::get('/details/{producto}' , 'details')->name('details');
});
