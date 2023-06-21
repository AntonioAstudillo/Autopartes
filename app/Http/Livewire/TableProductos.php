<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Productos;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class TableProductos extends Component
{

    use WithPagination;
    public $search = '';
    public $modalData;
    public $modalDataDetalle;
    public $isShow;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['mostrarData' => 'showProducto'];



    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $data = [];


        if($this->search !== ''){
           $data = Productos::where('familia' , 'like' ,'%' . $this->search . '%')
           ->orWhere('grupo' , 'like' ,'%' . $this->search . '%')
           ->orWhere('codigo' , 'like' ,'%' . $this->search . '%')
           ->orWhere('descripcion' , 'like' ,'%' . $this->search . '%')
           ->orWhere('posicion' , 'like' ,'%' . $this->search . '%')
           ->orWhere('catalogo' , 'like' ,'%' . $this->search . '%')
            ->paginate(10);
        }else{
            $data = Productos::paginate(10);
        }

        return view('livewire.table-productos', [
            'productos' => $data,
        ]);
    }



    public function showProducto($id){
          $this->modalData =  Productos::where('codigo' , '=' , $id)->first();
          $this->modalDataDetalle = DB::table('productodetalle')->select('marca' , 'submarca' , 'modelo' , 'fmsi' ,'noBalata')->where('producto' , '=' , $id)->get();
          $this->isShow = true;
    }



    public function closeModal(){
        $this->isShow = false;
    }

}
