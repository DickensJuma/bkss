@extends('layouts.admin.design')
@section('content')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Photos <span class="btn btn-md btn-success" data-toggle="modal" data-target="#modal-default">Add Image</span> </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Property</a></li>
                    <li class="breadcrumb-item active">Photos</li>
                    </ol>
                </div>
                </div>
            </div><!-- /.container-fluid -->
            </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Main Gallery ( {{$photos->count()}} photos )</h3>
                                <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @foreach ($photos->chunk(6) as $key=>$image)
                                        <div class="row">
                                            @foreach ($image as $item)
                                                <div class="col-md-2 image-block-item">
                                                    <span class="image-block block2">
                                                        <a class="image-zoom" href="{{ asset('uploads/property/large/'.$item->path) }}" rel="prettyPhoto[gallery]">							
                                                            <img src="{{ asset('uploads/property/thumbnail/'.$item->path) }}" class="img-responsive" alt="Gallery">
                                                        </a>
                                                    </span>
                                                    @if ($item->is_main!=1)
                                                    <a href="{{ route('image.main',$item->id) }}" class="btn btn-success btn-sm">Set as main</a>
                                                    @else
                                                    <span class="btn btn-ready"><input type="checkbox" checked>&nbsp;&nbsp;&nbsp;&nbsp; Main</span>
                                                    @endif
                                                    <span data-toggle="modal" data-target="#imageModal{{ $item->id }}" class="btn btn-primary btn-sm">Link to room</span>
                                                </div> 
                                                <div class="modal fade" id="imageModal{{ $item->id }}">
                                                    <div class="modal-dialog">
                                                        <form action="{{ route('image.room.main') }}" method="POST">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Link to room</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @csrf
                                                                <select name="room" id="room" class="form-control">
                                                                    <?php echo $room_dropdown; ?>
                                                                </select>
                                                                <input type="text" value="{{ $item->id }}" name="image" id="image" hidden>
                                                                </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <input type="submit" class="btn btn-primary" value="Save changes"/>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                        </form>
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->                       
                                            @endforeach
                                        </div>
                                    @endforeach
                                    <div class="modal fade" id="modal-default">
                                        <div class="modal-dialog">
                                            <form enctype="multipart/form-data" action="{{ route('image.new') }}" method="POST">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">New Images</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="images" name="property_image[]" multiple>
                                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                            </div>
                                                            <div class="input-group-append">
                                                                <input type="submit" class="input-group-text" id="" value="Upload">
                                                            </div>
                                                            <span class="text-danger" id="image-input-error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-primary" value="Save changes"/>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </form>
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                </div>
                        </div>    
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection