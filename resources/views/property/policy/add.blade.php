@extends('layouts.front.design')
@section('content')
<script type="text/javascript">
@if (session('alert'))
$(document).ready(function () {
    Swal.fire(
        "Good job!",    
    "{{ session('alert') }}",
    "success");
    
});
@endif
</script>
@endsection