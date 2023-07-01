<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <form wire:submit.prevent method="POST" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" wire:model.lazy="search"  type="text" class="form-control bg-light border-0 small" placeholder="Buscar producto..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

        <div class="">
            <button id="btnAddMarca"  class="btn btn-success btn-sm mr-2"><i class="fa-solid fa-plus fa-sm"></i>Agregar Marca</button>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="text-center">
                    <tr>
                        <th>Producto</th>
                        <th>Marca</th>
                        <th>Submarca</th>
                        <th>Modelo</th>
                        <th>Fmsi</th>
                        <th>NoBalata</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($productos)>0)
                        @foreach ($productos as $producto)
                            <tr>
                                <td>{{$producto->producto}}</td>
                                <td>{{$producto->marca}}</td>
                                <td>{{$producto->submarca}}</td>
                                <td>{{$producto->modelo}}</td>
                                <td>{{$producto->fmsi}}</td>
                                <td>{{$producto->noBalata}}</td>
                                <td>
                                    <div class="container d-flex justify-content-center">
                                        <button wire:click ="editMarca('{{$producto->id}}')" class="btn btn-sm btn-warning mr-2" ><i class="fa-solid fa-pen-to-square fa-sm"></i>Editar</button>
                                        <button wire:click ="deleteMarca('{{$producto->id}}')" class="btn btn-sm btn-danger mr-2" ><i class="fa-solid fa-trash fa-sm"></i>Eliminar</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7"><p class="text-center">No hay productos</p></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $productos->links() }}
    </div>


    @if ($editModal)
        <div class="modal" tabindex="-1" role="dialog" style="display: block;">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Información del producto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                     <form>
                        <div class="form-group">
                            <label for="producto">Producto</label>
                            <input type="text" readonly class="form-control" id="producto" value="{{$codigo}}" placeholder="No tiene código">
                            <input type="hidden" value="{{$idRegistro}}">
                        </div>
                        <div class="form-group">
                            <label for="marcas">Marca</label>
                            <select wire:model.defer="marca"  class="form-control" id="marcas">
                                <option value="{{$marca}}">{{$marca}}</option>
                                @foreach ($marcas as $marcaProduct )
                                    @if($marca !== $marcaProduct->marca)
                                        <option value="{{$marcaProduct->marca}}">{{$marcaProduct->marca}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="submarcas">Submarca</label>
                            <select wire:model.defer="submarca"  class="form-control" id="submarcas">
                                <option value="{{$submarca}}">{{$submarca}}</option>
                                 @foreach ($submarcas as $submarcaProduct )
                                    @if($submarca !== $submarcaProduct->submarca)
                                        <option value="{{$submarcaProduct->submarca}}">{{$submarcaProduct->submarca}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                         <div class="form-group">
                            <label for="modelo">Modelo</label>
                            <input wire:model.defer="modelo" type="text" class="form-control" id="modelo" value="{{$this->modelo}}" placeholder="No tiene modelo">
                        </div>
                         <div class="form-group">
                            <label for="fmsi">Fmsi</label>
                            <input wire:model.defer="fmsi" type="text" class="form-control" id="fmsi" value="{{$this->fmsi}}" placeholder="No tiene FMSI">
                        </div>
                         <div class="form-group">
                            <label for="noBalata">NoBalata</label>
                            <input  wire:model.defer="noBalata" type="text" class="form-control" value="{{$this->noBalata}}" placeholder="No tiene noBalata" id="noBalata">
                        </div>


                    </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" wire:click="updateMarca">Guardar</button>
                        <button type="button" class="btn btn-danger" wire:click="closeModal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
<!-- /.container-fluid -->
