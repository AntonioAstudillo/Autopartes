@extends('dashboard.layouts.app')


@section('linksPagina')

@endsection

@section('title')
  Dashboard
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

                @if(session('errorMensaje'))
                    <div class="container">
                        <div class="alert alert-danger" role="alert">
                            Error, no pudimos procesar la solicitud. Inténtelo de nuevo.
                        </div>
                    </div>
                @endif

                @if(session('successMensaje'))
                    <div class="container">
                        <div class="alert alert-success" role="alert">
                            ¡Producto agregado correctamente!
                        </div>
                    </div>
                @endif

                <livewire:table-productos />

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
    @include('dashboard.layouts.modals.addProducto')
@endsection




@section('scriptsPagina')
 <script src="{{asset('js/dashboard/dropzone.js')}}" type="module" ></script>
@endsection
