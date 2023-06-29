@extends('dashboard.layouts.app')


@section('linksPagina')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
 <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.js" integrity="sha512-8l10HpXwk93V4i9Sm38Y1F3H4KJlarwdLndY9S5v+hSAODWMx3QcAVECA23NTMKPtDOi53VFfhIuSsBjjfNGnA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="{{asset('js/dashboard/dropzone.js')}}" type="module" ></script>
@endsection
