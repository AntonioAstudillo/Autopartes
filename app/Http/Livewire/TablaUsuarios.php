<?php

namespace App\Http\Livewire;

use App\Log;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;


class TablaUsuarios extends Component
{
    use WithPagination;
    public $search = '';  //Variable usada para obtener el valor del input de busqueda
    public $editModal , $addModal;
    protected $dataUser;
    public $user;
    public $correo;
    public $password;
    public $nombre;
    public $avatar;
    public $idUser;
    public $error;

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
            $data =  DB::table('usuarios')
                ->orWhere('user', 'like', '%'.$this->search.'%')
                ->orWhere('email', 'like', '%'.$this->search.'%')
                ->orWhere('nombre', 'like', '%'.$this->search.'%')
                ->paginate(10);
        }else{
            $data = DB::table('usuarios')->orderBy('id')->paginate(10);
        }
        return view('livewire.tabla-usuarios' , ['usuarios' => $data]);
    }



    public function editUsuario($id){
        $this->editModal = true;
        $this->dataUser = DB::table('usuarios')->where('id' , '=' , $id)->first();
        $this->user = $this->dataUser->user;
        $this->correo = $this->dataUser->email;
        $this->nombre = $this->dataUser->nombre;
        $this->avatar = $this->dataUser->avatar;
        $this->idUser = $this->dataUser->id;
    }



    public function updateUsuario(){

        $usuario = User::find($this->idUser);

        $usuario->user = $this->user;
        $usuario->email = $this->correo;

        if($this->password !== null){
            $usuario->password = $this->password;
        }

        $usuario->nombre = $this->nombre;
        $usuario->avatar = $this->avatar;
        $usuario->save();

        $objLog = new Log();
        $objLog->updateUser();
        $this->closeModal();
    }



    public function deleteUsuario($id){
        $usuario = User::find($id);
        $usuario->delete();
    }


    public function showModalAddUser(){
        $this->limpiarDatos();
        $this->addModal = true;
    }

    public function addUsuario(){


        if($this->avatar === null){
            $this->error = '¡Datos incorrectos!';
        }else{
            DB::table('usuarios')->insert([
                'user' => $this->user,
                'email' => $this->correo,
                'password' => $this->password,
                'nombre' => Str::title($this->nombre),
                'avatar' => $this->avatar,
                'created_at' => now()
            ]);

            $this->closeModal();
        }

    }


    public function closeModal(){
        $this->editModal = false;
         $this->addModal = false;
    }

    public function limpiarDatos(){
        $this->user = '';
        $this->correo = '';
        $this->password = '';
        $this->nombre = '';
        $this->avatar = '';
    }
}
