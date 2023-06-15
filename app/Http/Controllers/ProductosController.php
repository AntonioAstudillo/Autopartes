<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductosController extends Controller
{
    public function show(Request $request){

        $validator = Validator::make($request->all(),[
            'valorSearch' => ['required' , 'max:255'],
        ]);

        if($validator->fails()){
            return back();
        }

        $valorBusqueda = $request->valorSearch;
        $valorBusqueda = trim($valorBusqueda);

        $valorBusqueda = str_replace('+',' ', $valorBusqueda);
        $valorBusqueda = str_replace('-',' ', $valorBusqueda);


        //Hacemos consulta con la información que nos manden desde el input search
        $resultados = DB::table('productos')
                ->where('codigo', 'like', '%' . $valorBusqueda. '%')
                ->orWhere('familia', 'like', '%' . $valorBusqueda. '%')
                ->orWhere('grupo', 'like', '%' . $valorBusqueda. '%')
                ->orWhere('posicion', 'like', '%' . $valorBusqueda. '%')
                ->paginate(21);

        return view('busqueda' , ['productos' => $resultados , 'valorBusqueda' => $valorBusqueda]);
    }
}
