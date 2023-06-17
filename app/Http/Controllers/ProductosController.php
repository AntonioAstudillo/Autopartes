<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductosController extends Controller
{
    /**
     * Este metodo se encarga de obtener los productos de acuerdo al valor que el usuario ingreso dentro del input buscar producto
     * Se podría decir que es la busqueda general
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


        $resultados = DB::table('productos as p')
                ->join('productodetalle as pd', 'pd.producto', '=', 'p.codigo')
                ->select('p.codigo' , 'p.familia' , 'p.grupo' , 'p.descripcion' , 'p.posicion' , 'p.tipoCubrePolvo' , 'p.tipoPiston' , 'p.lado' , 'p.empaque' , 'p.uxv', 'p.diametroInterior' , 'p.oem' , 'p.altura' , 'p.imagen' , 'p.catalogo','pd.marca' , 'pd.submarca' , 'pd.modelo' , 'pd.fmsi' , 'pd.noBalata')
                ->where('p.codigo', 'like', '%' . $valorBusqueda . '%')
                ->orWhere('p.familia', 'like', '%' . $valorBusqueda . '%')
                ->orWhere('p.grupo', 'like', '%' . $valorBusqueda . '%')
                ->orWhere('p.posicion', 'like', '%' . $valorBusqueda . '%')
                ->orWhere('pd.marca', 'like', '%' . $valorBusqueda . '%')
                ->orWhere('pd.submarca', 'like', '%' . $valorBusqueda . '%')
                ->groupBy('p.codigo')
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


    /**
     * Metodo usado para obtener la información detallada de un producto
     */
    public function details($producto){

        $dataProducto = Producto::where('codigo' , $producto)->get();
        $detalleProducto = DB::table('productodetalle')->where('producto' , '=' , $producto)->get();


        if($dataProducto->count()<=0 || $detalleProducto->count()<=0){
            return view('404');
        }



        return view('details' , ['productos' => $dataProducto , 'detalleProducto' => $detalleProducto]);
    }
}
