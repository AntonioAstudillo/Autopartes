<div>
    <div class="container mt-4 mb-5 p-2">
        <div class="card">
            <p class="card-header busquedaPersonalizadaHead rounded border fw-bold">Búsqueda personalizada</p>
            <div class="card-body rounded border shadow">
                <div class="row">
                    <div class="col-md-6 col-xs-12 mb-3">
                        <p class="card-title fw-bold">Marca</p>
                        <select id="selectMarcas" wire:change="handleChange($event.target.value)"  class="form-select form-select-sm" aria-label="Select marcas">
                            <option value="0" selected>Selecciona una marca</option>
                            @foreach ($marcas as $marca )
                                <option value="{{$marca->marca}}">{{$marca->marca}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 col-xs-12 mb-2">
                        <p class="card-title fw-bold">Submarca</p>
                        <select id="selectSubmarcas" class="form-select form-select-sm" aria-label="Select submarcas">
                            <option value="" selected>Selecciona una submarca</option>
                            @if($submarcas !== null)
                                @foreach ($submarcas as $submarca )
                                    <option value="{{$submarca->submarca}}">{{$submarca->submarca}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-2">
                    <button id="btnVerProductos" class="btn btn-sm botonBusqueda">Ver productos</button>
                </div>
            </div>
        </div>
    </div>
</div>
