<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <form wire:submit.prevent method="POST" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" wire:model.lazy="search"  type="text" class="form-control bg-light border-0 small" placeholder="Buscar usuario..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

        <div class="">
            <button id="btnAddUser" wire:click ="showModalAddUser"  class="btn btn-success btn-sm mr-2"><i class="fa-solid fa-plus fa-sm"></i>Agregar Usuario</button>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="text-center">
                    <tr>
                        <th>Id</th>
                        <th>Usuario</th>
                        <th>Correo</th>
                        <th>Nombre</th>
                        <th>Avatar</th>
                        <th>Creado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($usuarios)>0)
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{$usuario->id}}</td>
                                <td>{{$usuario->user}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>{{$usuario->nombre}}</td>
                                <td>{{$usuario->avatar}}</td>
                                <td>{{$usuario->created_at}}</td>
                                <td>
                                    <div class="container d-flex justify-content-center">
                                        <button wire:click ="editUsuario('{{$usuario->id}}')" class="btn btn-sm btn-warning mr-2" ><i class="fa-solid fa-pen-to-square fa-sm"></i>Editar</button>
                                        <button wire:click ="deleteUsuario('{{$usuario->id}}')" class="btn btn-sm btn-danger mr-2" ><i class="fa-solid fa-trash fa-sm"></i>Eliminar</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7"><p class="text-center">No hay usuarios</p></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

     <div class="d-flex justify-content-center">
        {{ $usuarios->links() }}
    </div>


    @if ($editModal)
        <div class="modal" tabindex="-1" role="dialog" style="display: block;">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Información del usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                     <form>
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input type="text" wire:model.defer="user"  class="form-control" id="usuario" value="{{$user}}" placeholder="No tiene usuario">
                            <input type="hidden" value="">
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input type="text" wire:model.defer="correo"  class="form-control" id="correo" value="{{$correo}}" placeholder="No tiene correo">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" wire:model.defer="password"  class="form-control" id="password" value="" placeholder="************">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre Usuario</label>
                            <input type="text" wire:model.defer="nombre"  class="form-control" id="nombre" value="{{$nombre}}" placeholder="No tiene nombre">
                        </div>

                        <div class="form-group">
                            <label for="avatar">Avatar</label>
                            <select wire:model.defer="avatar"  class="form-control" id="avatar">
                                @if($avatar === 'A')
                                    <option value="{{$avatar}}" selected>{{$avatar}}</option>
                                    <option value="M">M</option>
                                    <option value="F">F</option>
                                @elseif ($avatar === 'F')
                                     <option value="{{$avatar}}" selected>{{$avatar}}</option>
                                    <option value="A">A</option>
                                    <option value="M">M</option>
                                @else
                                    <option value="{{$avatar}}" selected>{{$avatar}}</option>
                                    <option value="A">A</option>
                                    <option value="F">F</option>
                                @endif
                            </select>
                        </div>
                    </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" wire:click="updateUsuario">Guardar</button>
                        <button type="button" class="btn btn-danger" wire:click="closeModal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif



     @if ($addModal)
        <div class="modal" tabindex="-1" role="dialog" style="display: block;">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    @if($error !== null)
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            <div>
                                {{$error}}
                            </div>
                        </div>
                    @endif
                     <form>
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input type="text" wire:model.defer="user"  class="form-control" id="usuario" placeholder="Ingresa el usuario">
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input type="text" wire:model.defer="correo"  class="form-control" id="correo"  placeholder="Ingresa el correo">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" wire:model.defer="password"  class="form-control" id="password" value="" placeholder="Ingresa la contraseña">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre Usuario</label>
                            <input type="text" wire:model.defer="nombre"  class="form-control" id="nombre" placeholder="Ingresa el nombre del usuario">
                        </div>

                        <div class="form-group">
                            <label for="avatar">Avatar</label>
                            <select wire:model.defer="avatar"  class="form-control" id="avatar">
                                <option value="0" selected>Elige una opción</option>
                                <option value="A">A</option>
                                <option value="M">M</option>
                                <option value="F">F</option>
                            </select>
                        </div>
                    </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" wire:click="addUsuario">Guardar</button>
                        <button type="button" class="btn btn-danger" wire:click="closeModal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif




</div>
<!-- /.container-fluid -->
