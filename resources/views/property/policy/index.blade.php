@extends('layouts.admin.design')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Policies</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Property</a></li>
            <li class="breadcrumb-item active">Policies</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">Cancellation and Prepayment Policies</h3>
                      </div>
                      <div class="card-body">
                          @if ($policies->advance_cancellation == 0)
                          <p>Flexible: by 18:00 on arrival day</p>
                          @elseif($policies->advance_cancellation == 1)
                          <p>Flexible: 1 day in advance</p>
                          @elseif($policies->advance_cancellation == 2)
                          <p>Flexible: 2 days in advance</p>
                          @elseif($policies->advance_cancellation == 3)
                          <p>Flexible: 3 Days in advance</p>
                          @elseif($policies->advance_cancellation == 7)
                          @endif
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
</div>
@endsection