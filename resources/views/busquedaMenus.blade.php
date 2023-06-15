@extends('layouts.app')


@section('tituloPagina')
    Menus
@endsection

@section('contenido')
   <main class="container mt-5">
        <div class="album py-5 ">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach ($productos as $producto )
                        <div class="col">
                            <div class="card">
                                <img width="100%" height="225" src="{{asset('img/productos'). '/'. $producto->imagen}}"
                                onerror="this.src='{{asset('img/404.jpg')}}'; this.style.width='100%'; this.style.height='255'"
                                class="card-img-top" alt="Imagen del producto ">
                                <div class="card-body">
                                    <ul style="list-style: none;">
                                         <li>Código: <span class="fw-bold text-dark">{{$producto->codigo}}</span> </li>
                                        <li>Familia: <span class="fw-bold text-dark">{{$producto->familia}}</span></li>
                                        @if($producto->grupo !== '')
                                            <li>Grupo: <span class="fw-bold text-dark">{{$producto->grupo}}</span></li>
                                        @endif
                                        <li>Empaque: <span class="fw-bold text-dark">{{$producto->empaque}}</span></li>
                                        @if($producto->posicion !== '')
                                             <li>Posición: <span class="fw-bold text-dark">{{$producto->posicion}}</span></li>
                                        @endif
                                        @if($producto->diametroInterior !== '')
                                            <li>Diámetro Interior: <span class="fw-bold text-dark">{{$producto->diametroInterior}}</span></li>
                                        @endif
                                        @if($producto->altura !== '')
                                            <li>Altura: <span class="fw-bold text-dark">{{$producto->altura}}</span></li>
                                        @endif
                                        <li>Catálogo: <span class="fw-bold text-dark">{{$producto->catalogo}}</span></li>
                                    </ul>
                                    <div class="d-flex justify-content-center">
                                        <a href="#" class="btn botonBusqueda text-center">Detalles</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $productos->links() }}
        </div>
    </main>
@endsection
