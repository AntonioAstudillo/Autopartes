<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\VistasController;

//Generamos la vista principal de la pagina
Route::get('/', [HomeController::class , 'index'])->name('home');

//Ruta para mostrar todos los productos de acuerdo a un menu
Route::get('/menus/{menu}' , [MenusController::class , 'show'])->name('menus');

//Ruta usada para mostrar los productos de acuerdo a un catalogo
Route::get('/catalogos/{catalogo}' , [CatalogoController::class , 'show'])->name('catalogo');
Route::get('/contacto' , [ContactoController::class , 'index'])->name('contacto');
Route::post('/contacto' , [ContactoController::class , 'store']);

Route::controller(LoginController::class)->group(function(){
    Route::get('/login' , 'index')->name('login');
    Route::post('/login' , 'validateLogin');
});

Route::middleware('auth')->group(function () {
   Route::controller(AdminController::class)->group(function(){
        Route::get('/dashboard/index' , 'index')->name('dashboard.index');
        Route::get('/dashboard/cerrarSesion' , 'cerrarSesion')->name('dashboard.cerrarSesion');
        Route::get('/dashboard/validateCodigo/{codigo}' , 'validarCodigoRepetido');
        Route::get('/dashboard/configuracion' ,'configuracion')->name('dashboard.configuracion');
        Route::post('/dashboard/configuracion' ,'updateUser')->name('dashboard.updateUser');
        Route::get('/dashboard/marcas' ,'marcas')->name('dashboard.marcas');
    });
});




Route::controller(VistasController::class)->group(function(){
    Route::get('/nosotros','nosotros')->name('nosotros');
    Route::get('/informacion' , 'informacion')->name('informacion');
    Route::get('/politica' , 'politica')->name('politica');
    Route::get('/privacidad' , 'privacidad')->name('privacidad');
    Route::get('/descargar' , 'descargas')->name('descargas');
    Route::get('/videos' , 'videos')->name('videos');
});


Route::controller(ProductosController::class)->group(function(){
    //Ruta usada para hacer una busqueda especifica de un producto por medio de un valor dado por el usuario
    Route::get('/search' , 'show')->name('searchProducts');

    //Ruta usada para busqueda personalizada
    Route::get('/custom-search/{marca}/{submarca?}' , 'custom_search')->name('custom-search');

    //Ruta usada para mostrar la información detallada de un producto
    Route::get('/details/{producto}' , 'details')->name('details');


    Route::get('/producto/imagen' , 'imagen')->middleware('auth')->name('producto.imagen');

    Route::post('/producto' , 'store')->middleware('auth')->name('producto.save');
});
