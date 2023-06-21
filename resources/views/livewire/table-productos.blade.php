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
            <button class="btn btn-success btn-sm mr-2"><i class="fa-solid fa-plus fa-sm"></i>Agregar producto</button>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="text-center">
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Familia</th>
                        <th scope="col">Subfamilia</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Catálogo</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($productos)>0)
                        @foreach ($productos as $producto)
                            <tr>
                                <th scope="row">{{$producto->codigo}}</th>
                                <td>{{$producto->familia}}</td>
                                <td>{{$producto->grupo}}</td>
                                <td>{{$producto->descripcion}}</td>
                                <td>{{$producto->catalogo}}</td>
                                <td>
                                    <div class="container d-flex justify-content-center">
                                        <button wire:click="showProducto('{{$producto->codigo}}')" class="btn btn-sm btn-info mr-2" ><i class="fa-solid fa-eye fa-sm"></i> Mostrar</button>
                                        <button class="btn btn-sm btn-warning mr-2" ><i class="fa-solid fa-pen-to-square fa-sm"></i>Editar</button>
                                         <button class="btn btn-sm btn-primary mr-2" ><i class="fa-solid fa-camera fa-sm"></i>Imagen</button>
                                        <button class="btn btn-sm btn-danger mr-2" ><i class="fa-solid fa-trash fa-sm"></i>Eliminar</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6"><p class="text-center">No hay productos</p></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $productos->links() }}
    </div>




  @if ($isShow)
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
                        <ol class="list-group list-group-numbered">
                            @if($modalData->codigo !== '')
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                    <div class="font-weight-bold">Código</div>
                                        {{ $modalData->codigo }}
                                    </div>
                                </li>
                            @endif

                            @if($modalData->familia !== '')
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                    <div class="font-weight-bold">Familia</div>
                                    {{ $modalData->familia }}
                                    </div>
                                </li>
                            @endif
                            @if($modalData->grupo !== '')
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                    <div class="font-weight-bold">Subfamilia</div>
                                    {{ $modalData->grupo }}
                                    </div>
                                </li>
                            @endif
                            @if($modalData->descripcion !== '')
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                    <div class="font-weight-bold">Descripción</div>
                                    {{ $modalData->descripcion }}
                                    </div>
                                </li>
                            @endif
                            @if($modalData->posicion !== '')
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                    <div class="font-weight-bold">Posición</div>
                                    {{ $modalData->posicion }}
                                    </div>
                                </li>
                            @endif
                            @if($modalData->tipoCubrePolvo !== '')
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                    <div class="font-weight-bold">Tipo Cubre Polvo</div>
                                    {{ $modalData->tipoCubrePolvo }}
                                    </div>
                                </li>
                            @endif
                            @if($modalData->tipoPiston !== '')
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                    <div class="font-weight-bold">Tipo pistón</div>
                                    {{ $modalData->tipoPiston }}
                                    </div>
                                </li>
                            @endif
                            @if($modalData->lado !== '')
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                    <div class="font-weight-bold">Lado</div>
                                    {{ $modalData->lado }}
                                    </div>
                                </li>
                            @endif
                            @if($modalData->empaque !== '')
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                    <div class="font-weight-bold">Empaque</div>
                                    {{ $modalData->empaque }}
                                    </div>
                                </li>
                            @endif
                            @if($modalData->uxv !== '')
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                    <div class="font-weight-bold">UXV</div>
                                    {{ $modalData->uxv }}
                                    </div>
                                </li>
                            @endif
                            @if($modalData->diametroInterior !== '')
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                    <div class="font-weight-bold">Diámetro interior</div>
                                    {{ $modalData->diametroInterior }}
                                    </div>
                                </li>
                            @endif
                            @if($modalData->codigoEquivalente !== '')
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                    <div class="font-weight-bold">Código equivalente</div>
                                    {{ $modalData->codigoEquivalente }}
                                    </div>
                                </li>
                            @endif
                            @if($modalData->oem !== '')
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                    <div class="font-weight-bold">OEM</div>
                                    {{ $modalData->oem }}
                                    </div>
                                </li>
                            @endif
                            @if($modalData->altura !== '')
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                    <div class="font-weight-bold">Altura</div>
                                    {{ $modalData->altura }}
                                    </div>
                                </li>
                            @endif
                            @if($modalData->catalogo !== '')
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                    <div class="font-weight-bold">Catálogo</div>
                                    {{ $modalData->catalogo }}
                                    </div>
                                </li>
                            @endif
                        </ol>
                        <div class="container p-3 table-responsive">
                            <table class="table">
                                <thead class="text-center">
                                    <tr>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Submarca</th>
                                    <th scope="col">Modelo</th>
                                    <th scope="col">Fmsi</th>
                                    <th scope="col">NoBalata</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($modalDataDetalle as $detalle)
                                       <tr>
                                            @if ($detalle->marca !== '')
                                                <td scope="row">{{$detalle->marca}}</td>
                                            @else
                                                <td scope="row">N/D</td>
                                            @endif

                                            @if ($detalle->submarca !== '')
                                                <td scope="row">{{$detalle->submarca}}</td>
                                            @else
                                                <td scope="row">N/D</td>
                                            @endif

                                            @if ($detalle->modelo !== '')
                                                <td scope="row">{{$detalle->modelo}}</td>
                                            @else
                                                <td scope="row">N/D</td>
                                            @endif

                                            @if ($detalle->fmsi !== '')
                                                <td scope="row">{{$detalle->fmsi}}</td>
                                            @else
                                                <td scope="row">N/D</td>
                                            @endif

                                            @if ($detalle->noBalata !== '')
                                                <td scope="row">{{$detalle->noBalata}}</td>
                                            @else
                                                <td scope="row">N/D</td>
                                            @endif

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- Muestra los datos del modal -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" wire:click="closeModal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
<!-- /.container-fluid -->
