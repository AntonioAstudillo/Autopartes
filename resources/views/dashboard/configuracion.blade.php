@extends('dashboard.layouts.app')


@section('linksPagina')

@endsection

@section('title')
  Configuración
@endsection

@section('contenido')

<div class="container mt-5 card p-5 shadow">
    @if(session('mensajeSuccess'))
        <div class="container">
            <div class="alert alert-success" role="alert">
                {{session('mensajeSuccess')}}
            </div>
        </div>
    @endif
    <form method="post" action="{{route('dashboard.updateUser')}}" id="formConfiguracion">
        @csrf
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="usuario">Usuario</label>
                <input type="text" class="form-control" name="usuario" placeholder="Ingresa tu usuario" value="{{auth()->user()->user}}">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ingresa tu nombre" value="{{auth()->user()->nombre}}">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="correo">Correo</label>
                <input type="email" class="form-control" name="correo" placeholder="Ingresa tu correo" value="{{auth()->user()->email}}">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="***********************************************************" value="">
            </div>
        </div>

        <div class="d-flex justify-content-end">
                <button id="btnUpdateUser" class="btn btn-primary mt-3" type="submit">Actualizar información</button>
        </div>
        <a href="{{ route('dashboard.index') }}" class="text-primary">Regresar Inicio</a>
    </form>
</div>




@endsection




@section('scriptsPagina')
 <script src="{{asset('js/dashboard/configuracion.js')}}" type="module" ></script>

@endsection

