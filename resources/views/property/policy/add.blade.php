@extends('layouts.front.design')
@section('content')
<script type="text/javascript">
@if (session('alert'))
jQuery(document).ready(function () {
    Swal.fire(
        "Good job!",    
    "{{ session('alert') }}",
    "success");
    
});
@endif
</script>
@endsection