<?php

namespace App\Http\Livewire;

use App\Log;
use Livewire\Component;
use App\Models\Productos;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TableProductos extends Component
{

    use WithPagination;
    use WithFileUploads;
    public $search = '';  //Variable usada para obtener el valor del input de busqueda
    public $modalData; //Variable usada para almacenar la información de un producto y poder mostrarla en los respectivos modales
    public $familias; //variable usada para almacenar todas las familias del sistema y de esa manera poder llenar los selects
    public $grupos;  //variable usada para almacenar los grupos para poder llenar los selects
    public $modalDataDetalle; //Almacenamos la informacion detalla de un producto y así poder llenar el table dentro del modal show
    public $isShow , $isEdit , $isDelete , $isImage; //Esta variables son banderas que uso para poder mostrar o esconder los modales
    protected $paginationTheme = 'bootstrap'; //Determinamos que la paginacion tenga los estilos de bootstrap
    public $photo; //variable utilizada para almacenar una imagen


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
    public $error;
    public $imagen;


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


        $this->familias = DB::table('familias')->select('familia')->where('familia' , '<>' , '')->get();
        $this->grupos = DB::table('subfamilias')->select('subfamilia')->where('subfamilia' , '<>' , '')->get();

    }



    public function closeModal(){
        $this->isShow = false;
        $this->isEdit = false;
        $this->isImage = false;
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

        $objLog = new Log();
        $objLog->updateProducto($this->codigo);

        $this->closeModal();
    }

    public function deleteProducto($producto){
        DB::table('productos')->where('codigo', '=', $producto)->delete();
        DB::table('productodetalle')->where('producto', '=', $producto)->delete();
        $objLog = new Log();
        $objLog->deleteProducto($producto);
    }



    //Mostramos el modal de la imagen
    public function imageProduct($codigo){
        $this->codigo = $codigo;
        $resultado = DB::table('productos')->select('imagen')->where('codigo', '=', $codigo)->first();
        $this->imagen = $resultado->imagen;
        $this->isImage = true;
    }

   // public\img\productos

    //Metodo save es utilizado para subir la imagen del producto al servidor
    /*
        El error 1.1 corresponse a que no se pudo subir la imagen a la carpeta temp
        El error 1.2 indica que no se pudo mover la imagen a la carpeta public
        El error 1.3 sucede cuando no podemos realizar de forma correcta el proceso de actualizacion de la imagen del producto determinado.
    */
    public function save()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);

        $filename = time() . $this->codigo.'.jpg'; // Nombre personalizado de la imagen
        $directory = 'img/productos'; // Directorio público personalizado

        if($this->photo->storeAs('temp', $filename, 'public'))
        {
            if(Storage::disk('public')->move('temp/'.$filename, $directory.'/'.$filename)){
                //Obtenemos la imagen de acuerdo al codigo del producto
                $resultado = DB::table('productos')->select('imagen')->where('codigo', '=', $this->codigo)->first();

                //eliminamos la imagen de la carpeta de imagenes de los productos

                if(Storage::disk('public')->delete('/img/productos/' . $resultado->imagen))
                {
                    //Actualizamos el valor de la imagen del producto en la base de datos
                    DB::table('productos')->where('codigo' , '=' , $this->codigo)->update(['imagen' => $filename]);

                    //Posteriormente a nuestra atributo bidireccional imagen, le damos el valor de la nueva imagen para que lo establezca en la vista
                    $this->imagen = $filename;
                }else{
                    $this->error = 'Error 1.3, tuvimos procesar al procesar la imagen';
                }

            }else{
                 $this->error = 'Hubo un error al subir la imagen error 1.2';
            }
        }else{
            $this->error = 'Hubo un error al subir la imagen error 1.1';
        }
    }




}
