<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class TableMarcas extends Component
{
    use WithPagination;
    public $search = '';  //Variable usada para obtener el valor del input de busqueda
    protected $paginationTheme = 'bootstrap'; //Determinamos que la paginacion tenga los estilos de bootstrap
    public $editModal;
    public $marcas , $submarcas; //almaceno todas las marcas que existen para generar el select
    public $marca , $submarca , $modelo , $fmsi , $noBalata , $codigo; //variables para almacenar la informacion del producto seleccionado
    protected $dataProduct; //almaceno la informacion de un producto para poder trabajar con ella en los modales editar y eliminar
    public $idRegistro;


    //Restablecemos el paginador para que no genere conflictos a la hora de buscar un producto
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $data = [];

        if($this->search !== '')
        {
            $data =  DB::table('productodetalle')
                ->orWhere('producto', 'like', '%'.$this->search.'%')
                ->orWhere('marca', 'like', '%'.$this->search.'%')
                ->orWhere('submarca', 'like', '%'.$this->search.'%')
                ->orWhere('modelo', 'like', '%'.$this->search.'%')
                ->orWhere('fmsi', 'like', '%'.$this->search.'%')
                ->orWhere('noBalata', 'like', '%'.$this->search.'%')
                ->paginate(10);
        }else{
            $data = DB::table('productodetalle')->paginate(10);
        }

        return view('livewire.table-marcas' , ['productos' => $data]);
    }


    public function editMarca($id){
        $this->idRegistro = $id;
        $this->editModal = true;
        $this->dataProduct = DB::table('productoDetalle')->where('id' , '=' , $id)->first();
        $this->marca = $this->dataProduct->marca;
        $this->submarca = $this->dataProduct->submarca;
        $this->modelo =  $this->dataProduct->modelo;
        $this->fmsi = $this->dataProduct->fmsi;
        $this->noBalata = $this->dataProduct->noBalata;
        $this->codigo = $this->dataProduct->producto;
        $this->marcas = DB::table('productoDetalle')->select('marca')->distinct('marca')->orderBy('marca')->where('marca', '<>' , '')->get();
        $this->submarcas = DB::table('productoDetalle')
        ->select('submarca')
        ->distinct('submarca')
        ->orderBy('submarca')
        ->where('submarca', '<>' , '')
        ->where('submarca', '<>' , '-')
        ->where('submarca', '<>' , '.')
        ->get();
    }


    public function updateMarca(){
        DB::table('productodetalle')
              ->where('id', $this->idRegistro)
              ->update(['marca' => $this->marca , 'submarca' => $this->submarca, 'modelo' => $this->modelo, 'fmsi' => $this->fmsi, 'noBalata' => $this->noBalata ]);
        $this->closeModal();
    }



    public function closeModal(){
        $this->editModal = false;
    }
}
