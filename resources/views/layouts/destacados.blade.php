 <hr class="featurette-divider">

<div class="pricing-header p-3 pb-md-4 mx-auto text-center mt-3">
      <h1 class="display-4 fw-normal">Productos destacados</h1>
      <p class="fs-5 text-muted">Tu destino para encontrar las mejores autopartes al mejor precio.</p>
</div>



<div  class="owl-carousel owl-theme">
    @foreach ($destacados as $destacado )
        <div class="item">
            <div class="card">
                <img src="{{asset('img/productos'). '/'. $destacado->imagen}}"
                 onerror="this.src='{{asset('img/404.jpg')}}';"
                 class="card-img-top" alt="Imagen del producto {{$destacado->codigo}}">
                <div class="card-body">
                    <h5 class="card-title text-center">{{$destacado->codigo}}</h5>
                    <ul>
                        <li>Familia: <span class="fw-bold text-dark">{{$destacado->familia}}</span> </li>
                        <li>Empaque: <span class="fw-bold text-dark">{{$destacado->empaque}}</span></li>
                        <li>Posición: <span class="fw-bold text-dark">{{$destacado->posicion}}</span></li>
                        @if($destacado->diametroInterior !== '')
                           <li>Diámetro Interior: <span class="fw-bold text-dark">{{$destacado->diametroInterior}}</span></li>
                        @endif
                        @if($destacado->altura !== '')
                           <li>Altura: <span class="fw-bold text-dark">{{$destacado->altura}}</span></li>
                        @endif
                        <li>Catálogo: <span class="fw-bold text-dark">{{$destacado->catalogo}}</span></li>
                    </ul>
                    <div class="d-flex justify-content-center">
                        <a href="#" class="btn botonBusqueda text-center">Detalles</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>



