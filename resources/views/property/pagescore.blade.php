@extends('layouts.admin.design')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
             Property page score
              <sup class="text-danger"><small>new</small></sup>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('adminhome') }}">Home</a></li>
              <li class="breadcrumb-item active">Property page score</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
            <div class="alert alert-success alert-block" id="autoClose" >
                <button type="button" class="close" data-dismiss="alert">×</button>	
                <em class="text-primary">Coming soon</em>
            </div>
</div>
    
@endsection