<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class BusquedaPersonalizada extends Component
{
    public $submarcas;

    public function render()
    {

        $marcas = DB::table('productodetalle')->select('marca')->distinct()->orderBy('marca')->get();//obtenemos las marcas para poder llenar el select de busqueda personalizada
        return view('livewire.busqueda-personalizada' , ['marcas' => $marcas]);
    }

    //Este metodo se ejecuta cada vez que cambia el select de marca, obtenemos todas las submarcas ligadas a esa marca
    public function handleChange($value)
    {
        $this->submarcas =  DB::table('productodetalle')
                ->select('submarca')
                ->distinct()
                ->where('marca', $value)
                ->where('submarca' , '<>' , ' ')
                ->orderBy('submarca')
                ->get();;
    }
}
