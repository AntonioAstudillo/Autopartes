<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    //
    //Por medio de este metodo, vamos a hacer una busqueda de todos los productos que conincidan con el valor que el usuario ingrese dentro del input de busqueda
    public function searchProducto(Request $request){

          $resultados = DB::table('productos')
                ->select('codigo', 'familia', 'grupo', 'posicion')
                ->where('codigo', 'like', '%' . $request->term . '%')
                ->orWhere('familia', 'like', '%' . $request->term . '%')
                ->orWhere('grupo', 'like', '%' . $request->term . '%')
                ->orWhere('posicion', 'like', '%' . $request->term . '%')
                ->get()
                ->toJson();

        return $resultados;
    }
}
