<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Dashboard de autopartes">
    <meta name="author" content="Antonio Astudillo">
    <link rel="shortcut icon" href="{{asset('img/icon.png')}}">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"  rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/dashboard/sb-admin.min.css')}}" rel="stylesheet">


     @livewireStyles
</head>

<body id="page-top">
 @yield('contenido')


 <script src="{{asset('js/dashboard/jquery.min.js')}}"></script>
 <script src="{{asset('js/dashboard/bootstrap.bundle.min.js')}}"></script>
 <script src="{{asset('js/dashboard/jquery.easing.min.js')}}"></script>
 <script src="{{asset('js/dashboard/sb-admin-2.min.js')}}"></script>
  <script src="{{asset('js/dashboard/Chart.min.js')}}"></script>
  @livewireScripts
</body>

</html>
