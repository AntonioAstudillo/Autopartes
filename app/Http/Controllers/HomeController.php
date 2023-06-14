<?php

namespace App\Http\Controllers;

use App\Models\Familias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index(){

        $marcas = DB::table('productodetalle')->select('marca')->distinct()->orderBy('marca')->get();//obtenemos las marcas para poder llenar el select de busqueda personalizada
        $destacados  = DB::table('productos')->select('codigo', 'posicion'  ,'familia', 'empaque', 'diametroInterior', 'altura', 'imagen', 'catalogo')->inRandomOrder()->limit(30)->get();
        $familias = Familias::all(); //mandamos las familias al home vista para poder usarlas en el menu carousel.

        return view('home' , ['familias' => $familias , 'marcas' => $marcas , 'destacados' => $destacados]);
    }
}
