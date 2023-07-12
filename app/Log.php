<?php

namespace App;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Log
{
   public function updateUser(){
    DB::table('log')->insert([
        'movimiento' => 'UpdateUser',
        'usuario' => auth()->user()->email,
        'fecha' => Carbon::now()->timezone('America/Mexico_City'),
        'codigo' => auth()->user()->user
    ]);
   }


    public function createProduct($codigo){
        DB::table('log')->insert([
            'movimiento' => 'CreateProduct',
            'usuario' => auth()->user()->email,
            'fecha' => Carbon::now()->timezone('America/Mexico_City'),
            'codigo' => $codigo
        ]);
    }


    public function saveMarca($codigo){
        DB::table('log')->insert([
            'movimiento' => 'SaveMarca',
            'usuario' => auth()->user()->email,
            'fecha' => Carbon::now()->timezone('America/Mexico_City'),
            'codigo' => $codigo
        ]);
    }



    public function editMarca($codigo){
        DB::table('log')->insert([
            'movimiento' => 'EditMarca',
            'usuario' => auth()->user()->email,
            'fecha' => Carbon::now()->timezone('America/Mexico_City'),
            'codigo' => $codigo
        ]);
    }


    public function deleteMarca($codigo){
        DB::table('log')->insert([
            'movimiento' => 'DeleteMarca',
            'usuario' => auth()->user()->email,
            'fecha' => Carbon::now()->timezone('America/Mexico_City'),
            'codigo' => $codigo
        ]);
    }


    public function updateProducto($codigo){
        DB::table('log')->insert([
            'movimiento' => 'UpdateProducto',
            'usuario' => auth()->user()->email,
            'fecha' => Carbon::now()->timezone('America/Mexico_City'),
            'codigo' => $codigo
        ]);
    }

    public function deleteProducto($codigo){
        DB::table('log')->insert([
            'movimiento' => 'DeleteProducto',
            'usuario' => auth()->user()->email,
            'fecha' => Carbon::now()->timezone('America/Mexico_City'),
            'codigo' => $codigo
        ]);
    }




}
