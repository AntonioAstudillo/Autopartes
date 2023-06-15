@extends('layouts.app')


@section('tituloPagina')
    Búsqueda General
@endsection

@section('contenido')
   <div class="container-fluid">
          <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="text-center row">
                <div class=" col-md-6">
                    <img src="https://cdn.pixabay.com/photo/2017/03/09/12/31/error-2129569__340.jpg" alt="Imagen de producto no encontrado 404" class="img-fluid">
                </div>
                <div class=" col-md-6 mt-5">
                    <p class="fs-3"> <span class="text-danger">Opps!</span> No hay productos.</p>
                    <p class="lead">
                        No tenemos registros de ese producto.
                    </p>
                    <a href="{{route('home')}}" class="btn letra404">Regresar</a>
                </div>

            </div>
        </div>
   </div>
@endsection
