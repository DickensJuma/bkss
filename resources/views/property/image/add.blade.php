@extends('layouts.front.design')
@section('content')
<div class="container">
    <div class="card">
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
            <a href="{{ route('policy.add') }}" class="btn btn-warning">Continue</a>
        </div>
    </div>
</div>
    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });

            $('#images').change(function () {
                event.preventDefault();
                let image_upload = new FormData();
                let TotalImages = $('#images')[0].files.length;  //Total Images
                let images = $('#images')[0];  
                let p_id = 

                for (let i = 0; i < TotalImages; i++) {
                    image_upload.append('images', images.files[i]);
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
                        console.log(`ok ${images}`);
                    },
                    error: function () {
                    console.log(`Failed`);
                    }
                });

            });
        });
    </script>
@endsection