<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Booking, space, office.">
        <title>Book sasa | Home.</title>
        <link rel="shortcut icon" href="{{asset('front/assets/images/favicon.ico')}}" type="image/x-icon"> 
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{asset('back/plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Bootstrap CSS -->    
        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{asset('front/assets/css/theme.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/assets/css/style.css')}}">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <!-- bs-custom-file-input -->
        <script src="{{asset('back/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

    </head>
    <body>
        <div class="main-wrapper">
             @include('layouts.front.header')
            <!--page content section-->
            @yield('content')
            <!--footer section-->
            @include('layouts.front.footer')
        </div>
        <!-- ============================================================== -->
        <!-- end main wrapper -->
        <!-- ============================================================== -->
        <!-- Libs JS -->
        <script src="{{asset('front/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('front/assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
        <script src="{{asset('front/assets/libs/select2/dist/js/select2.min.js')}}"></script>         
        <script src="{{asset('front/assets/libs/moment/min/moment.min.js')}}"></script>    
        <script src="{{asset('front/assets/libs/lightpick/lightpick.js')}}"></script> 
        <!-- Theme JS -->
        <script src="{{asset('front/assets/js/theme.min.js')}}"></script>
    </body>
</html>