@extends('layouts.front.design')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                @if($result_counter > 0)
                <div class="alert alert-danger alert-block" id="autoClose" >
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                    <em class="text-warning">{{ $result_counter }} Hotels found</em>
                </div>
                @else
                <div class="alert alert-success alert-block" id="autoClose" >
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                    <em class="text-primary">No results found</em>
                </div>
                @endif
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Search Results</li>
                </ol>
            </div>
        </div>                     
    </div><!-- /.container-fluid -->
</section>

<div class='container'>

<?php echo $hotel_data; ?>
    </div>

@endsection