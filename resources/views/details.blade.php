@extends('layouts.app')


@section('tituloPagina')
    Catálogos
@endsection

@section('contenido')
   <main class="container mt-5 p-5">
        <div class="row">
            <div class="col-md-6 col-lg-6  col-xs-12">
                <div class="card bg-dark text-white">
                    <img  src="{{asset('img/productos') . '/' . $productos[0]->imagen}}" class="card-img img-fluid img-thumbnail" height="50px">
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xs-12 mt-3">
                   <table class="table table-bordered">
                    <thead class="detalleColor">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Submarca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Fmsi</th>
                        <th scope="col">NoBalata</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detalleProducto as $producto )
                            <tr>
                                <th scope="row">{{$producto->id}}</th>

                                @if ($producto->marca !== '')
                                    <td>{{$producto->marca}}</td>
                                @else
                                  <td>N/A</td>
                                @endif

                                @if ($producto->submarca !== '')
                                    <td>{{$producto->submarca}}</td>
                                @else
                                  <td>N/A</td>
                                @endif

                                @if ($producto->modelo !== '')
                                    <td>{{$producto->modelo}}</td>
                                @else
                                  <td>N/A</td>
                                @endif

                                @if ($producto->fmsi !== '')
                                    <td>{{$producto->fmsi}}</td>
                                @else
                                  <td>N/A</td>
                                @endif

                                @if ($producto->noBalata !== '')
                                    <td>{{$producto->noBalata}}</td>
                                @else
                                  <td>N/A</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-3 card shadow p-4">
            <div class="col-md-12 col-lg-12  col-xs-12">
                <ul class="list-group ">
                    @if ($productos[0]->codigo !== '')
                        <ul class="list-group list-group-horizontal  mb-2">
                            <li class="list-group-item detalleColor">Código</li>
                            <li class="list-group-item list-group-item-action">{{$productos[0]->codigo}}</li>
                        </ul>
                    @endif
                    @if ($productos[0]->familia !== '')
                        <ul class="list-group list-group-horizontal mb-2">
                            <li class="list-group-item detalleColor">Familia</li>
                            <li class="list-group-item list-group-item-action">{{$productos[0]->familia}}</li>
                        </ul>
                    @endif

                    @if ($productos[0]->grupo !== '')
                        <ul class="list-group list-group-horizontal mb-2">
                            <li class="list-group-item detalleColor">Grupo</li>
                            <li class="list-group-item list-group-item-action">{{$productos[0]->grupo}}</li>
                        </ul>
                    @endif

                    @if ($productos[0]->descripcion !== '')
                        <ul class="list-group list-group-horizontal mb-2">
                            <li class="list-group-item detalleColor">Descripción</li>
                            <li class="list-group-item list-group-item-action">{{$productos[0]->descripcion}}</li>
                        </ul>
                    @endif

                    @if ($productos[0]->tipoCubrePolvo !== '')
                        <ul class="list-group list-group-horizontal mb-2">
                            <li class="list-group-item detalleColor">Tipo cubrepolvo</li>
                            <li class="list-group-item list-group-item-action">{{$productos[0]->tipoCubrePolvo}}</li>
                        </ul>
                    @endif


                    @if ($productos[0]->lado !== '')
                        <ul class="list-group list-group-horizontal mb-2">
                            <li class="list-group-item detalleColor">Lado</li>
                            <li class="list-group-item list-group-item-action">{{$productos[0]->lado}}</li>
                        </ul>
                    @endif

                      @if ($productos[0]->empaque !== '')
                        <ul class="list-group list-group-horizontal mb-2">
                            <li class="list-group-item detalleColor">Empaque</li>
                            <li class="list-group-item list-group-item-action">{{$productos[0]->empaque}}</li>
                        </ul>
                    @endif

                    @if ($productos[0]->uxv !== '')
                        <ul class="list-group list-group-horizontal mb-2">
                            <li class="list-group-item detalleColor">UXV</li>
                            <li class="list-group-item list-group-item-action">{{$productos[0]->uxv}}</li>
                        </ul>
                    @endif

                     @if ($productos[0]->diametroInterior !== '')
                        <ul class="list-group list-group-horizontal mb-2">
                            <li class="list-group-item detalleColor">Diámetro interior</li>
                            <li class="list-group-item list-group-item-action">{{$productos[0]->diametroInterior}}</li>
                        </ul>
                    @endif

                      @if ($productos[0]->codigoEquivalente !== '')
                        <ul class="list-group list-group-horizontal mb-2">
                            <li class="list-group-item detalleColor">Código equivalente</li>
                            <li class="list-group-item list-group-item-action">{{$productos[0]->codigoEquivalente}}</li>
                        </ul>
                    @endif

                    @if ($productos[0]->oem !== '')
                        <ul class="list-group list-group-horizontal mb-2">
                            <li class="list-group-item detalleColor">Descripción</li>
                            <li class="list-group-item list-group-item-action">{{$productos[0]->oem}}</li>
                        </ul>
                    @endif

                      @if ($productos[0]->altura !== '')
                        <ul class="list-group list-group-horizontal mb-2">
                            <li class="list-group-item detalleColor">Altura</li>
                            <li class="list-group-item list-group-item-action">{{$productos[0]->altura}}</li>
                        </ul>
                    @endif

                      @if ($productos[0]->catalogo !== '')
                        <ul class="list-group list-group-horizontal mb-2">
                            <li class="list-group-item detalleColor">Catálogo</li>
                            <li class="list-group-item list-group-item-action">{{$productos[0]->catalogo}}</li>
                        </ul>
                    @endif
                </ul>
            </div>
        </div>
    </main>
@endsection
