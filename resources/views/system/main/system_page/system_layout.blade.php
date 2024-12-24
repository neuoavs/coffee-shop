<?
use Illuminate/Support/Facades/Session;
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Neuorol Coffee</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('resources/assets/system/img/logo-small.png')}}">

    <link rel="stylesheet" href="{{asset('resources/assets/system/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('resources/assets/system/css/animate.css')}}">
    
    <link rel="stylesheet" href="{{asset('resources/assets/system/css/dataTables.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{asset('resources/assets/system/plugins/fontawesome/css/fontawesome.min.css')}}">
    
    <link rel="stylesheet" href="{{asset('resources/assets/system/plugins/fontawesome/css/all.min.css')}}">

    @yield('style')

    <link rel="stylesheet" href="{{asset('resources/assets/system/css/neuorol-style.css')}}">
</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">
        <!-- Header -->
        @include('system.elements.system_page.header')
        <!-- End header -->

        <!-- Sidebar -->
        @include('system.elements.system_page.sidebar')
        <!-- End sidebar -->
        @yield('content')
    </div>

    <script src="{{asset('resources/assets/system//js/jquery-3.6.0.min.js')}}"></script>

    <script src="{{asset('resources/assets/system/js/feather.min.js')}}"></script>

    <script src="{{asset('resources/assets/system/js/jquery.slimscroll.min.js')}}"></script>
    
    <script src="{{asset('resources/assets/system/js/bootstrap.bundle.min.js')}}"></script>

    @yield('script')

    <script src="{{asset('resources/assets/system/js/neuorol-script.js')}}"></script>
</body>

</html>