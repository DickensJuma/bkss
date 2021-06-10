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
                    <input type="text" value="{{ $room_id }}" name="r_id" hidden>
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
                    @csrf
                    <input type="text" value="{{ $property_id }}" name="p_id" hidden>
                    <input type="text" value="{{ $room_id }}" name="r_id" hidden>
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
                                        <?php echo $parking_drop_down; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    <div class="divider">
                        <h5>Breakfast</h5>
                    </div>
                    <div class="form-group" id="breakfast_tab">
                        <label for="breakfast_type">What kind of breakfast Do you offer?</label>
                        <div id="breakfast_list">
                            <div class="row">
                                <div class="col-md-11">
                                    <select name="breakfast_type[]" id="breakfast_type" class="form-control">
                                    <?php echo $breakfast_drop_down; ?>
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
                                <select name="language[]" id="language" class="form-control" required>
                                    <?php echo $language_drop_down; ?>
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
                        <?php echo $top_facility_design; ?>
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
       jQuery(document).ready(function(){
            //add new room button clicked even listener
           jQuery("#addRoom").on('click',function() {
                //make the form visible
               jQuery("#roomForm").prop("hidden",false);
               jQuery("#addRoom").prop("hidden",true);
               jQuery("#addFacility").prop("hidden",true);
               jQuery("#facilityForm").prop("hidden",true);
            });
            //add facility button clicked event listener
           jQuery("#addFacility").on('click',function() {
                //make the form visible
               jQuery("#roomForm").prop("hidden",true);
               jQuery("#addRoom").prop("hidden",true);
               jQuery("#addFacility").prop("hidden",true);
               jQuery("#facilityForm").prop("hidden",false);
            });
                //guest number change event listener
               jQuery("#guest_no").change(function(){
                    var value =jQuery('#guest_no').val();
                   jQuery("#pax").contents().replaceWith(value);
                });
                //parking value change event listener
           jQuery("#parking").on('change',function() {
                var checkValue =jQuery(this).children('option:selected').val();
                if(checkValue=="paid"){
                   jQuery("#parking_type").show();
                   jQuery("#parking_type").prop("hidden",false);
                   jQuery("#parking_location").show();
                   jQuery("#parking_location").prop("hidden",false);
                   jQuery("#reserve").show();
                   jQuery("#reserve").prop("hidden",false);
                   jQuery("#cost").show();
                   jQuery("#cost").prop("hidden",false);
                }else if(checkValue=="free"){
                   jQuery("#parking_type").show();
                   jQuery("#parking_type").prop("hidden",false);
                   jQuery("#parking_location").show();
                   jQuery("#parking_location").prop("hidden",false);
                   jQuery("#reserve").show();
                   jQuery("#reserve").prop("hidden",false);
                   jQuery("#cost").hide();
                   jQuery("#cost").prop("hidden",true);
                }else{
                   jQuery("#parking_type").hide();
                   jQuery("#parking_type").prop("hidden",true);
                   jQuery("#parking_location").hide();
                   jQuery("#parking_location").prop("hidden",true);
                   jQuery("#reserve").hide();
                   jQuery("#reserve").prop("hidden",true);
                   jQuery("#cost").hide();
                   jQuery("#cost").prop("hidden",true);
                }
            }); 
                //breakfast availability change even listener
           jQuery("#breakfast_availability").on('change',function() {
                var checkValue =jQuery(this).children('option:selected').val();
                if(checkValue=="included"){
                   jQuery("#breakfast_tab").show();
                   jQuery("#breakfast_tab").prop("hidden",false);
                   jQuery("#breakfast_cost").hide();
                   jQuery("#breakfast_cost").prop("hidden",true);
                }else if(checkValue=="optional"){
                   jQuery("#breakfast_tab").show();
                   jQuery("#breakfast_tab").prop("hidden",false);
                   jQuery("#breakfast_cost").show();
                   jQuery("#breakfast_cost").prop("hidden",false);
                }else{
                   jQuery("#breakfast_tab").hide();
                   jQuery("#breakfast_tab").prop("hidden",true);
                   jQuery("#breakfast_cost").hide();
                   jQuery("#breakfast_cost").prop("hidden",true);
                }
            }); 
            //add breakfast type button click event listener
           jQuery("#add_breakfast_type").on('click',function(e) {
                e.preventDefault();
                //add another column
               jQuery("#breakfast_list").append("<div class='row'>"+
                                            "<div class='col-md-11'>"+
                                            "<select name='breakfast_type[]' class='form-control'>"+
                                            "<option selected=''>Select breakfast type</option>"+
                                            "<option value='5'>Continental</option>"+
                                            "<option value='6'>American</option>"+
                                            "<option value='7'>Buffet</option>"+
                                            "<option value='8'>À la carte</option>"+
                                            "<option value='9'>Italian</option>"+
                                            "<option value='10'>Full English/Irish</option>"+
                                            "<option value='11'>Vegetarian</option>"+
                                            "<option value='12'>Vegan</option>"+
                                            "<option value='13'>Halal</option>"+
                                            "<option value='14'>Gluten-free</option>"+
                                            "<option value='15'>Kosher</option>"+
                                            "<option value='16'>Asian</option>"+
                                            "</select>"+
                                            "</div>"+
                                            "<div class='col-md-1' id='remove'>"+
                                            "<span class='text-danger'><i class='fa fa-times'>"+
                                            "</i></span>"+
                                            "</div>"+
                                            "</div>");
               jQuery("#remove").show();
               jQuery("#remove").prop("hidden",false);                
            });
           jQuery("#add_lang").on('click',function(e){
                e.preventDefault();
               jQuery("#lang_tab").append("<div class='row'>"+
                                        "<div class='col-md-11'>"+
                                        "<select name='language[]' id='language' class='form-control' required>"+
                                            "<option selected=''>Select Language</option>"+
									"<option value='17'>Afrikaans</option>"+
									"<option value='18'>Albanian</option>"+
									"<option value='19'>Arabic</option>"+
									"<option value='20'>Armanian</option>"+
									"<option value='21'>Azerbaijani</option>"+
									"<option value='22'>Basque</option>"+
									"<option value='23'>Belarusian</option>"+
									"<option value='24'>Bengali</option>"+
									"<option value='25'>Bosnian</option>"+
									"<option value='26'>Bulgarian</option>"+
									"<option value='27'>Burmese</option>"+
									"<option value='28'>Cantonese</option>"+
									"<option value='29'>Catalan</option>"+
									"<option value='30'>Chinese</option>"+
									"<option value='31'>Croatian</option>"+
									"<option value='32'>Czech</option>"+
									"<option value='33'>Danish</option>"+
									"<option value='34'>Dutch</option>"+
									"<option value='35'>English</option>"+
									"<option value='36'>Estonian</option>"+
									"<option value='37'>Faroese</option>"+
									"<option value='38'>Filipino</option>"+
									"<option value='39'>Finnish</option>"+
									"<option value='40'>French</option>"+
									"<option value='41'>Galician</option>"+
									"<option value='42'>Georgian</option>"+
									"<option value='43'>German</option>"+
									"<option value='44'>Greek</option>"+
									"<option value='45'>Greenlandic</option>"+
									"<option value='46'>Gujarati</option>"+
									"<option value='47'>Hausa</option>"+
									"<option value='48'>Hebrew</option>"+
									"<option value='49'>Hindi</option>"+
									"<option value='50'>Hungarian</option>"+
									"<option value='51'>Icelandic</option>"+
									"<option value='52'>Indonesian</option>"+
									"<option value='53'>Irish</option>"+
									"<option value='54'>Italian</option>"+
									"<option value='55'>Japanese</option>"+
									"<option value='56'>Kannada</option>"+
									"<option value='57'>Khmer</option>"+
									"<option value='58'>Korean</option>"+
									"<option value='59'>Lao</option>"+
									"<option value='60'>Latvian</option>"+
									"<option value='61'>Lithuanian</option>"+
									"<option value='62'>Macedonian</option>"+
									"<option value='63'>Malay</option>"+
									"<option value='64'>Malayalam</option>"+
									"<option value='65'>Maltese</option>"+
									"<option value='66'>Marathi</option>"+
									"<option value='67'>Moldovian</option>"+
									"<option value='68'>Mongolian</option>"+
									"<option value='69'>Norwegian</option>"+
									"<option value='70'>Odia</option>"+
									"<option value='71'>Polish</option>"+
									"<option value='72'>Portuguese</option>"+
									"<option value='73'>Punjab</option>"+
									"<option value='74'>Romanian</option>"+
									"<option value='75'>Russian</option>"+
									"<option value='76'>Serbian</option>"+
									"<option value='77'>Slovak</option>"+
									"<option value='78'>Slovenian</option>"+
									"<option value='79'>Spanish</option>"+
									"<option value='80'>Swahili</option>"+
									"<option value='81'>Swedish</option>"+
									"<option value='82'>Tamil</option>"+
									"<option value='83'>Telugu</option>"+
									"<option value='84'>Thai</option>"+
									"<option value='85'>Turkish</option>"+
									"<option value='86'>Ukrainian</option>"+
									"<option value='87'>Urdu</option>"+
									"<option value='88'>Vietnamese</option>"+
									"<option value='89'>Welsh</option>"+
									"<option value='90'>Xhosa</option>"+
									"<option value='91'>Yoruba</option>"+
									"<option value='92'>Zulu</option>"+                                
                                "</select>"+
                            "</div>"+
                            "<div class='col-md-1' id='lang_remove'>"+
                                "<span class='text-danger'><i class='fa fa-times'></i></span>"+
                            "</div>"+
                        "</div>");
               jQuery("#lang_remove").show();
               jQuery("#lang_remove").prop("hidden",false);
            });
        });
    </script>
@endsection