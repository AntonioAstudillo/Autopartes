<?php

namespace App\Http\Controllers;

use App\Log;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
            ->select('p.codigo' , 'p.familia' , 'p.grupo' , 'p.descripcion' , 'p.posicion' , 'p.tipoCubrePolvo' , 'p.tipoPiston' , 'p.lado' , 'p.empaque' , 'p.uxv', 'p.diametroInterior' , 'p.oem' , 'p.altura' , 'p.imagen' , 'p.catalogo','pd.marca' , 'pd.submarca')
            ->join('productodetalle as pd', 'pd.producto', '=', 'p.codigo')
            ->where('pd.marca', 'like', '%'.$marca . '%')
            ->where('pd.submarca', 'like', '%'.$submarca.'%')
            ->groupBy('p.codigo')
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


    //Metodo para crear un producto.
    public function store(Request $request){
        $data = $request->all();
        $tam = count($data['marcas']); //cantidad de marcas que tiene el producto

        DB::transaction(function () use ($tam , $data , $request) {

            for ($i=0; $i < $tam ; $i++) {
                DB::table('productodetalle')->insert([
                    'producto' => $data['codigo'],
                    'marca' => $data['marcas'][$i],
                    'submarca' =>$data['submarcas'][$i] ,
                    'modelo' =>$data['modelo'][$i] ,
                    'fmsi' =>$data['fmsi'][$i] ,
                    'noBalata' => $data['noBalata'][$i],
                ]);
            }


            //Guardamos la imagen
            $imagen = $this->saveImage($request);



            DB::table('productos')->insert([
                'codigo' => $data['codigo'],
                'familia' => $data['familia'],
                'grupo' => $data['grupo'],
                'descripcion' => $data['descripcion'],
                'posicion' => $data['posicion'],
                'tipoCubrePolvo' => $data['tipoCubrePolvo'],
                'tipoPiston' => $data['tipoPiston'],
                'lado' => $data['lado'],
                'empaque' => $data['empaque'],
                'uxv' => $data['uxv'],
                'diametroInterior' => $data['diametroInterior'],
                'codigoEquivalente' => $data['codigoEquivalente'],
                'oem' => $data['oem'],
                'altura' => $data['altura'],
                'imagen' => $imagen,
                'catalogo' => $data['catalogo']
            ]);



            $objLog = new Log();
            $objLog->createProduct($data['codigo']);

        });


        return back()->with('successMensaje', '¡La transacción se realizó con éxito!');


    }//cierra funcion store



    public function saveMarca(Request $request){
        $data = $request->all();

        $result = DB::table('productodetalle')->insert([
            'producto' => $data['codigoProducto'],
            'marca' => $data['marca'],
            'submarca' => $data['submarca'],
            'modelo' => $data['modelo'],
            'fmsi' => $data['fmsi'],
            'noBalata' => $data['noBalata']
        ]);

        if(!$result){
            return response('' , 422);

        }

        $objLog = new Log();
        $objLog->saveMarca($data['codigoProducto']);

        return response('' , 200);

    }

    private function saveImage(Request $request){
        $filename = $request->input('codigo'). time() . '.' . $request->file('imagenProducto')->getClientOriginalExtension(); // Obtiene la extensión del archivo
        $directory = 'img/productos'; // Directorio público personalizado
        $request->file('imagenProducto')->storeAs($directory, $filename, 'public');

        return $filename;
    }




    /**
     * Método usado para generar la informacion que utilizaremos dentro del modulo administradores/charts
     * este método se manda a llamar desde una petición asincrona
     */

    public function marcasCharts(){
        $resultados = DB::table('productodetalle')
                ->select('marca', DB::raw('COUNT(*) as cantidad'))
                ->groupBy('marca')
                ->orderByDesc('cantidad')
                ->get();
        return response()->json($resultados);
    }

}
