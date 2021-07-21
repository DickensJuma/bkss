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
                                <div class="hotel-image"
                                    style="background: url({{asset('uploads/property/large/'.$item->path) }}) 30% 30% no-repeat;">
                                </div>
                            </a>
                        </span>
                    </div>
                </div>
                @elseif(count($images) == 2 || count($images) == 4 )
                <div class="">
                    <div>
                        <span class="image-block block2">
                            <a class="" href="{{ asset('uploads/property/large/'.$item->path) }}"
                                rel="prettyPhoto[gallery]">
                                <div class="hotel-image"
                                    style="background: url({{asset('uploads/property/large/'.$item->path) }}) 30% 30% no-repeat;">
                                </div>
                            </a>
                        </span>
                    </div>
                </div>
                @elseif(count($images) == 3)
                <div class="col-odd">
                    <div>
                        <span class="image-block block2">
                            <a class="" href="{{ asset('uploads/property/large/'.$item->path) }}"
                                rel="prettyPhoto[gallery]" data-lightbox="hotel">
                                <div class="hotel-image"
                                    style="background: url({{asset('uploads/property/large/'.$item->path) }}) 30% 30% no-repeat;">
                                </div>
                            </a>
                        </span>
                    </div>
                </div>
                @else
                <div class="gallery-img overflow-img">

                    <a class="" data-lightbox="hotel" href="{{ asset('uploads/property/large/'.$item->path) }}"
                        rel="prettyPhoto[gallery]">
                        <p class="count_pics">+ {{ count($images) - 4 }}</p>
                        <div class="hotel-image"
                            style="background: url({{asset('uploads/property/large/'.$item->path) }}) 30% 30% no-repeat;">
                        </div>
                        <!-- <img src="{{ asset('uploads/property/small/'.$item->path) }}" alt="Gallery"> -->

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

            <!-- Extra health & safety measures -->
            <div class='health_safety'>
                <div>
                    <img src="{{ asset('front/assets/images/shield.svg') }}" alt="Shield" />
                </div>
                <div>
                    <h4>Extra health & safety measures</h4>
                    <p>
                        This property has taken extra health and hygiene measures to ensure that your safety is their
                        priority <a href="#"> See health & safety details</a>
                    </p>
                </div>

            </div>
            <!-- Extra health & safety measures End -->
            <!-- Top Picks -->
            <div class='top_picks'>
                <h4><span><i class="fas fa-star"></i></span> One of out top picks in {{ $hotel->city }}</h4>
                <div>
                    <p>Located in {{ $hotel->city }}, {{$hotel->name}} is within 1.5 km from the {{ $hotel->city }}
                        County
                        Government
                        and The
                        West End Shopping Mall is 2 km away. Featuring modern decor, this budget hotel offers a
                        restaurant, bar and has a meeting room.
                    </p>
                    <p>Offering 70 studio suites, these bright air-conditioned units come with a
                        kitchenette, flat-screen cable TV and a desk.
                    </p>
                    <p>The restaurant serves breakfast and offers a variety of dishes. The Nyanza Golf Club can be
                        reached in 6 km and the {{ $hotel->city }} International Airport is 12 km away.
                    </p>
                    <p>
                        Business travellers particularly like the location — they rated it 8.3 for a work-related trip.
                    </p>
                    <p>We speak your language! </p>
                    <h5>{{ $hotel->name }} has been welcoming Booksasa.com guests since 9 July 2021.</h5>
                    <p class="missing"> Missing some information? <a href="#">Yes</a> / <a href="#">No</a> </p>
                </div>
            </div>
            <!-- Top Picks End -->
            <!-- Facilities  -->

            <div class="facilities">
                <h3>
                    Facilities of {{ $hotel->name }} <span>Great facilities! Review score,
                        <strong>8.8</strong></span>
                </h3>
                <h4>Most popular facilities </h4>
                <div>
                    <ul class="popular">
                        <li><i class="fas fa-bus"></i> Airport shuttle</li>
                        <li><i class="fas fa-wifi"></i> Free WiFi</li>
                        <li><i class="fas fa-cocktail"></i> Bar</li>
                        <li><i class="fas fa-mug-hot"></i> Very good breakfast</li>
                    </ul>
                </div>
                <div class="services_list">
                    <div>
                        <h4 class='list_header'><i class="fas fa-bath"></i> Bathroom</h4>
                        <ul>
                            <li><i class="far fa-check-square"></i> Toilet paper</li>
                            <li><i class="far fa-check-square"></i> Towels</li>
                            <li><i class="far fa-check-square"></i> Toilet</li>
                            <li><i class="far fa-check-square"></i> Free toiletries</li>
                            <li><i class="far fa-check-square"></i> Hairdryer</li>
                            <li><i class="far fa-check-square"></i> Shower</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class='list_header'><i class="fas fa-utensils"></i> Food & Drink</h4>
                        <ul>
                            <li><i class="far fa-check-square"></i> On-site coffee house</li>
                            <li><i class="far fa-check-square"></i> Fruits</li>
                            <li><i class="far fa-check-square"></i> Bottle of water</li>
                            <li>
                                <i class="far fa-check-square"></i> Wine/champagne <span>Additional charge</span>
                            </li>
                            <li><i class="far fa-check-square"></i> Kid-friendly buffet</li>
                            <li><i class="far fa-check-square"></i> Kid meals <span>Additional charge</span></li>
                            <li><i class="far fa-check-square"></i> Special diet menus (on request)</li>
                            <li><i class="far fa-check-square"></i> Breakfast in the room</li>
                            <li><i class="far fa-check-square"></i> Bar</li>
                            <li><i class="far fa-check-square"></i> Restaurant</li>

                        </ul>
                    </div>

                    <div>
                        <h4 class='list_header'><i class="fas fa-lock"></i> Safety & Security</h4>
                        <ul>
                            <li><i class="far fa-check-square"></i> Fire extinguishers</li>
                            <li><i class="far fa-check-square"></i> CCTV outside property</li>
                            <li><i class="far fa-check-square"></i> CCTV in common areas</li>
                            <li><i class="far fa-check-square"></i> Smoke alarms</li>
                            <li><i class="far fa-check-square"></i> Security alarm</li>
                            <li><i class="far fa-check-square"></i> 24-hour security</li>
                            <li><i class="far fa-check-square"></i> Safety deposit box <span>Additional charge</span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h4 class='list_header'><i class="fas fa-bath"></i> Bathroom</h4>
                        <ul>
                            <li><i class="far fa-check-square"></i> Toilet paper</li>
                            <li><i class="far fa-check-square"></i> Towels</li>
                            <li><i class="far fa-check-square"></i> Toilet</li>
                            <li><i class="far fa-check-square"></i> Free toiletries</li>
                            <li><i class="far fa-check-square"></i> Hairdryer</li>
                            <li><i class="far fa-check-square"></i> Shower</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class='list_header'><i class="fas fa-utensils"></i> Food & Drink</h4>
                        <ul>
                            <li><i class="far fa-check-square"></i> On-site coffee house</li>
                            <li><i class="far fa-check-square"></i> Fruits</li>
                            <li><i class="far fa-check-square"></i> Bottle of water</li>
                            <li>
                                <i class="far fa-check-square"></i> Wine/champagne <span>Additional charge</span>
                            </li>
                            <li><i class="far fa-check-square"></i> Kid-friendly buffet</li>
                            <li><i class="far fa-check-square"></i> Kid meals <span>Additional charge</span></li>
                            <li><i class="far fa-check-square"></i> Special diet menus (on request)</li>
                            <li><i class="far fa-check-square"></i> Breakfast in the room</li>
                            <li><i class="far fa-check-square"></i> Bar</li>
                            <li><i class="far fa-check-square"></i> Restaurant</li>

                        </ul>
                    </div>

                    <div>
                        <h4 class='list_header'><i class="fas fa-lock"></i> Safety & Security</h4>
                        <ul>
                            <li><i class="far fa-check-square"></i> Fire extinguishers</li>
                            <li><i class="far fa-check-square"></i> CCTV outside property</li>
                            <li><i class="far fa-check-square"></i> CCTV in common areas</li>
                            <li><i class="far fa-check-square"></i> Smoke alarms</li>
                            <li><i class="far fa-check-square"></i> Security alarm</li>
                            <li><i class="far fa-check-square"></i> 24-hour security</li>
                            <li><i class="far fa-check-square"></i> Safety deposit box <span>Additional charge</span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h4 class='list_header'><i class="fas fa-bath"></i> Bathroom</h4>
                        <ul>
                            <li><i class="far fa-check-square"></i> Toilet paper</li>
                            <li><i class="far fa-check-square"></i> Towels</li>
                            <li><i class="far fa-check-square"></i> Toilet</li>
                            <li><i class="far fa-check-square"></i> Free toiletries</li>
                            <li><i class="far fa-check-square"></i> Hairdryer</li>
                            <li><i class="far fa-check-square"></i> Shower</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class='list_header'><i class="fas fa-utensils"></i> Food & Drink</h4>
                        <ul>
                            <li><i class="far fa-check-square"></i> On-site coffee house</li>
                            <li><i class="far fa-check-square"></i> Fruits</li>
                            <li><i class="far fa-check-square"></i> Bottle of water</li>
                            <li>
                                <i class="far fa-check-square"></i> Wine/champagne <span>Additional charge</span>
                            </li>
                            <li><i class="far fa-check-square"></i> Kid-friendly buffet</li>
                            <li><i class="far fa-check-square"></i> Kid meals <span>Additional charge</span></li>
                            <li><i class="far fa-check-square"></i> Special diet menus (on request)</li>
                            <li><i class="far fa-check-square"></i> Breakfast in the room</li>
                            <li><i class="far fa-check-square"></i> Bar</li>
                            <li><i class="far fa-check-square"></i> Restaurant</li>

                        </ul>
                    </div>

                    <div>
                        <h4 class='list_header'><i class="fas fa-lock"></i> Safety & Security</h4>
                        <ul>
                            <li><i class="far fa-check-square"></i> Fire extinguishers</li>
                            <li><i class="far fa-check-square"></i> CCTV outside property</li>
                            <li><i class="far fa-check-square"></i> CCTV in common areas</li>
                            <li><i class="far fa-check-square"></i> Smoke alarms</li>
                            <li><i class="far fa-check-square"></i> Security alarm</li>
                            <li><i class="far fa-check-square"></i> 24-hour security</li>
                            <li><i class="far fa-check-square"></i> Safety deposit box <span>Additional charge</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Facilities End -->
            <!-- House rules -->
            <div>
                <h3>House rules</h3>
                <p>{{ $hotel->name }} takes special requests - add in the next step!</p>
                <div class="house_rules">
                    <div class='rule-grid'>
                        <div>
                            <p><i class="fas fa-calendar-alt"></i> Check-in</p>
                        </div>
                        <div>
                            <input type="text" id="check_in" style="border: 0; color: #f6931f; font-weight: bold;"
                                size="100" />
                            <div id="in-range"></div>
                        </div>
                    </div>

                    <div class='rule-grid'>
                        <div>
                            <p><i class="fas fa-calendar-alt"></i> Check-out</p>
                        </div>

                        <div>
                            <input type="text" id="check_out" style="border: 0; color: #f6931f; font-weight: bold;"
                                size="100" />
                            <div id="out-range"></div>
                        </div>
                    </div>

                    <div class='rule-grid'>
                        <div>
                            <p><i class="fas fa-info-circle"></i> Cancellation/ prepayment</p>
                        </div>
                        <div>
                            <p>
                                Cancellation and prepayment policies vary according to accommodation type. Please check
                                what conditions may apply to each option when making your selection.
                            </p>
                        </div>
                    </div>


                    <div class='rule-grid'>
                        <div>
                            <p><i class="fas fa-child"></i> Children and beds</p>
                        </div>
                        <div>
                            <h4>Child policies</h4>
                            <p>
                                Children of any age are welcome.
                            </p>
                            <p>Children aged 18 years and above are considered adults at this property.</p>
                            <p>To see correct prices and occupancy information, please add the number of children in
                                your group and their ages to your search.</p>
                            <h4>Cot and extra bed policies</h4>
                            <table>
                                <tr>
                                    <th colspan="2">0 - 2 years</th>
                                </tr>
                                <ttr>
                                    <td><i class="fas fa-bed"></i> Cot upon request</td>
                                    <td>Free</td>
                                </ttr>

                            </table>

                            <table>
                                <tr>
                                    <th colspan="2">6+ years</th>
                                </tr>
                                <tr>
                                    <td><i class=" fas fa-bed"></i> <i class="fas fa-plus-circle plus"></i> Extra bed
                                        upon
                                        request</td>
                                    <td>US$20 per person, per night</td>
                                </tr>

                            </table>
                            <p>Supplements are not calculated automatically in the total costs and will have to be paid
                                for separately during your stay. </p>
                            <p>The maximum number of extra beds and cots allowed is dependent on the room you choose.
                                Please check your selected room for the maximum capacity. </p>
                            <p>All cots and extra beds are subject to availability. </p>
                        </div>
                    </div>

                    <div class='rule-grid'>
                        <div>
                            <p><i class="fas fa-user"></i> No age restriction</p>
                        </div>
                        <div>
                            <p>
                                There is no age requirement for check-in
                            </p>
                        </div>
                    </div>

                    <div class='rule-grid'>
                        <div>
                            <p><i class="fas fa-paw"></i> Pets</p>
                        </div>
                        <div>
                            <p>
                                Pets are not allowed.
                            </p>
                        </div>
                    </div>

                    <div class='rule-grid'>
                        <div>
                            <p><i class="fas fa-credit-card"></i> Cards accepted at this hotel </p>
                        </div>
                        <div>
                            <div class='pay_cards'>
                                <img src="https://www.marketing91.com/wp-content/uploads/2017/10/Marketing-Strategy-of-Mastercard-3.jpg"
                                    alt="">
                                <img src="https://www.investopedia.com/thmb/1IVupa7WPkyjIVLKezgBowB52DM=/800x450/filters:fill(auto,1)/full-color-800x450-cee226a48bed4177b90351075b332227.jpg"
                                    alt="">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/UnionPay_logo.svg/1200px-UnionPay_logo.svg.png"
                                    alt="">
                                <img src="https://mygoodknife.com/wp-content/uploads/American-Express-copy.png" alt="">
                            </div>
                            <p>{{ $hotel->name }} accepts these cards and reserves the right to temporarily hold an
                                amount
                                prior to arrival. </p>
                        </div>
                    </div>

                </div>
            </div>
            <!-- House rules end -->
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
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script>
$(function() {
    $("#in-range").slider({
        range: true,
        min: new Date(new Date().setHours(00)).getTime(),
        max: new Date(new Date().setHours(23)).getTime(),
        step: 86400,
        values: [new Date().getTime(), new Date(new Date().setHours(new Date().getHours() + 1))
            .getTime()
        ],
        slide: function(event, ui) {
            $("#check_in").val(
                `${(new Date(ui.values[0]).getHours())}:${(new Date(ui.values[0]).getMinutes())}` +
                " - " + `${(new Date(ui
                    .values[1])).getHours()}: ${(new Date(ui
                    .values[1])).getMinutes()}`);
        }
    });
    $("#check_in").val(
        `${(new Date($("#in-range").slider("values", 0)).getHours())}:${(new Date($("#in-range").slider("values", 0)).getMinutes())}` +
        " - " +
        `${new Date((new Date($("#in-range").slider("values", 1)))).getHours()}: ${(new Date($("#in-range").slider("values", 1))).getMinutes()}`
    );
    $("#check_in").prop('disabled', true);
});
$(function() {
    $("#out-range").slider({
        range: true,
        min: new Date(new Date().setHours(00)).getTime(),
        max: new Date(new Date().setHours(23)).getTime(),
        step: 86400,
        values: [new Date().getTime(), new Date(new Date().setHours(new Date().getHours() + 1))
            .getTime()
        ],
        slide: function(event, ui) {
            $("#check_out").val(
                `${(new Date(ui.values[0]).getHours())}:${(new Date(ui.values[0]).getMinutes())}` +
                " - " + `${(new Date(ui
                    .values[1])).getHours()}: ${(new Date(ui
                    .values[1])).getMinutes()}`);
        }
    });
    $("#check_out").val(
        `${(new Date($("#out-range").slider("values", 0)).getHours())}:${(new Date($("#out-range").slider("values", 0)).getMinutes())}` +
        " - " +
        `${new Date((new Date($("#out-range").slider("values", 1)))).getHours()}: ${(new Date($("#out-range").slider("values", 1))).getMinutes()}`
    );
    $("#check_out").prop('disabled', true);
});
</script>
@endsection