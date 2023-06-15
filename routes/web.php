<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\ProductosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Generamos la vista principal de la pagina
Route::get('/', [HomeController::class , 'index'])->name('home');


//Ruta para mostrar todos los productos de acuerdo a un menu
Route::get('/menus/{menu}' , [MenusController::class , 'show'])->name('menus');

//Ruta usada para hacer una busqueda especifica de un producto por medio de un valor dado por el usuario
Route::get('/search' , [ProductosController::class , 'show'])->name('searchProducts');
