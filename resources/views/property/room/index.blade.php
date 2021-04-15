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
            <li class="breadcrumb-item active">Rooms</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-8">
          <div class="row">
          <?php echo $room_design ?>
          </div>
        </div>
        <div class="col-4">
          <a href="{{ route('room.create',$property->id) }}">
            <div class=" card bg-primary">
              <div class="card-header text-center">
                <h3 class="card-title">create a new room</h3>
              </div>
            <div class="card-body text-center">
              <i class="fa fa-plus-circle fa-7x"></i>
            </div>
            <div class="card-footer"></div>
          </div></a>
        </div>
      </div>
    </div>
  </section>
  
  @endsection