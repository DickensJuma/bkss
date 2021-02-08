@extends('layouts.front.design')

@section('content')
    <div class="container">
        <h3 class="text-center">List your property on Book sasa and start welcoming guests in no time!!</h3>
        <p>To get started select the type of property you want to list</p>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <image class="icon-rounded" src="{{ asset('front/assets/images/apartment-icon.png') }}"></image>
                        <h4 class="text-success">Apartment</h4>
                    </div>
                    <div class="card-body">
                        <p>Furnished and self-catering accomodation</p>
                    </div>
                    <div class="card-footer">
                        <a href="" class="btn btn-secondary">List your property</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <image class="icon-rounded" src="{{ asset('front/assets/images/home-icon.png') }}"></image>
                        <h4 class="text-success">Homes</h4>
                    </div>
                    <div class="card-body">
                        <p>Properties like vacation homes, villas, etc.</p>
                    </div>
                    <div class="card-footer">
                        <a href="" class="btn btn-secondary">List your property</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <image class="icon-rounded" src="{{ asset('front/assets/images/hotel-icon.png') }}"></image>
                        <h4 class="text-success">Hotel, B&Bs & More</h4>
                    </div>
                    <div class="card-body">
                        <p>Properties like hotels, B&Bs, guest houses, hostels, etc.</p>
                    </div>
                    <div class="card-footer">
                        <a href="" class="btn btn-secondary">List your property</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <image class="icon-rounded" src="{{ asset('front/assets/images/tent-icon.png') }}"></image>
                        <h4 class="text-success">Alternative places</h4>
                    </div>
                    <div class="card-body">
                        <p>Properties like boats, campgrounds, luxury tents, etc.</p>
                    </div>
                    <div class="card-footer">
                        <a href="" class="btn btn-secondary">List your property</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection