@extends('dashboard.layouts.app')


@section('linksPagina')

@endsection

@section('title')
  Usuarios
@endsection

@section('contenido')

   <!-- Page Wrapper -->
    <div id="wrapper">

        @include('dashboard.layouts.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">



            <!-- Main Content -->
            <div id="content">

            @include('dashboard.layouts.topbar')
            <livewire:tabla-usuarios />
            @include('dashboard.layouts.footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('dashboard.layouts.modals.cerrarSesion')
@endsection




@section('scriptsPagina')

@endsection
