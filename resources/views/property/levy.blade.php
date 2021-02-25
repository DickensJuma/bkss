@extends('layouts.admin.design')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        VAT/Tax/Charges
                    <sup class="text-danger"><small>new</small></sup>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('adminhome') }}">Home</a></li>
                    <li class="breadcrumb-item active">Properties</li>
                    <li class="breadcrumb-item active">Tax Charges</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-haeder">
                                    <div class="alert alert-warning alert-block" id="autoClose" >
                                        <button type="button" class="close" data-dismiss="alert">×</button>	
                                        <em class="text-light">Your VAT and Taxation charges are as follows. Note that you can update only the Service charge rate while the rest are calculated automatically.
                                            <br>Incase the ratea are incorrect, please feel free to contact us.
                                        </em>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Now</th>
                                                <th>Most Popular In{{ $property_city }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($levies as $levy)
                                            <tr>
                                                <td>{{ $levy->name }}</td>
                                                <td>{{ $levy->percentage }}%</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @foreach ($levies as $levy)
                                    
                                        
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </section>
    </div>
    
@endsection