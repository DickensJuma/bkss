@extends('layouts.admin.design')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Amenities</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Property</a></li>
              <li class="breadcrumb-item active">Amenities</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <form action="{{ route('amenity') }}" method="POST">
              @csrf
                <div class="form-group row">
                  <div class="col-md-6"> 
                    <select class="form-control" name="room" id="room">
                    <?php echo $room_dropdown; ?>
                  </select>
                  </div>
                  <div class="col-md-6">
                    <input class="btn btn-primary" type="submit" value="Load">
                  </div>
                </div>
            </form>
            <form action="">
              <?php echo  $amenities_design; ?>
            </form>
          </div>
        </div>
      </div>
    </section>
  @endsection