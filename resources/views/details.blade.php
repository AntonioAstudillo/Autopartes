@extends('layouts.app')


@section('tituloPagina')
    Catálogos
@endsection

@section('contenido')
   <main class="container mt-5 p-5">
        <div class="row">
            <div class="col-md-6 col-lg-6  col-xs-12 mt-3">
                <div class="card bg-dark text-white ">
                    <img data-bs-toggle="modal" data-bs-target="#imagenModal"  src="{{asset('img/productos') . '/' . $productos[0]->imagen}}" class="card-img img-fluid img-thumbnail " height="50px">
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xs-12 mt-3">
                <div class="col-md-12 col-lg-12  col-xs-12">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="modal-header detalleColor d-flex justify-content-center">
                            <h6 class="modal-title fw-bold" id="exampleModalLabel">Información General</h6>
                        </div>

                        <div class="modal-content">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12  col-md-12 col-12 table-responsive">
                                            <table class="table table-bordered table-sm text-center mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="3">
                                                            <div class="d-flex flex-column">
                                                                <span class="heading d-block text-capitalize text-dark fw-bold text-dark fw-bold">Código</span>
                                                                @if ($productos[0]->codigo !== '')
                                                                    <span class="subheadings text-capitalize">{{$productos[0]->codigo}}</span>
                                                                @else
                                                                    <span class="subheadings text-capitalize">N/D</span>
                                                                @endif
                                                            </div>
                                                        </td>

                                                        <td colspan="3">
                                                            <div class="d-flex flex-column">
                                                                <span class="heading d-block text-capitalize text-dark fw-bold">Familia</span>
                                                                @if ($productos[0]->familia !== '')
                                                                    <span class="subheadings text-capitalize">{{$productos[0]->familia}}</span>
                                                                @else
                                                                    <span class="subheadings text-capitalize">N/D</span>
                                                                @endif
                                                            </div>
                                                        </td>

                                                        <td colspan="3">
                                                            <div class="d-flex flex-column">
                                                                <span class="heading d-block text-capitalize text-dark fw-bold">SubFamilia</span>
                                                                @if ($productos[0]->grupo !== '')
                                                                    <span class="subheadings text-capitalize">{{$productos[0]->grupo}}</span>
                                                                @else
                                                                    <span class="subheadings text-capitalize">N/D</span>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="3">
                                                            <div class="d-flex flex-column">
                                                                <span class="heading d-block fw-bold text-capitalize">Empaque</span>
                                                                @if ($productos[0]->empaque !== '')
                                                                    <span class="subheadings text-capitalize">{{$productos[0]->empaque}}</span>
                                                                @else
                                                                    <span class="subheadings text-capitalize">N/D</span>
                                                                @endif
                                                            </div>
                                                        </td>

                                                        <td colspan="3">
                                                            <div class="d-flex flex-column">
                                                                <span class="heading d-block fw-bold  text-capitalize">UXV</span>
                                                                @if ($productos[0]->uxv !== '')
                                                                    <span class="subheadings text-capitalize">{{$productos[0]->uxv}}</span>
                                                                @else
                                                                    <span class="subheadings text-capitalize">N/D</span>
                                                                @endif
                                                            </div>
                                                        </td>

                                                        <td colspan="3">
                                                            <div class="d-flex flex-column">
                                                                <span class="heading d-block fw-bold  text-capitalize">Posición</span>
                                                                @if ($productos[0]->posicion !== '')
                                                                    <span class="subheadings text-capitalize">{{$productos[0]->posicion}}</span>
                                                                @else
                                                                    <span class="subheadings text-capitalize">N/D</span>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="3">
                                                            <div class="d-flex flex-column">
                                                                <span class="heading d-block  fw-bold text-capitalize">Cubre Polvo</span>
                                                                @if ($productos[0]->tipoCubrePolvo !== '')
                                                                    <span class="subheadings text-capitalize">{{$productos[0]->tipoCubrePolvo}}</span>
                                                                @else
                                                                    <span class="subheadings text-capitalize">N/D</span>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td colspan="3">
                                                            <div class="d-flex flex-column">
                                                                <span class="heading d-block fw-bold  text-capitalize">Tipo Pistón</span>
                                                                @if ($productos[0]->tipoPiston !== '')
                                                                    <span class="subheadings text-capitalize">{{$productos[0]->tipoPiston}}</span>
                                                                @else
                                                                    <span class="subheadings text-capitalize">N/D</span>
                                                                @endif
                                                            </div>
                                                        </td>

                                                        <td colspan="3">
                                                            <div class="d-flex flex-column">
                                                                <span class="heading d-block fw-bold  text-capitalize">Código Equivalente</span>
                                                                @if ($productos[0]->codigoEquivalente !== '')
                                                                    <span class="subheadings text-capitalize">{{$productos[0]->codigoEquivalente}}</span>
                                                                @else
                                                                    <span class="subheadings text-capitalize">N/D</span>
                                                                @endif
                                                            </div>
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td colspan="5">
                                                            <div class="d-flex flex-column">
                                                                <span class="heading d-block fw-bold  text-capitalize">Lado</span>
                                                                @if ($productos[0]->lado !== '')
                                                                    <span class="subheadings text-capitalize">{{$productos[0]->lado}}</span>
                                                                @else
                                                                    <span class="subheadings text-capitalize">N/D</span>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td colspan="5">
                                                            <div class="d-flex flex-column">
                                                                <span class="heading d-block  fw-bold text-capitalize">Diámetro Interior</span>
                                                                @if ($productos[0]->diametroInterior !== '')
                                                                    <span class="subheadings text-capitalize">{{$productos[0]->diametroInterior}}</span>
                                                                @else
                                                                    <span class="subheadings text-capitalize">N/D</span>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="5">
                                                            <div class="d-flex flex-column">
                                                                <span class="heading d-block fw-bold  text-capitalize">Altura</span>
                                                                @if ($productos[0]->altura !== '')
                                                                    <span class="subheadings text-capitalize">{{$productos[0]->altura}}</span>
                                                                @else
                                                                    <span class="subheadings text-capitalize">N/D</span>
                                                                @endif
                                                            </div>
                                                        </td>

                                                        <td colspan="5">
                                                            <div class="d-flex flex-column">
                                                                <span class="heading d-block fw-bold  text-capitalize">Catálogo</span>
                                                                @if ($productos[0]->catalogo !== '')
                                                                    <span class="subheadings text-capitalize">{{$productos[0]->catalogo}}</span>
                                                                @else
                                                                    <span class="subheadings text-capitalize">N/D</span>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="9">
                                                            <div class="d-flex flex-column">
                                                                <span class="heading d-block fw-bold  text-capitalize">Descripción</span>
                                                                @if ($productos[0]->descripcion !== '')
                                                                    <span class="subheadings text-capitalize">{{$productos[0]->descripcion}}</span>
                                                                @else
                                                                    <span class="subheadings text-capitalize">N/D</span>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-xs-12 mt-3 table-responsive">
          <table class="table table-bordered">
                    <thead class="detalleColor">
                        <tr>
                        <th>#</th>
                        <th>Marca</th>
                        <th>Submarca</th>
                        <th>Modelo</th>
                        <th>Fmsi</th>
                        <th>NoBalata</th>
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
    </main>

    <!-- Modal -->
    <div class="modal fade" id="imagenModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" >
            <img  src="{{asset('img/productos') . '/' . $productos[0]->imagen}}" class="card-img img-fluid img-thumbnail">
        </div>
    </div>


    @endsection
