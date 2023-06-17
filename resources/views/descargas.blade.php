@extends('layouts.app')


@section('cssPagina')

@endsection

@section('tituloPagina')
  Descargas
@endsection



@section('contenido')
    <div class="container mt-5">
        <div class="row mt-5">
          <h6 class=" mt-5 text-center border-bottom text-secondary" >Descarga nuestros Catálogos en PDF</h6 >
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4 mt-1">
            <div class="col-3">
                <div class="card h-100">
                    <img src="{{asset('img/catalogos/cat1.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Catálogo frenos</h5>
                        <p class="card-text">Explora nuestra amplia gama de frenos de alta calidad diseñados para ofrecer un rendimiento excepcional y una seguridad óptima en la carretera.</p>
                    </div>
                    <div class="card-footer">
                        <a class="text-muted" target="_blank" href="https://hoautopartes.mx/imagenes/catalogos/CATALOGO-DE-FRENOS-2023-01-04_27.pdf">Link de descarga</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card h-100">
                    <img src="{{asset('img/catalogos/cat2.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Catálogo suspensión</h5>
                        <p class="card-text">Descubre nuestra amplia selección de suspensiones de alta calidad diseñadas para mejorar el manejo y la comodidad de tu vehículo.</p>
                    </div>
                    <div class="card-footer">
                        <a class="text-muted" target="_blank" href="https://hoautopartes.mx/imagenes/catalogos/CATALOGO-DE-SUSPENSION-2023-01-04_15.pdf">Link de descarga</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card h-100">
                    <img src="{{asset('img/catalogos/cat3.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Catálogo pistones</h5>
                        <p class="card-text">Explora nuestra amplia selección de pistones de alta calidad diseñados para mejorar el rendimiento y la eficiencia de tu motor.</p>
                    </div>
                    <div class="card-footer">
                        <a class="text-muted" target="_blank" href="https://hoautopartes.mx/imagenes/catalogos/CATALOGO-PISTONES-2023-01-04_64.pdf">Link de descarga</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card h-100">
                    <img src="{{asset('img/catalogos/cat4.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Catálogo kits freno</h5>
                        <p class="card-text">Ya sea que necesites reemplazar los frenos desgastados de tu vehículo o busques mejorar el rendimiento de frenado, encontrarás la solución perfecta en nuestro catálogo de frenos de confianza.</p>
                    </div>
                    <div class="card-footer">
                        <a class="text-muted" target="_blank" href="https://hoautopartes.mx/imagenes/catalogos/CATALOGO-KITS-FRENO-2023-01-04_82.pdf">Link de descarga</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scriptsPagina')

@endsection
