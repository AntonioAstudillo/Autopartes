@extends('layouts.app')


@section('cssPagina')
{{-- <script src="https://www.google.com/recaptcha/api.js?render=6LcazT8iAAAAANdWuJVBmYyGv-xHaM_p3TZNED7q"></script> --}}
 <script src="https://www.google.com/recaptcha/api.js"></script>
@endsection

@section('tituloPagina')
 Contacto
@endsection



@section('contenido')
<div class="container-fluid mt-3 px-5">
    <div class="container mt-2 p-5">
        <div class="mt-2 row">
            <div class="col-md-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.293966698892!2d-103.3382247249015!3d20.657616000422863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b222808b977b%3A0xf4909e22a3370177!2sHO%20AUTOPARTES!5e0!3m2!1ses-419!2smx!4v1686938765130!5m2!1ses-419!2smx" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="mt-5 col-md-12 card p-4">
            <form id="formContacto" class="row g-3" method="post">
                <h3 class="text-center">Envianos un mensaje</h3>
                @csrf
                <div class="col-md-12">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" placeholder="Ingresa tu nombre" name="nombre" id="nombre">
                </div>
                <div class="col-md-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Ingresa tu correo electrónico" name="email" id="email">
                </div>
                <div class="col-12">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Ingresa tu teléfono">
                </div>
                <div class="mb-3">
                    <label for="mensaje" class="form-label">Mensaje</label>
                    <textarea placeholder="Escribe tu mensaje" class="form-control" id="mensaje" name="mensaje" rows="3"></textarea>
                </div>

                <div class="col-12">
                    <button id="btnEnviar" class="g-recaptcha btn botonBusqueda text-white" data-sitekey="6LcazT8iAAAAANdWuJVBmYyGv-xHaM_p3TZNED7q"
                            data-callback='onSubmit'data-action='register'>Enviar
                    </button>


                     <button id="btnEnviando" class="btn botonBusqueda text-white d-none" >
                      <span id="spinner" class="spinner-border spinner-border-sm " role="status" aria-hidden="true"></span>
                            Enviando
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection


@section('scriptsPagina')
<script src="{{asset('js/contacto.js')}}"></script>
@endsection
