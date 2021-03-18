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
              <div class="col-6">
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">Cancellation and Prepayment Policies</h3>
                      </div>
                      <div class="card-body">
                          <ul>
                                @if ($policies->advance_cancellation == 0)
                                <p>Flexible: by 18:00 on arrival day</p>
                                <li>Guests can cancel free of charge untill 18:00 on day of arrival. The guests will be charged the cost of the {{$policies->full_pay}}
                                  if they cancel by 18:00 on the arrival day.</li>
                                @elseif($policies->advance_cancellation == 1)
                                <p>Flexible: 1 day</p>
                                <li>Guests can cancel free of charge untill 1 day before arrival. The guests will be charged the cost of the {{$policies->full_pay}}
                                  if they cancel 1 day before arrival</li>
                                @elseif($policies->advance_cancellation == 2)
                                <p>Flexible: 2 days</p>
                                <li>Guests can cancel free of charge untill 2 days before arrival. The guests will be charged the cost of the {{$policies->full_pay}}
                                  if they cancel in the 2 days before arrival</li>
                                @elseif($policies->advance_cancellation == 3)
                                <p>Flexible: 3 Days</p>
                                <li>Guests can cancel free of charge untill 3 days before arrival. The guests will be charged the cost of the {{$policies->full_pay}}
                                  if they cancel in the 3 days before arrival</li>
                                @elseif($policies->advance_cancellation == 7)
                                <p>Flexible: 7 Days</p>
                                <li>Guests can cancel free of charge untill 7 days before arrival. The guests will be charged the cost of the {{$policies->full_pay}}
                                  if they cancel in the 7 days before arrival</li>
                                @else
                                <p>Flexible: 14 Days</p>
                                <li>Guests can cancel free of charge untill 14 days before arrival. The guests will be charged the cost of the {{$policies->full_pay}}
                                if they cancel in the 14 days before arrival</li>
                                @endif
                                <li>No prepayment is needed.</li>
                                <p>If you want to add a non-refundable policy to a particular date, you can do this through your Calendar</p>
                                <button class="btn btn-primary">Edit</button>
                            </ul>
                      </div>
                  </div>
              </div>
              <div class="col-6">
                  <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Pre-authorization Preferences</h3>
                  </div>
                  <div class="card-bod">
                    <p>I don't pre-authorize guests' credit cards before arrival.</p>
                    <p class="text-success"><i class="fas fa-check-circle"></i>Your pre-authorization preferences are up-to-date</p>
                    <button class="btn btn-primary">Update Preferences</button>
                  </div>
                  </div>
                  </div>
          </div>
          <div class="divider">
            <h3>Children & Extra Beds</h3>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Child policies and rates</h3>
                </div>
                <div class="card-body">
                  <p>Child policies:</p>
                  <ul><li>Children of all ages are allowed.</li></ul>
                  <P>Child rates:</P>
                  <ul>
                    <li>Children aged 2 years an bellow in cribs pay $ {{ $amenities->child_in_crib_cost }}</li>
                    <li>Other children aged 3 years and {{ $amenities->extra_child_max_age }} will pay $ {{ $amenities->extra_child_cost }}</li>
                  </ul>
                  <button class="btn btn-primary">Edit</button>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Extra Adult on extra beds</h3>
                </div>
                <div class="card-body">
                  <ul>
                    @if ($amenities->extra_adult_cost >0)
                    <li>Extra adults allowed</li>
                    <p>Extra Adult rates:</p>
                    <li>Extra adults on extra beds pay $ {{ $amenities->extra_adult_cost }}</li>
                    @endif
                  </ul>
                  <button class="btn btn-primary">Edit</button>
                </div>
              </div>
            </div>
          </div>
          <div class="divider">
            <h3>Internet, Parking, Pets and checkout Policies</h3>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Internet, Parking & Pets</h3>
                </div>
                <div class="card-body">
                  <ul>
                    <p>Internet</p>
                    <li>WiFi is available in the hotel rooms and is free of charge.</li>
                    <br>
                    <p>Parking</p>
                    @if ($facilities->parking == 'no')
                    <li>No parking available for guests in the hotel</li>
                    @else
                    <li>{{ $facilities->parking }} {{ $facilities->parking_type }} parking available @if ($facilities->parking_loc == 'site')
                      on site
                      @else
                      off site
                    @endif
                    @if ($facilities->parking_reservation =='res_needed')
                        Reservation is needed
                        @else
                        No reservation needed
                    @endif
                    @if ($facilities->parking_fee)
                    at $ {{ $facilities->parking_fee }}
                    @endif
                  </li>
                    @endif
                    <br>
                  <p>Pets</p>
                  <li> @if ($policies->pets_allowed == 'yes')
                    Pets are allowed
                    @if ($policies->pets_fee == 'free')
                    free of charge
                    @else
                    Though Charges may apply
                    @endif
                    @elseif($policies->pets_allowed =='no')
                    Pets are not allowed
                    @if ($policies->pets_fee == 'free')
                    free of charge
                    @else
                    Though Charges may apply
                    @endif
                    @else
                    Pets are allowed upon request
                    @if ($policies->pets_fee == 'free')
                    free of charge
                    @else
                    Though Charges may apply
                    @endif                      
                  @endif</li>
                  </ul>
                  <button class="btn btn-primary">Edit</button>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Guest Information</h3>
                </div>
                <div class="card-body">
                  <p>Check-in & Check-out Times</p>
                  <ul>
                    <li>Check-in from {{ $policies->checkin_from }} to {{ $policies->checkin_to }}</li>
                    <li>Check-out from {{ $policies->checkout_from }} to {{ $policies->checkout_to }}</li>
                    <br>
                    <p>Guest Address Details</p>
                    <li>Your guests do not have to provide their address details when they book</li>
                    <br>
                    <p>Guest Phone Number</p>
                    <li>Your guests must provide a phone number when they book</li>
                    <br>
                    <p>Age Limit</p>
                    <li>No age limit</li>
                    <br>
                    <p>Curfew</p>
                    <li>No curfew</li>
                  </ul>
                  <button class="btn btn-primary">Edit</button>
                </div>
              </div>
            </div>
          </div>
      </div>
  </section>
</div>
@endsection