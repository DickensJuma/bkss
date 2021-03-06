<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Booking, space, office.">
    <title>Book sasa | Home.</title>
    <link rel="shortcut icon" href="{{asset('front/assets/images/icon/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('front/assets/images/icon/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('front/assets/images/icon/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('front/assets/images/icon/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('front/assets/images/icon/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('front/assets/images/icon/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('front/assets/images/icon/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('front/assets/images/icon/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('front/assets/images/icon/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('front/assets/images/icon/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{asset('front/assets/images/icon/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('front/assets/images/icon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('front/assets/images/icon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('front/assets/images/icon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('front/assets/images/icon/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('front/assets/images/icon/ms-icon-144x144.png')}}">
    <link href="{{ asset('front/assets/css/prettyPhoto.css')}}" rel="stylesheet" type="text/css" />
    <meta name="theme-color" content="#ffffff"><!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('back/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/lightbox.css') }}">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/css/theme.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/style.css')}}">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
    <!-- Jquery-->
    <script src="{{asset('back/plugins/jquery/jquery.min.js')}}"></script>
    <!--jquery ui -->
    <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('back/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
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
    <script src="{{ asset('front/assets/js/jquery.quicksand.js')}}" type="text/javascript"></script>
    <script src="{{ asset('front/assets/js/script.js')}}" type="text/javascript"></script>
    <script src="{{ asset('front/assets/js/jquery.prettyPhoto.js')}}" type="text/javascript"></script>
    <!-- //jQuery-Photo-filter-lightbox-Gallery-plugin -->
    <!-- SweetAlert2 -->
    <script src="{{asset('back/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <!--timepicker-->
    <script src="{{ asset('back/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front/assets/js/lightbox.min.js') }}"></script>

    <script type="text/javascript">
    jQuery('.timepick').timepicker();
    @if(session('erroralert'))
    jQuery(document).ready(function() {
        Swal.fire(
            "Failed!",
            "{{ session('erroralert') }}",
            "error");
    });
    @endif
    @if(session('successalert'))
    jQuery(document).ready(function() {
        Swal.fire(
            "Done!",
            "{{ session('successalert') }}",
            "success");
    });
    @endif
    @if(session('warningalert'))
    jQuery(document).ready(function() {
        Swal.fire(
            "Access Denied!",
            "{{ session('warningalert') }}",
            "warning");
    });
    @endif
    </script>

    <script type="text/javascript">
    const viewMore = document.querySelectorAll('.rooms_table_div');
    const tables = document.querySelectorAll('.table_details');

    viewMore.forEach((e) => {
        e.addEventListener('click', (event) => {
            const table = e.getElementsByClassName('table_details')
            if (event.target.nodeName == 'BUTTON') {
                const btn = e.getElementsByClassName('btn');
                tables.forEach(item => {

                    if (!item.classList.contains('d-none')) {
                        if (item !== table[0]) {
                            item.classList.add('d-none')
                        };
                    }
                });
                const desc = e.querySelector('#room_desc');
                table[0].classList.toggle('d-none');
                if (!table[0].classList.contains('d-none')) {
                    btn[0].innerText = 'Hide details'
                    desc.classList.remove('d-none');
                } else {
                    btn[0].innerText = 'View details';
                    desc.classList.add('d-none');
                }

            }

        })
    })
    </script>
</body>

</html>