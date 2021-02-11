@extends('layouts.front.design')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
            <button class="btn btn-warning btn-md" id="addRoom"><i class="fa fa-plus"></i>Add another Room</button>
            <button class="btn btn-success" id="addFacility">Continue</button>
            </div>
            <div class="card-body">
                <form action="{{ route('room.add') }}" method="POST" id="roomForm" hidden>
                    @csrf
                    <div class="divider">
                        <h3>Layout & Pricing </h3>
                    </div>
                    <input type="text" value="{{ $property_id }}" name="p_id" hidden>
                    <div class="form-group">
                        <label for="roomtype">Room type</label>
                        <select name="roomtype" class="form-control" required>
                            <option value="">Please Select</option>
                            <option value="1">Single</option>
                            <option value="2">Double</option>
                            <option value="3">Twin</option>
                            <option value="4">Twin / Double</option>
                            <option value="5">Tripple</option>
                            <option value="6">Quad</option>
                            <option value="7">Family</option>
                            <option value="8">Suite</option>
                            <option value="9">Studio</option>
                            <option value="10">Apartment</option>
                            <option value="11">Dorm Room</option>
                            <option value="12">Bed in Dorm Room</option>
                            <option value="13">Presidential</option>
                            <option value="14">Governor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="room_name">Room name</label>
                        <select name="room_name" id="room_name" class="form-control" required>
                            <option value="" class="hidden">Please select</option>
                            <option value="1">Budget Single Room</option>
                            <option value="2">Deluxe Single Room</option>
                            <option value="3">Deluxe Single Room with Balcony</option>
                            <option value="4">Deluxe Single Room with Sea View</option>
                            <option value="5">Economy Single Room</option>
                            <option value="6">Large Single Room</option>
                            <option value="7">New Year's Eve Special - Single Room</option>
                            <option value="8">Single Room</option>
                            <option value="9">Single Room - Disability Access</option>
                            <option value="10">Single Room with Balcony</option>
                            <option value="11">Single Room with Bath</option>
                            <option value="12">Single Room with Bathroom</option>
                            <option value="13">Single Room with Garden View</option>
                            <option value="14">Single Room with Lake View</option>
                            <option value="15">Single Room with Mountain View</option>
                            <option value="16">Single Room with Park View</option>
                            <option value="17">Single Room with Pool View</option>
                            <option value="18">Single Room with Private Bathroom</option>
                            <option value="19">Single Room with Private External Bathroom</option>
                            <option value="20">Single Room with Sea View</option>
                            <option value="21">Single Room with Shared Bathroom</option>
                            <option value="22">Single Room with Shared Shower and Toilet</option>
                            <option value="23">Single Room with Shared Toilet</option>
                            <option value="24">Single Room with Shower</option>
                            <option value="25">Single Room with Terrace</option>
                            <option value="26">Small Single Room</option>
                            <option value="27">Standard Single Room</option>
                            <option value="28">Standard Single Room with Mountain View</option>
                            <option value="29">Standard Single Room with Sauna</option>
                            <option value="30">Standard Single Room with Sea View</option>
                            <option value="31">Standard Single Room with Shared Bathroom</option>
                            <option value="32">Standard Single Room with Shower</option>
                            <option value="33">Superior Single Room</option>
                            <option value="34">Superior Single Room with Lake View</option>
                            <option value="35">Superior Single Room with Sea View</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="spolicy">Smoking policy</label>
                        <select name="spolicy" id="spolicy" class="form-control">
                            <option value="1">Non Smoking</option>
                            <option value="2">Smoking</option>
                            <option value = "3">I have both Smoking and Non Smoking rooms of this type</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="no">Number of rooms (of this type)</label> 
                        <input type="number" class="form-control" required name="no">   
                    </div> 
                    <div class="divider">
                        <h5>Bed Options </h5>
                        <p>Tell us only about the existing beds in a room (don't include extra beds). </p>
                    </div>
                    <div class="form-group">
                        <label for="bed">What kind of beds are available in this room?</label>
                        <select name="bed" id="bed" class="form-control">
                            <option value="1">Twin bed(s)&nbsp;&nbsp;/&nbsp;&nbsp;90-130 cm wide</option>
                            <option value="2">Full bed(s)&nbsp;&nbsp;/&nbsp;&nbsp;131-150 cm wide</option>
                            <option value="6">Queen bed(s)&nbsp;&nbsp;/&nbsp;&nbsp;151-180 cm wide</option>
                            <option value="3">King bed(s)&nbsp;&nbsp;/&nbsp;&nbsp;181-210 cm wide</option>
                            <option value="4">Bunk bed&nbsp;&nbsp;/&nbsp;&nbsp;Variable size</option>
                            <option value="5">Sofa bed&nbsp;&nbsp;/&nbsp;&nbsp;Variable size</option>
                            <option value="7">Futon bed(s)&nbsp;&nbsp;/&nbsp;&nbsp;Variable size</option>
                        </select>
                    </div>  
                    <div class="form-group">
                        <label for="guest_no">How many guests can stay in this room?</label>
                        <input type="number" required class="form-control" name="guest_no" id="guest_no">
                    </div>  
                    <div class="form-group">
                        <label for="size">Room size (optional)</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="divider">
                        <h5>Base price per night</h5>  
                        <p>This is the lowest price that we automatically apply to this room for all dates. Before your property goes live, you can set seasonal pricing on your property dashboard. </p>                  
                    </div>   
                    <div class="form-group">
                        <label for="price">Price for&nbsp;<span id="pax">0</span></label>
                        <div class="row">
                            <div class="col-md-2 currency-label">
                                <H6><i class="fa fa-flag-usa"></i>US$</H6>
                            </div>
                            <div class="col-md-10 no-margin">
                                <input type="curency" required class="form-control" name="price">
                            </div>
                        </div>
                    </div> 
                    <input type="submit" class="form-control btn btn-warning" value="Continue">   
                </form>
                <form action="{{ route('facility.add') }}" method="POST" id="facilityForm" hidden>
                    <div class="divider">
                        <h3>Facilities & Services </h3>
                        <p>Now let us know some general details about your property like facilities available, internet, parking, and the languages you speak.</p>
                    </div>
                    <div class="divider">
                        <h5>Parking</h5>
                        <p>This information is especially important for those traveling to your property by car. </p>
                    </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="parking">Is parking available to guests?</label>
                                    <select name="parking" id="parking" class="form-control" required> 
                                        <option value="no">No</option>
                                        <option value="paid">Yes, paid</option>
                                        <option value="free">Yes, free</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="parking_type" id="parking_type" class="form-control" hidden>
                                        <option value="">Select Parking Type</option>
                                        <option value="private">Private</option>
                                        <option value="public">Public</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="parking_location" id="parking_location" class="form-control" hidden>
                                        <option value="">Select Parking Location</option>
                                        <option value="site">On site</option>
                                        <option value="street">Off site</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group" id="reserve" hidden>                        
                                <label for="reservation">Do guests need to reserve a parking space?</label>
                                <select name="reservation" id="reservation" class="form-control">
                                    <option value="">Select Reservation</option>
                                    <option value="res_needed">Reservation needed</option>
                                    <option value="no_res_needed">No reservation needed</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="cost" hidden>
                                <label for="p_cost">Price for parking (per day)</label>
                                <div class="row">
                                    <div class="col-md-2 curency-label">
                                        <p>us$</p>
                                    </div>
                                    <div class="col-md-10 no-margin-md">
                                        <input type="curency" class="form-control" name="p_cost">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider">
                        <h5>Breakfast</h5>
                    </div>
                    <div class="form-group">
                        <label for="breakfast_availability">Is breakfast available to guests?</label>
                        <select name="breakfast_availability" id="breakfast_availability" class="form-control">
                            <option value="no">No</option>
                            <option value="included">Yes, it's included in the price</option>
                            <option value="optional">Yes, it's optional</option>
                        </select>
                    </div>
                    <div class="form-group" id="breakfast_cost" hidden>
                        <label for="bcost">Price for breakfast (per person, per day, including all fees and taxes)</label>
                        <div class="row">
                            <div class="col-md-2 curency-label">us$</div>
                            <div class="col-md-10 no-margin">
                                <input type="curency" class="form-control" name="bcost">
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="breakfast_tab" hidden>
                        <label for="breakfast_type">What kind of breakfast is available?</label>
                        <div id="breakfast_list">
                            <div class="row">
                                <div class="col-md-11">
                                    <select name="breakfast_type" id="breakfast_type" class="form-control">
                                    <option value="">Please select</option>
                                    <option value="1">Continental</option>
                                    <option value="10">American</option>
                                    <option value="11">Buffet</option>
                                    <option value="12">À la carte</option>
                                    <option value="2">Italian</option>
                                    <option value="3">Full English/Irish</option>
                                    <option value="4">Vegetarian</option>
                                    <option value="5">Vegan</option>
                                    <option value="6">Halal</option>
                                    <option value="7">Gluten-free</option>
                                    <option value="8">Kosher</option>
                                    <option value="9">Asian</option>
                                </select>
                                </div>
                                <div class="col-md-1" id="remove" hidden>
                                    <span class='text-danger'><i class='fa fa-times'></i></span>
                                </div>
                            </div>
                        </div>
                        <a href="" id="add_breakfast_type"><span class="text-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i></span> Add another breakfast type</a>
                    </div>
                    <div class="divider">
                        <h5>Languages Spoken</h5>
                    </div>
                    <div class="form-group">
                        <label for="language">What languages do you or your staff speak? </label>
                       <div id="lang_tab">
                        <div class="row">
                            <div class="col-md-11">
                                <select name="language" id="language" class="form-control" required>
                                    <option value="">Please select</option>
                                    <option value="dv"></option>
                                    <option value="ne"></option>
                                    <option value="af">Afrikaans</option>
                                    <option value="sq">Albanian</option>
                                    <option value="ar">Arabic</option>
                                    <option value="hy">Armenian</option>
                                    <option value="az">Azerbaijani</option>
                                    <option value="eu">Basque</option>
                                    <option value="be">Belarusian</option>
                                    <option value="bn">Bengali</option>
                                    <option value="bs">Bosnian</option>
                                    <option value="bg">Bulgarian</option>
                                    <option value="my">Burmese</option>
                                    <option value="yu">Cantonese</option>
                                    <option value="ca">Catalan</option>
                                    <option value="zh">Chinese</option>
                                    <option value="hr">Croatian</option>
                                    <option value="cs">Czech</option>
                                    <option value="da">Danish</option>
                                    <option value="nl">Dutch</option>
                                    <option value="en" selected="selected">English</option>
                                    <option value="et">Estonian</option>
                                    <option value="fo">Faroese</option>
                                    <option value="fa">Farsi</option>
                                    <option value="tl">Filipino</option>
                                    <option value="fi">Finnish</option>
                                    <option value="fr">French</option>
                                    <option value="gl">Galician</option>
                                    <option value="ka">Georgian</option>
                                    <option value="de">German</option>
                                    <option value="el">Greek</option>
                                    <option value="kl">Greenlandic</option>
                                    <option value="gu">Gujarati</option>
                                    <option value="ha">Hausa</option>
                                    <option value="he">Hebrew</option>
                                    <option value="hi">Hindi</option>
                                    <option value="hu">Hungarian</option>
                                    <option value="is">Icelandic</option>
                                    <option value="id">Indonesian</option>
                                    <option value="ga">Irish</option>
                                    <option value="it">Italian</option>
                                    <option value="ja">Japanese</option>
                                    <option value="kn">Kannada</option>
                                    <option value="km">Khmer</option>
                                    <option value="ko">Korean</option>
                                    <option value="lo">Lao</option>
                                    <option value="lv">Latvian</option>
                                    <option value="lt">Lithuanian</option>
                                    <option value="mk">Macedonian</option>
                                    <option value="ms">Malay</option>
                                    <option value="ml">Malayalam</option>
                                    <option value="mt">Maltese</option>
                                    <option value="mr">Marathi</option>
                                    <option value="mo">Moldovan</option>
                                    <option value="mn">Mongolian</option>
                                    <option value="no">Norwegian</option>
                                    <option value="or">Odia</option>
                                    <option value="pl">Polish</option>
                                    <option value="pt">Portuguese</option>
                                    <option value="pa">Punjabi</option>
                                    <option value="ro">Romanian</option>
                                    <option value="ru">Russian</option>
                                    <option value="sr">Serbian</option>
                                    <option value="sk">Slovak</option>
                                    <option value="sl">Slovenian</option>
                                    <option value="es">Spanish</option>
                                    <option value="sw">Swahili</option>
                                    <option value="sv">Swedish</option>
                                    <option value="ta">Tamil</option>
                                    <option value="te">Telugu</option>
                                    <option value="th">Thai</option>
                                    <option value="tr">Turkish</option>
                                    <option value="uk">Ukrainian</option>
                                    <option value="ur">Urdu</option>
                                    <option value="vi">Vietnamese</option>
                                    <option value="cy">Welsh</option>
                                    <option value="xh">Xhosa</option>
                                    <option value="yo">Yoruba</option>
                                    <option value="zu">Zulu</option>
                                </select>
                            </div>
                            <div class="col-md-1" id="lang_remove" hidden>
                                <span class='text-danger'><i class='fa fa-times'></i></span>
                            </div>
                       </div>
                       </div>
                       <a href="" id="add_lang"><span class="text-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i></span> Add another language</a>
                    </div>
                    <div class="divider">
                        <h5>Facilities That Are Popular With Guests</h5>
                        <p>Guests look for these facilities the most when they’re searching for properties.</p>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Free Wifi" id="free_wifi" name="free_wifi">
                                    <label class="form-check-label" for="free_wifi">Free Wifi</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Restaurant" id="restaurant" name="restaurant">
                                    <label class="form-check-label" for="restaurant">Restaurant</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Room Service" id="room_service" name="room_service">
                                    <label class="form-check-label" for="room_service">Room Service</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Bar" id="bar" name="bar">
                                    <label class="form-check-label" for="bar">Bar</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="24-hour front desk " id="24_hr_front_desc" name="24_hr_front_desc">
                                    <label class="form-check-label" for="24_hr_front_desc">24-hour front desk</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Sauna" id="sauna" name="sauna">
                                    <label class="form-check-label" for="sauna">Sauna</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Fitness Center" id="fitness_center" name="fitness_center">
                                    <label class="form-check-label" for="fitness_center">Fitness Center</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Garden" id="garden" name="garden">
                                    <label class="form-check-label" for="garden">Garden</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Terrace" id="terrace" name="terrace">
                                    <label class="form-check-label" for="terrace">Terrace</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Non Smoking Rooms" id="non_smoking_room" name="non_smoking_room">
                                    <label class="form-check-label" for="non_smoking_room">Non Smoking Rooms</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Airport shuttle" id="airport_shuttle" name="airport_shuttle">
                                    <label class="form-check-label" for="airport_shuttle">Airport shuttle</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Family rooms" id="family_room" name="family_room">
                                    <label class="form-check-label" for="family_room">Family rooms</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="SPA" id="spa" name="spa">
                                    <label class="form-check-label" for="spa">SPA</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Hot tub/Jacuzzi" id="hot_tub" name="hot_tub">
                                    <label class="form-check-label" for="hot_tub">Hot tub/Jacuzzi</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Air conditioning" id="air_conditioning" name="air_conditioning">
                                    <label class="form-check-label" for="air_conditioning">Air conditioning</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Water park" id="water_park" name="water_park">
                                    <label class="form-check-label" for="water_park">Water park</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Swimming pool" id="swimming_pool" name="swimming_pool">
                                    <label class="form-check-label" for="swimming_pool">Swimming pool</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success form-control" value="Continue">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        //Wait for document to load
        $(document).ready(function(){
            //add new room button clicked even listener
            $("#addRoom").on('click',function() {
                //make the form visible
                $("#roomForm").prop("hidden",false);
                $("#addRoom").prop("hidden",true);
                $("#addFacility").prop("hidden",true);
                $("#facilityForm").prop("hidden",true);
            });
            //add facility button clicked event listener
            $("#addFacility").on('click',function() {
                //make the form visible
                $("#roomForm").prop("hidden",true);
                $("#addRoom").prop("hidden",true);
                $("#addFacility").prop("hidden",true);
                $("#facilityForm").prop("hidden",false);
            });
                //guest number change event listener
             $("#guest_no").change(function(){
                 var value = $('#guest_no').val();
                 $("#pax").contents().replaceWith(value);
             });
                //parking value change event listener
            $("#parking").on('change',function() {
                var checkValue = $(this).children('option:selected').val();
                console.log(checkValue);
                if(checkValue=="paid"){
                    $("#parking_type").show();
                    $("#parking_type").prop("hidden",false);
                    $("#parking_location").show();
                    $("#parking_location").prop("hidden",false);
                    $("#reserve").show();
                    $("#reserve").prop("hidden",false);
                    $("#cost").show();
                    $("#cost").prop("hidden",false);
                }else if(checkValue=="free"){
                    $("#parking_type").show();
                    $("#parking_type").prop("hidden",false);
                    $("#parking_location").show();
                    $("#parking_location").prop("hidden",false);
                    $("#reserve").show();
                    $("#reserve").prop("hidden",false);
                    $("#cost").hide();
                    $("#cost").prop("hidden",true);
                }else{
                    $("#parking_type").hide();
                    $("#parking_type").prop("hidden",true);
                    $("#parking_location").hide();
                    $("#parking_location").prop("hidden",true);
                    $("#reserve").hide();
                    $("#reserve").prop("hidden",true);
                    $("#cost").hide();
                    $("#cost").prop("hidden",true);
                }
            }); 
                //breakfast availability change even listener
            $("#breakfast_availability").on('change',function() {
                var checkValue = $(this).children('option:selected').val();
                if(checkValue=="included"){
                    $("#breakfast_tab").show();
                    $("#breakfast_tab").prop("hidden",false);
                    $("#breakfast_cost").hide();
                    $("#breakfast_cost").prop("hidden",true);
                }else if(checkValue=="optional"){
                    $("#breakfast_tab").show();
                    $("#breakfast_tab").prop("hidden",false);
                    $("#breakfast_cost").show();
                    $("#breakfast_cost").prop("hidden",false);
                }else{
                    $("#breakfast_tab").hide();
                    $("#breakfast_tab").prop("hidden",true);
                    $("#breakfast_cost").hide();
                    $("#breakfast_cost").prop("hidden",true);
                }
            }); 
            //add breakfast type button click event listener
            $("#add_breakfast_type").on('click',function(e) {
                e.preventDefault();
                //add another column
                $("#breakfast_list").append("<div class='row'>"+
                                            "<div class='col-md-11'>"+
                                            "<select name='breakfast_type' class='form-control'>"+
                                            "<option value=''>Please select</option>"+
                                            "<option value='1'>Continental</option>"+
                                            "<option value='10'>American</option>"+
                                            "<option value='11'>Buffet</option>"+
                                            "<option value='12'>À la carte</option>"+
                                            "<option value='2'>Italian</option>"+
                                            "<option value='3'>Full English/Irish</option>"+
                                            "<option value='4'>Vegetarian</option>"+
                                            "<option value='5'>Vegan</option>"+
                                            "<option value='6'>Halal</option>"+
                                            "<option value='7'>Gluten-free</option>"+
                                            "<option value='8'>Kosher</option>"+
                                            "<option value='9'>Asian</option>"+
                                            "</select>"+
                                            "</div>"+
                                            "<div class='col-md-1' id='remove'>"+
                                            "<span class='text-danger'><i class='fa fa-times'>"+
                                            "</i></span>"+
                                            "</div>"+
                                            "</div>");
                $("#remove").show();
                $("#remove").prop("hidden",false);                
            });
            $("#add_lang").on('click',function(e){
                e.preventDefault();
                $("#lang_tab").append("<div class='row'>"+
                                      "<div class='col-md-11'>"+
                                    "<select name='language' id='language' class='form-control' required>"+
                                   "<option value=''>Please select</option>"+
                                   "<option value='dv'></option>"+
                                   "<option value='ne'></option>"+
                                   "<option value='af'>Afrikaans</option>"+
                                   "<option value='sq'>Albanian</option>"+
                                   "<option value='ar'>Arabic</option>"+
                                   "<option value='hy'>Armenian</option>"+
                                   "<option value='az'>Azerbaijani</option>"+
                                   "<option value='eu'>Basque</option>"+
                                   "<option value='be'>Belarusian</option>"+
                                   "<option value='bn'>Bengali</option>"+
                                   "<option value='bs'>Bosnian</option>"+
                                   "<option value='bg'>Bulgarian</option>"+
                                   "<option value='my'>Burmese</option>"+
                                   "<option value='yu'>Cantonese</option>"+
                                   "<option value='ca'>Catalan</option>"+
                                   "<option value='zh'>Chinese</option>"+
                                   "<option value='hr'>Croatian</option>"+
                                   "<option value='cs'>Czech</option>"+
                                   "<option value='da'>Danish</option>"+
                                   "<option value='nl'>Dutch</option>"+
                                   "<option value='en' selected='selected'>English</option>"+
                                   "<option value='et'>Estonian</option>"+
                                   "<option value='fo'>Faroese</option>"+
                                   "<option value='fa'>Farsi</option>"+
                                   "<option value='tl'>Filipino</option>"+
                                   "<option value='fi'>Finnish</option>"+
                                   "<option value='fr'>French</option>"+
                                   "<option value='gl'>Galician</option>"+
                                   "<option value='ka'>Georgian</option>"+
                                   "<option value='de'>German</option>"+
                                   "<option value='el'>Greek</option>"+
                                   "<option value='kl'>Greenlandic</option>"+
                                   "<option value='gu'>Gujarati</option>"+
                                   "<option value='ha'>Hausa</option>"+
                                   "<option value='he'>Hebrew</option>"+
                                   "<option value='hi'>Hindi</option>"+
                                   "<option value='hu'>Hungarian</option>"+
                                   "<option value='is'>Icelandic</option>"+
                                   "<option value='id'>Indonesian</option>"+
                                   "<option value='ga'>Irish</option>"+
                                   "<option value='it'>Italian</option>"+
                                   "<option value='ja'>Japanese</option>"+
                                   "<option value='kn'>Kannada</option>"+
                                   "<option value='km'>Khmer</option>"+
                                   "<option value='ko'>Korean</option>"+
                                   "<option value='lo'>Lao</option>"+
                                   "<option value='lv'>Latvian</option>"+
                                   "<option value='lt'>Lithuanian</option>"+
                                   "<option value='mk'>Macedonian</option>"+
                                   "<option value='ms'>Malay</option>"+
                                   "<option value='ml'>Malayalam</option>"+
                                   "<option value='mt'>Maltese</option>"+
                                   "<option value='mr'>Marathi</option>"+
                                   "<option value='mo'>Moldovan</option>"+
                                   "<option value='mn'>Mongolian</option>"+
                                   "<option value='no'>Norwegian</option>"+
                                   "<option value='or'>Odia</option>"+
                                   "<option value='pl'>Polish</option>"+
                                   "<option value='pt'>Portuguese</option>"+
                                   "<option value='pa'>Punjabi</option>"+
                                   "<option value='ro'>Romanian</option>"+
                                   "<option value='ru'>Russian</option>"+
                                   "<option value='sr'>Serbian</option>"+
                                   "<option value='sk'>Slovak</option>"+
                                   "<option value='sl'>Slovenian</option>"+
                                   "<option value='es'>Spanish</option>"+
                                   "<option value='sw'>Swahili</option>"+
                                   "<option value='sv'>Swedish</option>"+
                                   "<option value='ta'>Tamil</option>"+
                                   "<option value='te'>Telugu</option>"+
                                   "<option value='th'>Thai</option>"+
                                   "<option value='tr'>Turkish</option>"+
                                   "<option value='uk'>Ukrainian</option>"+
                                   "<option value='ur'>Urdu</option>"+
                                   "<option value='vi'>Vietnamese</option>"+
                                   "<option value='cy'>Welsh</option>"+
                                   "<option value='xh'>Xhosa</option>"+
                                   "<option value='yo'>Yoruba</option>"+
                                   "<option value='zu'>Zulu</option>"+
                                "</select>"+
                            "</div>"+
                            "<div class='col-md-1' id='lang_remove'>"+
                                "<span class='text-danger'><i class='fa fa-times'></i></span>"+
                            "</div>"+
                       "</div>");
                $("#lang_remove").show();
                $("#lang_remove").prop("hidden",false);
            });
        });
    </script>
@endsection