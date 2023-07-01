<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
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
     * Generamos la pagina principal del dashboard la cual corresponde a los productos
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

    //Generamos la vista configuracion dentro del dashboard
    public function configuracion(){
        return view('dashboard.configuracion');
    }


    //Actualizamos la informacion de un usuario
    public function updateUser(Request $request){
        $data = $request->all();

        $usuario = User::where('email' , '=' , auth()->user()->email)->first();

        if($data['password'] !== null){
            $usuario->password = $data['password'];
        }

        $usuario->user = $data['usuario'];
        $usuario->email = $data['correo'];
        $usuario->avatar = $data['avatar'];
        $usuario->nombre = Str::title($data['nombre']);

        $usuario->save();


        return back()->with('mensajeSuccess' , '¡Usuario actualizado correctamente!');

    }


    //Generamos la vista de marcas
    public function marcas(){
        return view('dashboard.marcas');
    }

    //Cerramos la sesion de usuario
    public function cerrarSesion(){
        Auth::logout();
        return redirect()->route('login');
    }
}
