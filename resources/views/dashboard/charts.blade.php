@extends('dashboard.layouts.app')


@section('linksPagina')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@endsection

@section('title')
  Estadisticas
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
                <div class="d-flex justify-content-center">
                    <div id="piechart_3d" style="width: 900px; height: 560px;"></div>
                </div>

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
     <script src="{{asset('js/dashboard/charts.js')}}" type="module" ></script>
@endsection
