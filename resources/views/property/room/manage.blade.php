@extends('layouts.admin.design')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Rooms To Sell</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Property</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('room') }}">Rooms</a></li>
                        <li class="breadcrumb-item active">Rooms to sell </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="container">
        <div class="container-fluid">
            
        </div>
    </section>
    
    @endsection