@extends('layouts.front.design')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <button class="btn btn-warning" id="addRoom"><i class="fa fa-plus"></i>Add Room</button>
        </div>
        <div class="card-body">
            <form action="{{ route('room.add') }}" method="POST" id="roomForm" hidden>
                @csrf
                <div class="divider">
                    <h3>Layout & Pricing </h3>
                    <p>Tell us about your first room. After entering all the necessary info, you can fill in the details of your other rooms.</p>
                </div>
                <input type="text" value="{{ $property_id }}" name="p_id" hidden>
                <div class="form-group">
                    <label for="room_name">Room name</label>
                    <select name="room_name" id="room_name" class="form-control" required>
                        <?php echo $room_name_dropdown; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="roomtype">Room type</label>
                    <select name="roomtype" class="form-control" required>
                        <?php echo $room_type_dropdown; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="custom_name">Custom Name <span class="text-danger">(Optional)</span></label>
                    <input type="text" class="form-control" name="custom_name" id="custom_name">
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
        </div>
    </div>
</div>
<script>
    //Wait for document to load
   jQuery(document).ready(function(){
        //Check for the change value
       jQuery("#addRoom").on('click',function() {
            //make the form visible
           jQuery("#roomForm").prop("hidden",false);
           jQuery("#addRoom").prop("hidden",true);
        });
        jQuery("#guest_no").change(function(){
             var value =jQuery('#guest_no').val();
            jQuery("#pax").contents().replaceWith(value);

         });
    });
    </script>
@endsection