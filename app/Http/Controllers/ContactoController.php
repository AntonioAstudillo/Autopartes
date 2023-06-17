<?php

namespace App\Http\Controllers;

use Closure;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;


class ContactoController extends Controller
{

    public function index(){
        return view('contacto');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'nombre' => ['required' , 'max:255'],
            'email' => ['required' , 'max:255' , 'email'],
            'telefono' => ['required' , 'max:255'],
            'mensaje' => ['required' , 'max:255'],
            'g-recaptcha-response' => ['required'],
        ]);

        if($validator->fails()){
            return response('Datos incorrectos' , 400);
        }

        $data = $request->all();


        if(!$this->validarRecaptcha($data['g-recaptcha-response']))
        {
            return response('' , 500);
        }


        try {
              DB::table('contacto')->insert([
                'nombre' => Str::title($data['nombre']),
                'correo' => $data['email'],
                'telefono' => $data['telefono'],
                'mensaje' => Str::ucfirst($data['mensaje']),
                'fecha' => Carbon::now()->timezone('America/Mexico_City')
            ]);

        } catch (Exception $e) {
            return response('No pudimos concretar la solicitud' , 500);
        }


        return response('' , 200);
    }

    private function validarRecaptcha($value){

        $g_response = Http::asForm()->post("https://www.google.com/recaptcha/api/siteverify" , [
            'secret' => config('services.recaptcha.secret_key'),
            'response' =>$value,
            'remoteip' => $_SERVER['REMOTE_ADDR'],
        ]);

        if(!$g_response->json('success')){
            return false;
        }

        return true;
    }
}

