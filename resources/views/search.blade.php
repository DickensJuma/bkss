@extends('layouts.front.design')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                @if($result_counter > 0)
                <div class="alert alert-success alert-block" id="autoClose">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <em class="text-default">{{ $result_counter }} Hotels found</em>
                </div>
                @else
                <div class="alert alert-danger alert-block" id="autoClose">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <em class="text-warning">No results found</em>
                </div>
                @endif
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Search Results</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class='container my-5'>
    <div class="row">
        <div class="col-12 col-md-4 col-lg-4 well search__col">
            <div class="booking-form card my-3 my-lg-0 my-md-0">
                <form action="{{ route('search') }}" method="POST">
                    @csrf
                    <div class="hotel-search-results">
                        <div class="">

                            <div class="form-group">
                                <span class="form-label">Destination</span>
                                <input type="text" name="destination" placeholder="Where To ?">
                            </div>

                        </div>


                        <div class="">
                            <div class="form-group">
                                <span class="form-label">Check In</span>
                                <input name="in" type="date" id="datepicker" placeholder="Check In">
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <span class="form-label">Check out</span>
                                <input name="out" type="date" id="datepicker1" placeholder="Check Out">
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <span class="form-label">Adults</span>
                                <input type="number" name="adult" value="1">
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <span class="form-label">Kids</span>
                                <input type="number" name="kids" value="0">
                            </div>
                        </div>


                        <div class="search-submit">
                            <div class="form-btn btn">
                                <input type="submit" class="submit-btn" value="Search" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-md-8 col-lg-8">
            <?php echo $hotel_data; ?>
        </div>
    </div>
</div>
@endsection