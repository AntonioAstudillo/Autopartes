<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogoController extends Controller
{

    public function show($catalogo){

        $productos = DB::table('productos')
            ->orWhere('catalogo', '=', $catalogo)
            ->paginate(21);

        if($productos->total()<=0){
            return view('404');
        }


        return view('catalogo' , ['productos' => $productos]);

    }
}
