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
              <div class="col-md-6">
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">Cancellation and Prepayment Policies</h3>
                      </div>
                      <div class="card-body">
                          <ul>
                                @if ($policies->advance_cancellation == 0)
                                <p>Flexible: by 18:00 on arrival day</p>
                                <li>Guests can cancel free of charge untill 18:00 on day of arrival</li>
                                @elseif($policies->advance_cancellation == 1)
                                <p>Flexible: 1 day</p>
                                @elseif($policies->advance_cancellation == 2)
                                <p>Flexible: 2 days</p>
                                @elseif($policies->advance_cancellation == 3)
                                <p>Flexible: 3 Days</p>
                                @elseif($policies->advance_cancellation == 7)
                                <p>Flexible: 7 Days</p>
                                @else
                                <p>Flexible: 14 Days</p>
                                <li>Guests can cancel free of charge untill 14 days before arrival. The gues will be charged the cost of the {{$policies->full_pay}}
                                if they cancel in the 14 days before arrival</li>
                                @endif
                            </ul>
                      </div>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="card">
                  <div class="card-header"></div>
                  </div>
                  </div>
          </div>
      </div>
  </section>
</div>
@endsection