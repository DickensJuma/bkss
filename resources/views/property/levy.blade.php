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
                                            <tr>
                                                <td>Property service Charge</td>
                                                <td><select name="servicecharge" id="servicecharge">
                                                    <option value="">Select</option>
                                                    <option value="1">1%</option>
                                                    <option value="2">2%</option>
                                                    <option value="3">3%</option>
                                                    <option value="4">4%</option>
                                                    <option value="5">5%</option>
                                                    <option value="6">6%</option>
                                                    <option value="7">7%</option>
                                                    <option value="8">8%</option>
                                                    <option value="9">9%</option>
                                                    <option value="1">1%</option>
                                                    <option value="10">10%</option>
                                                    <option value="11">11%</option>
                                                    <option value="12">12%</option>
                                                    <option value="13">13%</option>
                                                    <option value="14">14%</option>
                                                    <option value="15">15%</option>
                                                </select>
                                            </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </div>
    <script>
        $('#servicecharge').on('change',function(){
            var selectedValue = $(this).children('option:selected').val();
            BootstrapDialog.show({
            message: 'Hi Apple!'
        });
        })

    </script>
    
@endsection