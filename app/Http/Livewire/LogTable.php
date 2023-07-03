<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class LogTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap'; //Determinamos que la paginacion tenga los estilos de bootstrap

    public function render()
    {
        $log = DB::table('log')->paginate(10);
        return view('livewire.log-table' , ['log' => $log]);
    }
}
