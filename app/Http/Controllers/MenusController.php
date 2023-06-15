<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenusController extends Controller
{

    //Mostramos los productos de acuerdo a la familia que nos envian por la url
    public function show($menu){
        $menu = str_replace('-' , ' ' , $menu);

        $productos = DB::table('productos')
            ->orWhere('familia', '=', $menu)
            ->paginate(21);

        return view('busquedaMenus' , ['productos' => $productos]);

    }
}
