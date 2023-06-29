
     {{-- MODALS PARA AGREGAR PRODUCTO AL SISTEMA  --}}
     <!-- Modal -->
    <div class="modal fade" id="modalProductoAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                     <form id="formAddProduct" enctype="multipart/form-data" method="post" action="{{route('producto.save')}}">
                        @csrf
                            <div id="dataPrimaryForm" class="">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="codigoAdd">Código</label>
                                        <input type="text" name="codigo" placeholder="Ingresa el código del producto"  class="form-control" id="codigoAdd" >
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="empaqueAdd">Empaque</label>
                                        <input type="text" name="empaque" placeholder="Ingresa el empaque del producto" class="form-control" id="empaqueAdd" >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="grupoAdd">Grupo</label>
                                        <select id="grupoAdd" name="grupo" class="form-control">
                                            <option  value="" selected disabled>Elige un grupo</option>
                                            @isset($grupos)
                                                    @foreach ($grupos as $grupo )
                                                            <option value="{{$grupo->subfamilia}}">{{$grupo->subfamilia}}</option>
                                                    @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="posicionAdd">Posición</label>
                                        <input name="posicion" id="posicionAdd" placeholder="Ingresa la posición del producto" type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="tipoCubrePolvoAdd">Tipo Cubre Polvo</label>
                                        <input name="tipoCubrePolvo" id="tipoCubrePolvoAdd" placeholder="Ingresa el tipo de cubre polvo del producto" type="text" class="form-control" value="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="familiaAdd">Familia</label>
                                        <select name="familia" id="familiaAdd" class="form-control">
                                            <option value="" selected disabled>Elige una familia</option>
                                            @isset($familias)
                                                    @foreach ($familias as $familiaProducto )
                                                        <option value="{{$familiaProducto->familia}}">{{$familiaProducto->familia}}</option>
                                                    @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="tipoPistonAdd">Tipo piston</label>
                                        <input name="tipoPiston" id="tipoPistonAdd" placeholder="Ingresa el tipo piston del producto" type="text" class="form-control" value="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="ladoAdd">Lado</label>
                                        <input name="lado"  id="ladoAdd" type="text" placeholder="Ingresa el lado del producto" class="form-control" value="" >
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="uxvAdd">UXV</label>
                                        <input name="uxv" id="uxvAdd" placeholder="Ingresa le UXV del producto" type="text" class="form-control" value="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="diametroInteriorAdd">Diametro interior</label>
                                        <input name="diametroInterior" id="diametroInteriorAdd" placeholder="Ingresa el diametro interior del producto"  type="text" class="form-control" value="">
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="codigoEquivalenteAdd">Código equivalente</label>
                                        <input name="codigoEquivalente" id="codigoEquivalenteAdd" placeholder="Ingresa el código equivalente del producto" type="text" class="form-control" value="" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="alturaAdd">Altura</label>
                                        <input name="altura"  id="alturaAdd" type="text" placeholder="Ingresa la altura del producto" class="form-control" value="">
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="catalogoAdd">Catálogo</label>
                                        <select name="catalogo" id="catalogoAdd" class="form-control">
                                            <option value="" selected disabled>Elige una opción</option>
                                            <option value="Frenos">Frenos</option>
                                            <option  value="Suspension">Suspension</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="oemAdd">OEM</label>
                                        <input name="oem"  id="oemAdd" placeholder="Ingresa el OEM del producto" type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="form-row mb-3">
                                    <div class="input-group mt-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="newFoto"><i class="fa-solid fa-image"></i></span>
                                        </div>
                                        <div class="custom-file">
                                            <input id="newFoto" name="imagenProducto" type="file" class="custom-file-input"
                                            aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="newFoto">Elige una imagen...</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="descripcionAdd">Descripción</label>
                                        <textarea name="descripcion" class="form-control" id="descripcionAdd" placeholder="Agregar descripción"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="d-none" id="dataSecondaryForm">
                                <div class="container mb-3">
                                    <button id="addDetalleDiv" type="button" class="btn btn-outline-success"><i class="fa-solid fa-plus"></i></button>
                                    <button id="deleteDetalleDiv" type="button" class="btn btn-outline-danger"><i class="fa-solid fa-minus"></i></button>
                                </div>


                                <div id="contenidoDetalleProduct" class="">
                                    <div id="hijoContenidoDetalle" class="border p-3 mt-3">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="my-1 mr-2">Marcas</label>
                                                <select class="custom-select my-1 mr-sm-2" name="marcas[]">
                                                    <option selected>Selecciona una marca</option>
                                                    @foreach ($marcas as $marca )
                                                        <option value="{{$marca->marca}}">{{$marca->marca}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="my-1 mr-2">Submarcas</label>
                                                <select class="custom-select my-1 mr-sm-2" name="submarcas[]">
                                                    <option selected>Selecciona una submarca</option>
                                                    @foreach ($submarcas as $submarca )
                                                        <option value="{{$submarca->submarca}}">{{$submarca->submarca}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputCity">Modelo</label>
                                                <input type="text" placeholder="Modelo del producto" name="modelo[]" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputCity">Fmsi</label>
                                                <input type="text" name="fmsi[]" placeholder="Fmsi del producto" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputCity">NoBalata</label>
                                                <input type="text" name="noBalata[]" placeholder="NoBatala del producto" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </form>
                </div>
                <div class="modal-footer">
                    <button id="nextProductAdd" type="button" class="btn btn-info">Siguiente</button>
                    <button id="backProductAdd" type="button" class="btn btn-dark d-none">Atras</button>
                    <button id="createProducto" type="button" class="btn btn-primary d-none">Crear producto</button>
                </div>
            </div>
        </div>
    </div>
