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
            <form action='' method='POST' class="container">
                @csrf
                <div class="row">
                    <div class="col-10">
                        <table class="table table-striped text-center">
                            <thead class="bg-success">
                                <th>Room Type</th>
                                <th>Sleeps</th>
                                <th>Price For <span class="text-light">{{ $totalstay }}
                                        {{ Str::plural('day',$totalstay) }}</span></th>
                                <th>Your Choices</th>
                                <th>Select Rooms</th>
                            </thead>
                            <?php echo $hotel_data; ?>
                        </table>
                    </div>
                    <div class="col sticky">
                        <p>
                            <span class='room_no'>0</span>
                            Rooms For: $
                            <span class='total_cost'>0</span>.00
                        </p>
                        <p class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-info">
                            Proceed to reserve
                        </p>
                    </div>
                </div>
                <div class="modal fade" id="modal-info">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Personal Infomation</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="tel" class="form-label">Telephone No</label>
                                    <input type="text" class="form-control" name="tel" required>
                                </div>
                                <div class="form-group">
                                    <label for="message" class="form-label">What message would you like the hotel to
                                        know before you arrive?</label>
                                    <textarea class="form-control" name="message" id="" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-outline-success" value="Save and reserve" />
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </form>
            <h3>Our facilities</h3>
            <ul>
                <?php echo $facility_design; ?>
            </ul>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $(".quantity").on('change', function() {
        var totalRoomCost = 0;
        var numberOfRooms = 0;
        //loop through each select
        $(".quantity").each(function() {
            var roomNo = $(this).val() != "" ? parseInt($(this).val()) : 0;
            var cost = parseInt($(this).closest("tr").find('.charge p span').text());
            totalRoomCost += roomNo * cost;
            numberOfRooms += roomNo;
        });
        $('.room_no').text(numberOfRooms);
        $('.total_cost').text(totalRoomCost);
    });
})
</script>
@endsection