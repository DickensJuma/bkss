@extends('layouts.front.design')
@section('content')
<div class="container">
    <div class="card" id ="images_tab">
        <div class="card-header">
            <h3>Property photos </h3>
            <p>Great photos invite guests to get the full experience of your property, so upload some high-resolution photos that represent 
                all your property has to offer. We will display these photos on your property's page on the Booking.com website. </p>
        </div>
        <div class="card-body">
            <form class="form-horizontal" enctype="multipart/form-data" method="POST" id="upload-image-form">
                @csrf
                <input type="text" value="{{ $property_id }}" name="p_id" hidden class="text-control">
                <div class="form-group">
                    <h5>Photo gallery</h5>
                    <label for="" class="form-label">Great, thanks! You can now continue signing up. To increase your chances of getting 
                        more bookings, make sure to add additional photos later on — once you're up and running. </label>
                        <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="images" name="property_image[]" multiple>
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                              <button type="submit" class="input-group-text" id="">Upload</button>
                            </div>
                            <span class="text-danger" id="image-input-error"></span>
                          </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6" id="images">

                        </div>
                    </div>
                </div>
                <div class="divider">
                    <h5>No professional photos? No problem. </h5>
                    <ul>
                        <li class="pointer-right">
                            You can use: <i class="fa fa-mobile" aria-hidden="true"></i> A smartphone
                            <i class="fa fa-camera" aria-hidden="true"></i> A digital camera
                        </li>
                        <li class="pointer-right">Top tip! Guests love photos!<button type="button" class=" btn btn-default " data-toggle="modal" data-target="#modal-default">Here are some tips on taking great photos of your property</button></li>
                        <li class="pointer-right">If you don’t know who took a photo, it's best to avoid using it. Only use photos which 
                            you took or own the copyright to, or if it was taken by someone else, make sure you have the photographer’s 
                            consent to use the photo. </li>
                    </ul>
                </div>
            </form>
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header">
                            <strong class="modal-title">Here are some tips on taking great photos of your property</strong>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <ul>
                                <li class="tick">
                                    <b>
                                        The perfect property photo
                                    </b>
                                    <br>
                                    <small>The best selection of photos should feature the interior and exterior of your property, 
                                        including any living rooms, bedrooms, bathrooms, gardens, the kitchen, and facilities 
                                        such as the swimming pool or spa. And if you’ve got a great view from the window or balcony, 
                                        show it off!
                                    </small>
                                </li>
                                <li class="tick">
                                    <b>Landscape over portrait</b>
                                    <br>
                                    <small>Take your smallhotos in landscape format, this will help you capture as much of your space as 
                                        possible in the photos. 
                                    </small>
                                </li>
                                <li class="tick">
                                    <b>Day shots</b>
                                    <br>
                                    <small>Take your photos during the day. Open your curtains and turn on all the lights to shine the best light
                                        on your property.</small>
                                </li>
                                <li class="cross">
                                    <b>Writing and screens</b>
                                    <br>
                                    <small>For privacy protection, make sure that your photos don’t feature vehicle licence plates, tv, computer, or laptop screens.</small>
                                </li>
                                <li class="cross">
                                    <b>Screenshots and maps</b>
                                    <br>
                                    <small>We’ll provide your guests with maps and directions, so there’s no need to add screenshots of websites or maps yourself.</small>
                                </li>
                                <li class="cross">
                                    <b>Watermarks and logos</b>
                                    <br>
                                    <small>Avoid putting watermarks, hotel rates or logos that aren’t from your property on your photos.</small>
                                </li>
                                <li class="cross">
                                    <b>Getting your first booking</b>
                                    <br>
                                    <small>For your property to appear and to start getting bookings on our website, your photos should show how your property looks now.
                                    </small>
                                </li>
                            </ul>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </div>
        <div class="card-footer">
            <button class="btn btn-warning" id="addPolicy">Continue <i class="fa fa-arrow-right"></i></button>
        </div>
    </div>
    <div class="card" id="policies_tab" hidden>
        <div class="card-header">
            <h3>Policies</h3>
            <p>Specify some basic policies. Do you allow children or pets? How flexible are you with cancellations? </p>
        </div>
        <div class="card-body">
            <form action="{{ route('policy.add') }}" method="POST" class="form-horizontal" id="policy">
                @csrf
                <input type="text" value="{{ $property_id }}" name="p_id" hidden class="text-control">
                <div class="form-group">
                    <div class="divider">
                        <h5>Cancellations</h5>
                    </div>
                    <label for="advance_cancellation" class="form-label">How many days in advance can guests cancel free of charge?</label>
                    <select name="advance_cancellation" id="advance_cancellation" class="form-control">
                        <option value="0">Day of arrival (18:00)</option>
                        <option value="1">1 day</option>
                        <option value="2" selected="">2 days</option>
                        <option value="3">3 days</option>
                        <option value="7">7 days</option>
                        <option value="14">14 days</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="full_pay" class="form-label">or guests will pay 100%</label>
                        <select name="full_pay" id="full_pay" class="form-control">
                            <option value="first_night" selected="">of the first night</option>
                            <option value="full_stay">of the full stay</option>
                        </select>
                    </div>
                    <div class="divider">
                        <p><i class="fas fa-bell"></i><span class="cancellation_info">The guest must cancel 2 days in advance or pay 100% of the price for the first night.</span></p>
                        <small>Please note: You'll be able to make changes to your policies later on. This is just to get you started.</small>
                    </div>
                    <div class="divider">
                        <br>
                        <br>
                        <br>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-7 col-sm-6">
                            <h5>Protect against accidental bookings </h5>
                        </div>
                        <div class="col-md-5 col-sm-6">
                            <label class="switch">
                                <input type="checkbox" id="protection_switch" name="protection" checked>
                                <span class="slider round"></span>
                            </label>
                            <span id="protection_switch_label" class="form-label">Yes</span>
                        </div>
                        <small>To save you time handling accidental bookings, we automatically waive cancellation fees for guests that cancel within the first 24 hours of a booking being
                             made. You can change this period of time later in your property management platform.</small>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h5>Check-in</h5>
                            <label for="checkin_from" class="form-label">From:</label>
                            <div class="input-group bootstrap-timepicker timepicker">
                                <input id="timepicker" name="checkin_from" class="timepick" data-provide="timepicker" data-template="dropdown" data-minute-step="1" data-modal-backdrop="true" type="text"/>
                                <span ><i class="fa fa-clock-o"></i></span>
                            </div>
                            <label for="checkin_to" class="form">To:</label>
                            <div class="input-group bootstrap-timepicker timepicker">
                                <input id="timepicker" name="checkin_to" class="timepick" data-provide="timepicker" data-template="dropdown" data-minute-step="1" data-modal-backdrop="true" type="text"/>
                                <span ><i class="fa fa-clock-o"></i></span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <h5>Check-out</h5>
                            <label for="checkout_from" class="form-label">From:</label>
                            <div class="input-group bootstrap-timepicker timepicker">
                                <input id="timepicker" name="checkout_from" class="timepick" data-provide="timepicker" data-template="dropdown" data-minute-step="1" data-modal-backdrop="true" type="text"/>
                                <span ><i class="fa fa-clock-o"></i></span>
                            </div>
                            <label for="checkout_to" class="form">To:</label>
                            <div class="input-group bootstrap-timepicker timepicker">
                                <input id="timepicker" name="checkout_to" class="timepick" data-provide="timepicker" data-template="dropdown" data-minute-step="1" data-modal-backdrop="true" type="text"/>
                                <span ><i class="fa fa-clock-o"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="divider">
                        <br>
                        <br>
                        <br>
                    </div>
                    <div class="form-group">
                        <h5>Children</h5>
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                                <p>Can you accommodate children? (You can specify the ages and prices later) </p>
                            </div>
                        <div class="col-md-5 col-sm-5">
                            <label class="switch">
                                <input type="checkbox" id="children_switch" name="children" checked>
                                <span class="slider round"></span>
                            </label>
                            <span id="children_switch_label" class="form-label">Yes</span>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h5>Pets</h5>
                        <p>Some guests like to travel with their furry friends. Indicate if you allow pets and if any charges apply.</p>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <label for="pets_allowed">Do you allow pets?</label>
                                <select name="pets_allowed" id="pets_allowed" class="form-control">
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                    <option value="request" selected="">Upon request</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-6" id="pets_fee_tab">
                                <label for="pets_fee">Are there additional charges for pets?</label>
                                <select name="pets_fee" id="pets_fee" class="form-control">
                                    <option value="free">Pets can stay for free</option>
                                    <option value="paid" selected="">Charges may apply</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-warning" value="Continue">
                </form>    
        </div>
    </div>
</div>
    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()}
            });

            $('#images').change(function () {
                event.preventDefault();
                let image_upload = new FormData();
                let TotalImages = $('#images')[0].files.length;  //Total Images
                let images = $('#images')[0];  
                let p_id = $('input[name=p_id]').val();

                for (let i = 0; i < TotalImages; i++) {
                    image_upload.append('images[]', images.files[i]);
                }
                image_upload.append('TotalImages', TotalImages);
                image_upload.append('p_id', p_id);

                $.ajax({
                    method: 'POST',
                    url: '{{ route('image.add') }}',
                    data: image_upload,
                    contentType: false,
                    processData: false,
                    success: function (images) {
                        Swal.fire(
                        'Success!',
                        'Images uploaded successfully',
                        'success'
                        );
                        $('#images').reset();

                    },
                    error: function (data) {
                        Swal.fire(
                        'Failed!',
                        'An error occured please try again',
                        'error'
                        );
                        $('#images').reset();
                    }
                });

            });
            $('#addPolicy').on('click',function(){
                $('#images_tab').prop('hidden',true);
                $('#policies_tab').prop('hidden',false);
            });
            $('#advance_cancellation').on('change',function(){
                var advanceCancellationValue = $(this).children('option:selected').val();
                if(advanceCancellationValue=="0"){
                    var fullPayValue = $('#full_pay').children('option:selected').val();
                    if(fullPayValue =="first_night"){
                        $('.cancellation_info').text('The guest must cancel by 18:00 on the day of arrival or pay 100% of the price for the first night.');                        
                    }else{
                        $('.cancellation_info').text('The guest must cancel by 18:00 on the day of arrival or pay 100% of the price of the full stay.');
                    }
                }else if(advanceCancellationValue=="1"){
                    var fullPayValue = $('#full_pay').children('option:selected').val();
                    if(fullPayValue =="first_night"){
                        $('.cancellation_info').text('The guest must cancel 1 day in advance or pay 100% of the price for the first night.');
                    }else{
                        $('.cancellation_info').text('The guest must cancel 1 day in advance or pay 100% of the price of the full stay.');
                    }
                }else if(advanceCancellationValue=="2"){
                    var fullPayValue = $('#full_pay').children('option:selected').val();
                    if(fullPayValue =="first_night"){
                        $('.cancellation_info').text('The guest must cancel 2 days in advance or pay 100% of the price for the first night.');
                    }else{
                        $('.cancellation_info').text('The guest must cancel 2 days in advance or pay 100% of the price of the full stay.');
                    }
                }else if(advanceCancellationValue=="3"){
                    var fullPayValue = $('#full_pay').children('option:selected').val();
                    if(fullPayValue =="first_night"){
                        $('.cancellation_info').text('The guest must cancel 3 days in advance or pay 100% of the price for the first night.');
                    }else{
                        $('.cancellation_info').text('The guest must cancel 3 days in advance or pay 100% of the price of the full stay.');
                    }
                }else if(advanceCancellationValue=="7"){
                    var fullPayValue = $('#full_pay').children('option:selected').val();
                    if(fullPayValue =="first_night"){
                        $('.cancellation_info').text('The guest must cancel 7 days in advance or pay 100% of the price for the first night.');
                    }else{
                        $('.cancellation_info').text('The guest must cancel 7 days in advance or pay 100% of the price of the full stay.');
                    }
                }else{
                    var fullPayValue = $('#full_pay').children('option:selected').val();
                    if(fullPayValue =="first_night"){
                        $('.cancellation_info').text('The guest must cancel 14 days in advance or pay 100% of the price for the first night.');
                    }else{
                        $('.cancellation_info').text('The guest must cancel 14 days in advance or pay 100% of the price of the full stay.');
                    }
                }
            });
            $('#full_pay').on('change',function(){
                var fullPayValue = $(this).children('option:selected').val();
                if(fullPayValue=="first_night"){
                    var advanceCancellationValue = $('#advance_cancellation').children('option:selected').val();
                    if(advanceCancellationValue =="0"){
                        $('.cancellation_info').text('The guest must cancel by 18:00 on the day of arrival or pay 100% of the price for the first night.');
                    }else if(advanceCancellationValue=="1"){
                        $('.cancellation_info').text('The guest must cancel 1 day in advance or pay 100% of the price for the first night.');
                    }else if(advanceCancellationValue=="2"){
                        $('.cancellation_info').text('The guest must cancel 2 days in advance or pay 100% of the price for the first night.');
                    }else if(advanceCancellationValue=="3"){
                        $('.cancellation_info').text('The guest must cancel 3 days in advance or pay 100% of the price for the first night.');
                    }else if(advanceCancellationValue=="7"){
                        $('.cancellation_info').text('The guest must cancel 7 days in advance or pay 100% of the price for the first night.');
                    }else{
                        $('.cancellation_info').text('The guest must cancel 14 days in advance or pay 100% of the price for the first night.');
                    }
                }else{
                    var advanceCancellationValue = $('#advance_cancellation').children('option:selected').val();
                    if(advanceCancellationValue =="0"){
                        $('.cancellation_info').text('The guest must cancel by 18:00 on the day of arrival or pay 100% of the price of the full stay.');
                    }else if(advanceCancellationValue=="1"){
                        $('.cancellation_info').text('The guest must cancel 1 day in advance or pay 100% of the price of the full stay.');
                    }else if(advanceCancellationValue=="2"){
                        $('.cancellation_info').text('The guest must cancel 2 days in advance or pay 100% of the price of the full stay.');
                    }else if(advanceCancellationValue=="3"){
                        $('.cancellation_info').text('The guest must cancel 3 days in advance or pay 100% of the price of the full stay.');
                    }else if(advanceCancellationValue=="7"){
                        $('.cancellation_info').text('The guest must cancel 7 days in advance or pay 100% of the price of the full stay.');
                    }else{
                        $('.cancellation_info').text('The guest must cancel 14 days in advance or pay 100% of the price of the full stay.');
                    }
                }
            });
            //toggler switch code
            $('#protection_switch').on('change', function(){
                if(this.checked){
                    $('#protection_switch_label').text('Yes');
                }else{
                    $('#protection_switch_label').text('No');
                }
            });
            //toggler switch code
            $('#children_switch').on('change', function(){
                if(this.checked){
                    $('#children_switch_label').text('Yes');
                }else{
                    $('#children_switch_label').text('No');
                }
            });
            $('#pets_allowed').on('change', function(){
                var petsAllowedValue = $(this).children('option:selected').val();
                if(petsAllowedValue=="no"){
                    $('#pets_fee_tab').prop('hidden',true);
                }else{
                    $('#pets_fee_tab').prop('hidden',false);
                }
            })
        });
    </script>
@endsection