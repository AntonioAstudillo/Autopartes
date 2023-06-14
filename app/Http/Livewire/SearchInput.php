<?php

namespace app\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class SearchInput extends Component
{
    public $search = '';
    private $resultados;


    public function render()
    {
        if($this->search === ''){
            $this->resultados = '';
        }else{
           $this->resultados = DB::table('productos')
                ->select('codigo', 'familia', 'grupo', 'posicion')
                ->where('codigo', 'like', '%' . $this->search. '%')
                ->orWhere('familia', 'like', '%' . $this->search. '%')
                ->orWhere('grupo', 'like', '%' . $this->search. '%')
                ->orWhere('posicion', 'like', '%' . $this->search. '%')
                ->get();

            $this->resultados = $this->resultados->unique(['codigo', 'familia', 'grupo', 'posicion']);
        }

        return view('livewire.search-input' , ['resultados' => $this->resultados]);
    }



}
