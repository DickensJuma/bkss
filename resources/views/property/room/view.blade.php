@extends('layouts.front.design')
@section('content')
<div class='container'>
    <div class="card">
        <div class="card-header">
            <h5>{{ $hotel->name }} <a href=""><i class="far fa-heart"></i></a>
                <a href=""><i class="fas fa-share-alt"></i></a>
            <a href="" class="btn btn-primary btn-md">Reserve</a></h5>
            <span class="text-warning" data-toggle="tooltip" data-placement="left" title="This star rating is provided to Book sasa by the property and is usually determined by an official hotel rating organization or another third party.">
                @for ($star =0 ; $star < $hotel->rating ; $star++)
                &#9734;
                @endfor
            </span>
            <i class="fas fa-thumbs-up text-warning" data-toggle="tooltip" data-placement="left" title="This is a Preferred Partner property. It's committed to giving guests positive experiences with its excellent service and great value. This property might pay Book sasa a little more to be in this Program"></i>
            <i class="fas fa-map-pin" data-toggle="tooltip" data-placement="left" title="After booking, all of the property’s details, including telephone and address, are sent to you as part of your booking confirmation and your account." >{{ $hotel->address2 }}</i>
        </div>
        <div class="card-body">
            <div class="portfolio-area">
                @foreach ($images->chunk(4) as $key=>$image)
                <div class="row">
                    @foreach ($image as $item)
                    @if ($key===0)
                    <div class="col-md-3">
                        <div>
                            <span class="image-block block2">
                            <a class="image-zoom" href="{{ asset('uploads/property/large/'.$item->path) }}" rel="prettyPhoto[gallery]">							
                                    <img src="{{ asset('uploads/property/small/'.$item->path) }}" class="img-responsive" alt="Gallery"></a>
                        </span>
                        </div>
                    </div>                        
                    @else
                    <div style="display: block">
                            <span class="image-block block2">
                            <a class="image-zoom" href="{{ asset('uploads/property/large/'.$item->path) }}" rel="prettyPhoto[gallery]">							
                                    <img src="{{ asset('uploads/property/small/'.$item->path) }}" class="img-responsive" alt="Gallery"></a>
                        </span>
                    </div>
                        
                    @endif
                    @endforeach
                </div>
                @endforeach
            </div>
            <table class="table table-striped text-center">
                <thead class="bg-success">
                    <th>Room Type</th>
                    <th>Sleeps</th>
                    <th>Price For <span class="text-light">{{ $totalstay }} {{ Str::plural('day',$totalstay) }}</span></th>
                    <th>Your Choices</th>
                    <th>Select Rooms</th>
                    <th>Reserve?</th>
                </thead>
                <?php echo $hotel_data; ?>
            </table>
        </div>
        
    </div>
    </div>
@endsection