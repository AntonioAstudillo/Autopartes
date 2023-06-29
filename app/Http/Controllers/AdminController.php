<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $familias = DB::table('familias')->select('familia')->where('familia' , '<>' , '')->get();
        $grupos = DB::table('subfamilias')->select('subfamilia')->where('subfamilia' , '<>' , '')->get();
        $marcas = DB::table('productoDetalle')->select('marca')->distinct('marca')->orderBy('marca')->where('marca', '<>' , '')->get();
        $submarcas = DB::table('productoDetalle')
        ->select('submarca')
        ->distinct('submarca')
        ->orderBy('submarca')
        ->where('submarca', '<>' , '')
        ->where('submarca', '<>' , '-')
        ->where('submarca', '<>' , '.')
        ->get();

        return view('dashboard.index' , ['familias' => $familias , 'grupos' => $grupos , 'marcas' => $marcas , 'submarcas' => $submarcas] );
    }


    //Con este metodo vamos a validar que el codigo no se encuentre repetido
    public function validarCodigoRepetido($codigo){

        $resultado = DB::table('productos')->where('codigo', '=', $codigo)->first();

        if ($resultado === null) {
            return response($codigo, 200);
        } else {
            return response($codigo, 409);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }



    public function cerrarSesion(){
        Auth::logout();
        return redirect()->route('login');
    }
}
