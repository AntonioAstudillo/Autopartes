<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;

use Exception;
Use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }


    public function validateLogin(Request $request){


        $request->validate([
            'email' => 'bail|required|email|max:255',
            'password' => 'bail|required|alpha_num:ascii',
        ]);


        if(!auth()->attempt($request->only('email' , 'password') , $request->remember)){
            return back()->with('mensaje' , 'Credenciales incorrectas');
        }

        return redirect()->route('dashboard.index');
    }



    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }


    public function login_facebook_callback(){
        try{
          $user = Socialite::driver('facebook')->user();
          dd($user);
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }



}
