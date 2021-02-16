@extends('layouts.front.design')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Amenities</h3>
                <p>You're almost done! We just need a few more details about the extra bed options you provide, plus any amenities or specific features and services available.</p>
            </div>
            <div class="card-body">
                <form action="{{ route('amenity.add') }}" method="POST">
                    @csrf
                    <input type="text" value="{{ $property_id }}" name="p_id" hidden>
                    <div class="divider">
                        <h5>Extra Bed Options</h5>
                        <p>These are the options for beds that can be added upon request.</p>
                        <p>Can you provide extra beds?</p>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input extrabeds-radio" type="radio" name="extrabeds" id="yes" value="Yes">
                                    <label class="form-check-label">Yes</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input extrabeds-radio" type="radio" name="extrabeds" id="no" value="No">
                                    <label class="form-check-label">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="extra-details" hidden>
                        <label for="extabeds_no">Select the number of extra beds that can be added.</label>
                        <div class="row">
                            <div class="col-md-3">
                                <select name="extrabeds_no" id="" class="custom-select mr-sm-2">
                                    <option value="1" selected="">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>
                        <h6>Check the box(es) if you can accommodate the following guests in extra beds.</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Children up to 2 years old in cribs" id="children_upto_2_years_in_crib" name="extra_accomodation[]">
                            <label class="form-check-label" for="children_upto_2_years_in_crib">Children up to 2 years old in cribs</label>
                        </div>
                        <br>
                        <div class="form-group" id="cost-per-child-tab" hidden>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="child_cost" class="form-label">Enter the price per night, per child</label>
                                </div>
                                <div class="col-md-2 curency-label">US$</div>
                                <div class="col-md-7">
                                    <input type="curency" class="form-control no-margin" name="child-cost" id="child-cost" placeholder="0.00">
                                </div>
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Children" id="extra_children" name="extra_accomodation[]">
                            <label class="form-check-label" for="children">Children</label>
                        </div>
                        <br>
                        <div class="formgroup" id="children-extra-tab" hidden>
                            <div class="row">
                                <div class="col-md-3">
                                    <select name="extra_accomodation_children_maximum_age" id="" class="custom-select mr-sm-2">
                                        <option value="6">Up to 6 years old</option>
                                        <option value="12">Up to 12 years old</option>
                                        <option value="16">Up to 16 years old</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="child_cost" class="form-label">Enter the price per night, per child</label>
                                </div>
                                <div class="col-md-1 curency-label">US$</div>
                                <div class="col-md-4">
                                    <input type="curency" class="form-control no-margin" name="extra-child-cost" id="child-cost" placeholder="0.00">
                                </div>
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Adults " id="extra_adult" name="extra_accomodation[]">
                            <label class="form-check-label" for="adults">Adults</label>
                        </div>
                        <br>
                        <div class="form-group" id="cost-per-adult-tab" hidden>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="adult_cost" class="form-label">Enter the price per night, per adult</label>
                                </div>
                                <div class="col-md-2 curency-label">US$</div>
                                <div class="col-md-7">
                                    <input type="curency" class="form-control no-margin" name="extra-adult-cost" id="adult-cost" placeholder="0.00">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider">
                        <h5>Amenities</h5>
                        <p>Tell us about your amenities</p>
                    </div>
                    <div class="form-group">
                        <h6>Most Requested by Guests</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Air conditioning" id="flexCheckDefault" name="common_armenity[]">
                            <label class="form-check-label" for="flexCheckDefault">Air conditioning</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Bath Tub" id="flexCheckChecked" name="common_armenity[]">
                            <label class="form-check-label" for="flexCheckChecked">Bath Tub</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="SPA Tub" id="flexCheckDefault" name="common_armenity[]">
                            <label class="form-check-label" for="flexCheckDefault">SPA Tub</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value=" Flat-screen TV" id="flexCheckChecked" name="common_armenity[]">
                            <label class="form-check-label" for="flexCheckChecked"> Flat-screen TV</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Electric kettle" id="flexCheckDefault" name="common_armenity[]">
                            <label class="form-check-label" for="flexCheckDefault">Electric kettle</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Balcony" id="flexCheckChecked" name="common_armenity[]">
                            <label class="form-check-label" for="flexCheckChecked">Balcony</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="View" id="flexCheckDefault" name="common_armenity[]">
                            <label class="form-check-label" for="flexCheckDefault">View</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Terrace" id="flexCheckChecked" name="common_armenity[]">
                            <label class="form-check-label" for="flexCheckChecked">Terrace</label>
                        </div>
                    </div>
                    <div class="divider">
                        <button type="button" class="btn btn-info btn-md" id="show_hide_extra"><i class='fa'></i> Show all amenities</button>
                    </div>
                    <div id="extra-amenities-tab" hidden>
                        <h5>All Amenities by Category</h5>
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                              <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Room amenities</button>
                                </h2>
                              </div>
                              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Children’s cribs" id="flexCheckDefault" name="room_armenity[]">
                                        <label class="form-check-label" for="flexCheckDefault">Children’s cribs</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Clothes rack" id="flexCheckChecked" name="room_armenity[]">
                                        <label class="form-check-label" for="flexCheckChecked">Clothes rack</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Drying rack for clothing" id="flexCheckDefault" name="room_armenity[]">
                                        <label class="form-check-label" for="flexCheckDefault">Drying rack for clothing</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Fold-up bed" id="flexCheckChecked" name="room_armenity[]">
                                        <label class="form-check-label" for="flexCheckChecked">Fold-up bed</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Sofa Bed" id="flexCheckDefault" name="room_armenity[]">
                                        <label class="form-check-label" for="flexCheckDefault">Sofa Bed</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Trash cans" id="flexCheckChecked" name="room_armenity[]">
                                        <label class="form-check-label" for="flexCheckChecked">Trash cans</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Heated pool" id="flexCheckDefault" name="room_armenity[]">
                                        <label class="form-check-label" for="flexCheckDefault">Heated pool</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Infinity Pool" id="flexCheckChecked" name="common_armenity[]">
                                        <label class="form-check-label" for="flexCheckChecked">Infinity Pool</label>
                                    </div>

                                  </div>
                              </div>
                            </div>
                            <div class="card">
                              <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Collapsible Group Item #2
                                  </button>
                                </h2>
                              </div>
                              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                              </div>
                            </div>
                            <div class="card">
                              <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Collapsible Group Item #3
                                  </button>
                                </h2>
                              </div>
                              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                    <input type="submit" class="form-control btn btn-warning" value="continue">
                </form>
            </div>
        </div>
    </div>
    <script>
        //Wait for document to load
        $(document).ready(function(){
            //Check for the change value
            $(".extrabeds-radio").on('change',function() {
                //store the selected value in var
                var checkValue = $('input[name=extrabeds]:checked').val();
                //check what the var value is
                if(checkValue=="Yes"){
                    //if it is yes, show more
                    $("#extra-details").show();
                    $("#extra-details").prop("hidden",false);
                }else{
                    //otherwise hide more
                    $("#extra-details").hide();
                    $("#extra-details").prop("hidden",true);
                }
            }); 
            $("#children_upto_2_years_in_crib").on('change',function(){
                if(this.checked){
                    $("#cost-per-child-tab").show();
                    $("#cost-per-child-tab").prop("hidden",false);
                }else{
                    $("#cost-per-child-tab").hide();
                    $("#cost-per-child-tab").prop("hidden",true);
                }
            });
            $("#extra_children").on('change',function(){
                if(this.checked){
                    $("#children-extra-tab").show();
                    $("#children-extra-tab").prop("hidden",false);
                }else{
                    $("#children-extra-tab").hide();
                    $("#children-extra-tab").prop("hidden",true);
                }
            });
            $("#extra_adult").on('change',function(){
                if(this.checked){
                    $("#cost-per-adult-tab").show();
                    $("#cost-per-adult-tab").prop("hidden",false);
                }else{
                    $("#cost-per-adult-tab").hide();
                    $("#cost-per-adult-tab").prop("hidden",true);
                }
            });
            $("#show_hide_extra").on('click',function(e){
                e.preventDefault();
                if($("#extra-amenities-tab").is(":visible")){
                    $("#extra-amenities-tab").hide();
                    $("#extra-amenities-tab").prop("hidden",true);
                    $("i").removeClass("fa-angle-down");
                    $("i").addClass("fa-angle-right");
                    $("#show_hide_extra").text("Show all amenities");
                }else{
                    $("#extra-amenities-tab").show();
                    $("#extra-amenities-tab").prop("hidden",false);
                    $("i").removeClass("fa-angle-right");
                    $("i").addClass("fa-angle-down");
                    $("#show_hide_extra").text("Hide all amenities");
                }
            });            
        });
    </script>
@endsection