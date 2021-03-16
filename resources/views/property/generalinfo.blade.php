@extends('layouts.admin.design')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Info</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Property</a></li>
              <li class="breadcrumb-item active">General Info</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Property</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <h5>Property Name:</h5>
                <p>{{$property->name}}<br>
                <a href="">Change property name</a></p>
                <div class="break">
                <hr>
                </div>
                <h5>Property Address:</h5>
                <p>{{$property->address2}}&nbsp;{{$property->address}}&nbsp;{{$property->zip}}&nbsp;{{$property->city}}&nbsp;{{$property->country}}</p>
                <div class="break">
                <hr>
                </div>
                <h5>Property Location:</h5>
                <p>{{$property->location}}</p>
                <div class="break">
                <hr>
                </div>
                <h5>Property Status:@if($property->status==1)
                <span class="bg-success text-sm">Open/Bookable</span>
                @else
                <span class="bg-success text-sm">Closed/Not Bookable</span>
                @endif
                </h5>
                <p><a href="">Toggle visibility</a></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Host Type Selection</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                <p>To comply with consumer authority commitments, we need the following information from 
                partners so we can tell guests<br> whether the property they're staying at is run by professional or private host</p>
                <h5>Which option describes you best?</h5>
                <form action="" method="post" id="hostTypeForm">
                <input type="radio" id="professional" name="professional" @if($property->host_type==0)checked @endif>
                <label for="professional">Professional Host</label>
                <div class="divider">
                <p>Any party who rents out a property or properties for any purposes relating to their trade, business or profession (e.g this <br>
                 is your main business; you are a property management company, collect VAT, have a business name e.t.c)</p>
                </div>
                <input type="radio" id="private" name="private" @if($property->host_type==1)checked @endif>
                <label for="private">Private / Non professional Host</label>
                <div class="divider">
                <p>Any party who rents out a property or properties for any purposes outside their trade, business or profession (e.g this <br>
                is a side business, you only rent out ocassionally e.t.c ) </p>
                </div>
                <input type="submit" value="Update your info" class="btn btn-secondary">
                </form>
                </div>
            </div>
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Property management Info</h3>
                <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                </div>
            </div>
            <div class="card-body">
                <p>We strive so hard to give our partners the best possible tools; but to do this, we need your help. By sharing a few details about your property and <br>
                the systems you're currently using, we can work to build connections with your providers to create a seamless experience for you an your guests</p>
                <p>It goes without saying but any data or information you share with us will be regarded as highly confidential and will only be used by us internally <br>
                to improve our services to you - it will not be shared outside of booksasa.com</p>
                <form action="" method="POST" id="systems">
                    @csrf
                    <div class="form-group">
                    <label for="pms" class="form-label">Which Property management system are you currently using?</label>
                    <select name="pms_drop_down" id="" class="form-control">
                    <option value="0" @if($property->pms==0) selected @endif >I don't use a PMS</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="channel" class="form-label">Which channel manager or central reservation system are you using?</label>
                    <select name="channel" id="channel" class="form-control">
                    <option value="0" @if($property->channel_manager==0) selected @endif >I do not use a channel manager</option>
                    </select>
                    </div>
                    <input type="submit" class="btn btn-secondary" value="Update your info">
                </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection