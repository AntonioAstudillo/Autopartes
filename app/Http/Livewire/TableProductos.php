<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Productos;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class TableProductos extends Component
{

    use WithPagination;
    public $search = '';  //Variable usada para obtener el valor del input de busqueda
    public $modalData; //Variable usada para almacenar la información de un producto y poder mostrarla en los respectivos modales
    public $familias; //variable usada para almacenar todas las familias del sistema y de esa manera poder llenar los selects
    public $grupos;  //variable usada para almacenar los grupos para poder llenar los selects
    public $modalDataDetalle; //Almacenamos la informacion detalla de un producto y así poder llenar el table dentro del modal show
    public $isShow , $isEdit , $isDelete; //Esta variables son banderas que uso para poder mostrar o esconder los modales
    protected $paginationTheme = 'bootstrap'; //Determinamos que la paginacion tenga los estilos de bootstrap


    /** Data de los formularios */

    public $codigo;
    public $empaque;
    public $grupo;
    public $posicion;
    public $tipoCubrePolvo;
    public $familia;
    public $tipoPiston;
    public $lado;
    public $uxv;
    public $diametroInterior;
    public $codigoEquivalente;
    public $altura;
    public $catalogo;
    public $descripcion;
    public $oem;

    //Restablecemos el paginador para que no genere conflictos a la hora de buscar un producto
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


    //Mostramos el modal de editar productos
    public function editProducto($id){
        $this->isEdit = true;
        $this->modalData =  Productos::where('codigo' , '=' , $id)->first();

        $this->codigo = $this->modalData->codigo;
        $this->empaque = $this->modalData->empaque;
        $this->grupo = $this->modalData->grupo;
        $this->posicion = $this->modalData->posicion;
        $this->tipoCubrePolvo = $this->modalData->tipoCubrePolvo;
        $this->familia = $this->modalData->familia;
        $this->tipoPiston = $this->modalData->tipoPiston;
        $this->lado = $this->modalData->lado;
        $this->uxv = $this->modalData->uxv;
        $this->diametroInterior = $this->modalData->diametroInterior;
        $this->codigoEquivalente = $this->modalData->codigoEquivalente;
        $this->altura = $this->modalData->altura;
        $this->catalogo = $this->modalData->catalogo;
        $this->descripcion = $this->modalData->descripcion;
        $this->oem = $this->modalData->oem;

        $this->familias = DB::table('familias')->select('familia')->get();
        $this->grupos = DB::table('subfamilias')->select('subfamilia')->get();
    }



    public function closeModal(){
        $this->isShow = false;
        $this->isEdit = false;
    }

    /**
     * Este metodo se ejecuta una vez que el usuario haya presionado sobre el boton de guardar cambios dentro del modal editar producto
     */

    public function updateProducto(){

        DB::table('productos')->where(['codigo' => $this->codigo])
        ->update(
            [
                'empaque' => $this->empaque,
                'familia' => $this->familia,
                'grupo' => $this->grupo,
                'descripcion' => $this->descripcion,
                'posicion' => $this->posicion,
                'tipoCubrePolvo' => $this->tipoCubrePolvo,
                'tipoPiston' => $this->tipoPiston,
                'lado' => $this->lado,
                'empaque' => $this->empaque,
                'uxv' => $this->uxv,
                'diametroInterior' => $this->diametroInterior,
                'codigoEquivalente' => $this->codigoEquivalente,
                'oem' => $this->oem,
                'altura' => $this->altura,
                'catalogo' => $this->catalogo
            ]
        );

        $this->closeModal();
    }

    public function deleteProducto($producto){
        DB::table('productos')->where('codigo', '=', $producto)->delete();
        DB::table('productodetalle')->where('producto', '=', $producto)->delete();
    }

}
