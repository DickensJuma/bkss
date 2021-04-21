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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('room.management') }}" class="row">
                        <div class="form-group col-6">
                            <label for="room">Room</label>
                            <select class="form-control" name="room" id="room">

                            </select>
                        </div>
                            <div class="form-group col-6">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="text" name="quantity" id="quantity" class="form-control">
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    @endsection