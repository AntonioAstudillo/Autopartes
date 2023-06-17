<?php

/**
 * Controlador encargado de generar vistas dentro de la pagina
 */


namespace App\Http\Controllers;



class VistasController extends Controller
{

    public function nosotros(){
        return view('nosotros');
    }


    public function informacion(){
        return view('informacion');
    }


    public function politica(){
        return view('politica');
    }

    public function privacidad(){
        return view('privacidad');
    }

    public function descargas(){
        return view('descargas');
    }

    public function videos(){
        return view('videos');
    }
}
