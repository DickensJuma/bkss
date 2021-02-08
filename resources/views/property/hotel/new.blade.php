@extends('layouts.front.design')

@section('content')
    <div class="container">
        <h5>How many hotels are you listing?</h5>
    <label class="input-container"><image class="icon-rounded" src="{{ asset('front/assets/images/hotel-icon.png') }}"></image>
        One hotel with one or multiple rooms that guests can book
        <input type="radio" name="radio">
        <span class="checkmark"></span>
      </label>
      <label class="input-container" id="multiple-container"><image class="icon-rounded" src="{{ asset('front/assets/images/multiple-hotels-icon.png') }}"></image>
          Multiple hotels with one or multiple rooms that guests can book
        <input type="radio" id="multiple" name="radio">
        <span class="checkmark"></span>
      </label>
      <div class="fom-group" id="number" hidden>
        <label for="no">Number Of properties</label>
        <input type="number" class="form-controller" name="no" id="no">
      </div>

      <a href="" class="btn btn-sm btn-border"><</a>
      <a href="" class="btn btn-lg btn-secondary">Continue</a>
    </div>
    <script>
        $(document).ready(function(){
    $("#multiple").on("change",function() {
        if($("#multiple").is(":checked")) {
            console.log("Object checked");
            //show the number text box        
            $("#number").show();
            $("#number").prop("hidden",false);
    
        }
        else {
            console.log("Object unchecked");
            // Hide the number text-box       
            $("#number").hide();
            $("#number").prop("hidden",true);
        }
    });
    });
        </script>
@endsection