@extends('layouts.admin.design')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Rooms Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Property</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('room') }}">Rooms</a></li>
                        <li class="breadcrumb-item active">Rooms turn off </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3>{{ $room_name }}</h3>
                    <form action="{{ route('room.off', $room_to_close->id) }}" method="Post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="from" class="form-lable">Closed From</label>
                                <input type="text" class="form-control datepicker"  id="from" name="from" required>
                            </div>
                            <div class="col-6">
                                <label for="to" class="form-lable">Closed To</label>
                                <input type="text" class="form-control datepicker"  id="to" name="to" required>
                            </div>
                        </div>
                        <input type="Submit" class="btn btn-success from-control" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection