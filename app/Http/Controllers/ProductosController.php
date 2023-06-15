<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductosController extends Controller
{
    /**
     * Este metodo se encarga de obtener los productos de acuerdo al valor que el usuario ingreso dentro del input buscar producto
     */
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

        if($resultados->total()<=0){
            return view('404');
        }

        return view('busqueda' , ['productos' => $resultados , 'valorBusqueda' => $valorBusqueda]);
    }


    /**
     * Metodo para trabajar con la búsqueda personalizada
     */
    public function custom_search($marca , $submarca = ''){

        $marca =  str_replace('-',' ', $marca);
        $submarca =  str_replace('-',' ', $submarca);

        $productos = DB::table('productos as p')
            ->select('p.*', 'pd.marca', 'pd.submarca')
            ->join('productodetalle as pd', 'pd.producto', '=', 'p.codigo')
            ->where('pd.marca', 'like', '%'.$marca . '%')
            ->where('pd.submarca', 'like', '%'.$submarca.'%')
            ->paginate(21);

        if($productos->total()<=0){
            return view('404');
        }

        return view('searchCustom' , ['productos' => $productos]);
    }
}
