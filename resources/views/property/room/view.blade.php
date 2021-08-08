@extends('layouts.front.design')
@section('content')
<div class='container'>
    <div class="card">
        <div class="card-header">
            <h5>{{ $hotel->name }} <a href=""><i class="far fa-heart"></i></a>
                <a href=""><i class="fas fa-share-alt"></i></a>
                <a href="" class="btn btn-primary btn-md">Reserve</a>
            </h5>
            <span class="text-warning" data-toggle="tooltip" data-placement="left"
                title="This star rating is provided to Book sasa by the property and is usually determined by an official hotel rating organization or another third party.">
                @for ($star =0 ; $star < $hotel->rating ; $star++)
                    &#9734;
                    @endfor
            </span>
            <i class="fas fa-thumbs-up text-warning" data-toggle="tooltip" data-placement="left"
                title="This is a Preferred Partner property. It's committed to giving guests positive experiences with its excellent service and great value. This property might pay Book sasa a little more to be in this Program"></i>
            <i class="fas fa-map-pin" data-toggle="tooltip" data-placement="left"
                title="After booking, all of the propertyâ€™s details, including telephone and address, are sent to you as part of your booking confirmation and your account.">{{ $hotel->address2 }}</i>
        </div>

        <div class="gallery-card card-body">
            <div class="pics-area">
                @foreach ($images->chunk(100) as $key=>$image)
                @foreach ($image as $item)
                @if ($key===0)
                @if (count($images) == 1)
                <div class="">
                    <div>
                        <span class="image-block block2">
                            <a class="" href="{{ asset('uploads/property/large/'.$item->path) }}"
                                rel="prettyPhoto[gallery]">
                                <img src="{{ asset('uploads/property/small/'.$item->path) }}" class="img-responsive"
                                    alt="Gallery"></a>
                        </span>
                    </div>
                </div>
                @elseif(count($images) == 2 || count($images) == 4 )
                <div class="">
                    <div>
                        <span class="image-block block2">
                            <a class="" href="{{ asset('uploads/property/large/'.$item->path) }}"
                                rel="prettyPhoto[gallery]">
                                <img src="{{ asset('uploads/property/small/'.$item->path) }}" class="img-responsive"
                                    alt="Gallery"></a>
                        </span>
                    </div>
                </div>
                @elseif(count($images) == 3)
                <div class="col-odd">
                    <div>
                        <span class="image-block block2">
                            <a class="" href="{{ asset('uploads/property/large/'.$item->path) }}"
                                rel="prettyPhoto[gallery]" data-lightbox="hotel">
                                <img src="{{ asset('uploads/property/small/'.$item->path) }}" class="img-responsive"
                                    alt="Gallery"></a>
                        </span>
                    </div>
                </div>
                @else
                <div class="gallery-img overflow-img">

                    <a class="" data-lightbox="hotel" href="{{ asset('uploads/property/large/'.$item->path) }}"
                        rel="prettyPhoto[gallery]">
                        <p class="count_pics">+ {{ count($images) - 4 }}</p>
                        <img src="{{ asset('uploads/property/small/'.$item->path) }}" alt="Gallery">

                    </a>


                </div>
                @endif
                @endif
                @endforeach
                @endforeach



            </div>
            <form action='' method='POST' class="container room_table_container">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-10 col-md-10">
                        <div id="room_table" class="w-100 table-hover dt-responsive table table-striped ">

                            <?php echo $hotel_data; ?>
                        </div>
                    </div>
                    <div class="col sticky proceed_large">
                        <p>
                            <span class='room_no'>0</span>
                            Rooms For: $
                            <span class='total_cost'>0</span>.00
                        </p>
                        <input type="submit" class="btn btn-primary btn-sm" value="Save and continue" />
                    </div>
                </div>
            </form>
            <h3>Our facilities</h3>
            <ul>
                <?php echo $facility_design; ?>
            </ul>
        </div>
    </div>
</div>
<script>
jQuery(document).ready(function() {
    jQuery(".quantity").on('change', function() {
        var totalRoomCost = 0;
        var numberOfRooms = 0;
        //loop through each select
        jQuery(".quantity").each(function() {
            var roomNo = jQuery(this).val() != "" ? parseInt(jQuery(this).val()) : 0;
            var cost = parseInt(jQuery(this).closest("tr").find('.charge p span').text());
            totalRoomCost += roomNo * cost;
            numberOfRooms += roomNo;
        });
        jQuery('.room_no').html(numberOfRooms);
        jQuery('.total_cost').html(totalRoomCost);
    });
})
</script>
@endsection