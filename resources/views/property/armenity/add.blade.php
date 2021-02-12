@extends('layouts.front.design')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Amenities</h3>
                <p>You're almost done! We just need a few more details about the extra bed options you provide, plus any amenities or specific features and services available.</p>
            </div>
            <div class="card-body">
                <form action="">
                    @csrf
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
                            <input class="form-check-input" type="checkbox" value="Children" id="extra_children" name="extra_child_accomodation[]">
                            <label class="form-check-label" for="children">Children</label>
                        </div>
                        <br>
                        <div class="formgroup" id="children-extra-tab" hidden>
                            <div class="row">
                                <div class="col-md-3">
                                    <select name="maximum_age" id="" class="custom-select mr-sm-2">
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
                                    <input type="curency" class="form-control no-margin" name="new-child-cost" id="child-cost" placeholder="0.00">
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
                                    <input type="curency" class="form-control no-margin" name="adult-cost" id="adult-cost" placeholder="0.00">
                                </div>
                            </div>
                        </div>
                    </div>
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
        });
    </script>
@endsection