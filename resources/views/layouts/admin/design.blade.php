<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Book Sasa | Dashboard</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
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
  <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('front/assets/images/icon/android-icon-192x192.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('front/assets/images/icon/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{asset('front/assets/images/icon/favicon-96x96.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('front/assets/images/icon/favicon-16x16.png')}}">
  <link rel="manifest" href="{{asset('front/assets/images/icon/manifest.json')}}">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="{{asset('front/assets/images/icon/ms-icon-144x144.png')}}">
  <meta name="theme-color" content="#ffffff">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('back/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="{{asset('back/plugins/fullcalendar/main.css')}}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('back/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('back/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('back/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('back/dist/css/adminlte.min.css')}}">
  <!-- My styles -->
  <link rel="stylesheet" href="{{asset('back/dist/css/style.css')}}">
  <!-- Year picker styles -->
  <link rel="stylesheet" href="{{asset('back/plugins/yearpicker/dist/yearpicker.css')}}">
  <!-- jQuery -->
<script src="{{asset('back/plugins/jquery/jquery.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{asset('back/plugins/moment/moment.min.js')}}"></script>
<!-- Include Bootstrap Datepicker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" integrity="sha512-63+XcK3ZAZFBhAVZ4irKWe9eorFG0qYsy2CaM5Z+F3kUn76ukznN0cp4SArgItSbDFD1RrrWgVMBY9C/2ZoURA==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg==" crossorigin="anonymous"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
@include('layouts.common.header')
@include('layouts.admin.sidebar')
<!--page content section-->
@yield('content')
@include('layouts.common.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- SweetAlert2 -->
<script src="{{asset('back/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('back/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('back/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('back/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('back/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('back/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('back/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('back/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('back/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('back/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('back/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('back/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('back/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('back/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('back/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- bs-custom-file-input -->
<script src="{{asset('back/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('back/dist/js/adminlte.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('back/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('back/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('back/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('back/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('back/plugins/chart.js/Chart.min.js')}}"></script>
<!-- jQuery UI -->
<script src="{{asset('back/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- fullCalendar 2.2.5 -->
<script src="{{ asset('front/assets/js/jquery.prettyPhoto.js')}}" type="text/javascript"></script>
    <!-- //jQuery-Photo-filter-lightbox-Gallery-plugin -->
<script src="{{asset('back/plugins/fullcalendar/main.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('back/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('back/dist/js/pages/dashboard2.js')}}"></script>
<script src="{{asset('back/plugins/yearpicker/dist/yearpicker.js')}}" async></script>
<script type="text/javascript">
 jQuery(document).ready(function () {
   jQuery("#table").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');
   jQuery('.datepicker').datetimepicker({
      inline: true,
      sideBySide: true,
      format:'YYYY-MM-DD HH:mm:ss'
    });
   jQuery('.yearpicker').datetimepicker({
      inline: true,
      sideBySide: true,
      format:'YYYY'
    });
  });
  @if (session('erroralert'))
   jQuery(document).ready(function () {
      Swal.fire(
          "Failed!",    
      "{{ session('erroralert') }}",
      "error"); 
    });
  @endif
  @if (session('successalert'))
   jQuery(document).ready(function () {
      Swal.fire(
          "Done!",    
      "{{ session('successalert') }}",
      "success");
    });
  @endif
  @if (session('warningalert'))
   jQuery(document).ready(function () {
      Swal.fire(
          "Access Denied!",    
      "{{ session('warningalert') }}",
      "warning");
    });
  @endif  
 jQuery(function () {
    bsCustomFileInput.init();
  });
</script>
<!-- Full calendar script -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
  
    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      themeSystem: 'bootstrap',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      selectable: true,
      eventSources: [
          {
          url: '/property/calendar/data',
          type: 'GET',
          error: function() {
          alert('there was an error reading the data.');
          },
          color: '#dc3545', // a non-ajax option
          textColor: 'white' // a non-ajax option
          },
          ], //This picks up events via JSON calls. You can use other words in place of "events" to convey different requests.
    });
    calendar.setOption('locale', 'en');
    calendar.render();
  });
  </script>
</body>
</html>
