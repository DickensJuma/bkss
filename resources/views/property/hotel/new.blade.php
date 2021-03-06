@extends('layouts.front.design')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>How many hotels are you listing?</h5>
            </div>
            <div class="card-body">
                <form action="">
                    <label class="input-container"><img class="icon-rounded" src="{{ asset('front/assets/images/hotel-icon.png') }}"/>
                        One hotel with one or multiple rooms that guests can book
                        <input type="radio" name="hotel_number" class="hotel-radio" value="single">
                        <span class="checkmark"></span>
                    </label>
                    <label class="input-container" id="multiple-container"><img class="icon-rounded" src="{{ asset('front/assets/images/multiple-hotels-icon.png') }}"/>
                        Multiple hotels with one or multiple rooms that guests can book
                        <input type="radio" id="multiple" name="hotel_number" class="hotel-radio" value="multiple">
                        <span class="checkmark"></span>
                    </label>
                    <div class="fom-group" id="number" hidden>
                        <label for="no">Number Of properties</label>
                        <input type="number" class="form-controller" name="no" id="no">
                    </div>
                </form>
            </div>
        </div>
        <a href="{{ route('hotel.add') }}" class="btn btn-lg btn-secondary" id="next">Continue</a>
    </div>
    <script>
        //Wait for document to load
       jQuery(document).ready(function(){
            //Check for the change value
           jQuery(".hotel-radio").on('change',function() {
                //store the selected value in var
                var checkValue =jQuery('input[name=hotel_number]:checked').val();
                //check what the var value is
                if(checkValue=="multiple"){
                    //if it is multiple, show more
                   jQuery("#number").show();
                   jQuery("#number").prop("hidden",false);
                }else{
                    //otherwise hide more
                   jQuery("#number").hide();
                   jQuery("#number").prop("hidden",true);
                }
            }); 
            //check if the button has been clicked
           jQuery("#next").on("click", function(){

            });

        });
        </script>
@endsection