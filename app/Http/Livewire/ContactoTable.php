<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ContactoTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap'; //Determinamos que la paginacion tenga los estilos de bootstrap

    public function render()
    {
        $contacto = DB::table('contacto')->paginate(10);
        return view('livewire.contacto-table' , ['contacto' => $contacto]);
    }
}
