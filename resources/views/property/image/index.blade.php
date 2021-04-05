@extends('layouts.admin.design')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Photos</h1>
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
                            <div class="col-md-2">
                                <div>
                                    <span class="image-block block2">
                                    <a class="image-zoom" href="{{ asset('uploads/property/large/'.$item->path) }}" rel="prettyPhoto[gallery]">							
                                            <img src="{{ asset('uploads/property/thumbnail/'.$item->path) }}" class="img-responsive" alt="Gallery"></a>
                                </span>
                                </div>
                            </div>                        
                            @endforeach
                        </div>
                        @endforeach
                            </div>
                    </div>    
                </div>
            </div>
        </div>
    </section>
</div>
@endsection