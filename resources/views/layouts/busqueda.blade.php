<div class="container mt-3 mb-5 p-2">
    <div class="card">
        <p class="card-header busquedaPersonalizadaHead rounded border fw-bold">Búsqueda personalizada</p>
        <div class="card-body rounded border shadow">
            <div class="row">
                <div class="col-md-6 col-xs-12 mb-3">
                    <p class="card-title fw-bold">Marca</p>
                    <select class="form-select form-select-sm" aria-label="Select marcas">
                        <option value="0" selected disabled>Selecciona una marca</option>
                        @foreach ($marcas as $marca )
                            <option value="{{$marca->marca}}">{{$marca->marca}}</option>
                        @endforeach

                    </select>
                </div>

                <div class="col-md-6 col-xs-12 mb-2">
                    <p class="card-title fw-bold">Submarca</p>
                    <select class="form-select form-select-sm" aria-label="Select submarcas">
                        <option value="0" selected disabled>Selecciona una submarca</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-2">
                <button type="button" class="btn btn-sm botonBusqueda">Ver productos</button>
            </div>

        </div>
    </div>
</div>



