<?php

use App\Http\Controllers\HomeController;
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


//Ruta usada para hacer una busqueda especifica de un producto por medio de un valor dado por el usuario
Route::get('/searchProducto' , [ProductosController::class , 'searchProducto']);

