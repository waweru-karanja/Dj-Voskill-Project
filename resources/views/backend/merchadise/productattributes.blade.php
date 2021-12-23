
@extends('backend.adminmaster')
@section('title','Edit Merchadise Details')
@section('content')
<div class="container" style="border:2px solid black; background:rgb(255, 249, 249);">
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="section-title">
                <h3>Merchadise Attributes Manager</h3>
            </div>
        </div>
        <!-- end col -->
        <div class="col-lg-12 schedule-tab">
            <ul id="tabsJustified" class="nav nav-tabs justify-content-center text-center">
                <li class="nav-item">
                    <a href="#" data-target="#three" data-toggle="tab" class="nav-link active">
                        <p>Merchadise Attributes List</p>
                    </a>
                </li>
                <li class="nav-item" >
                    <a href="#" data-target="#one" data-toggle="tab" class="nav-link">
                        <p>Add A Merchadise Attribute</p>
                    </a>
                </li>
            </ul>
            <div id="tabsJustifiedContent" class="tab-content">
                <div id="three" class="tab-pane fade">
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    <div class="container" style="border: 2px solid rgb(226, 20, 20);">
                        <h2 class="text-center">{{ $merchadisedata->merch_name }}</h2>
                        <div class="row gutters-sm">
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            <img src="{{ asset ('merchadise/'.$merchadisedata->merch_image)}}" alt="{{$merchadisedata->merch_name }}" width="150" height="150">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Merchadise Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{$merchadisedata->merch_name }}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Merchadise Code</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <h4>{{$merchadisedata->merch_code }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <table id="admindatatables" class="table table-bordered  display nowrap" width="100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Product Name </th>
                                        <th>Attribute Size</th>
                                        <th>Attribute Stock</th>
                                        <th>Attribute Price</th>
                                        <th>Attribute Sku</th>
                                        <th>Attribute Status</th>
                                </thead>
                                <tbody>
                                    @foreach ( $merchadisedata->merchadiseattributes as $attribute)
                                        <tr>
                                            <td>{{ $attribute->merchads->merch_name }}</td>
                                            <td>{{ $attribute->productattr_size}}</td>
                                            <td>{{ $attribute->productattr_stock }}</td>
                                            <td>{{ $attribute->productattr_price}}</td>
                                            <td>{{ $attribute->productattr_sku }}</td>
                                            <td>{{ $attribute->productattr_status}}</td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                    <br>
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    <div class="container" style="border: 2px solid rgb(226, 20, 20);">
                        <h2 class="text-center">Update {{ $merchadisedata->merch_name }} Details</h2>
                        <div class="col-lg-12 col-md-12">
                            <form method="POST" action="{{ url('admin/edit-attributes/'.$merchadisedata->id) }}">
                                {{csrf_field()}}
                                <table id="admindatatables" class="table table-bordered  display nowrap" width="100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Product Name </th>
                                            <th>Attribute Size</th>
                                            <th>Attribute Stock</th>
                                            <th>Attribute Price</th>
                                            <th>Attribute Sku</th>
                                            <th>Attribute Status</th>
                                    </thead>
                                    <tbody>
                                        @foreach ( $merchadisedata->merchadiseattributes as $attribute)
                                            <input type="text" name="attrid[]" value="{{ $attribute->id }}" style="display: none"/>
                                            <tr>
                                                <td>{{ $attribute->merchads->merch_name }}</td>
                                                <td>{{ $attribute->productattr_size}}</td>
                                                <td>
                                                    <input type="number" name="productattr_stock[]" value="{{ $attribute->productattr_stock }}" required=""/>
                                                </td>
                                                <td>
                                                    <input type="number" name="productattr_price[]" value="{{ $attribute->productattr_price }}" required=""/>
                                                </td>
                                                <td>{{ $attribute->productattr_sku }}</td>
                                                <td>
                                                    @if ($attribute->productattr_status==0)
                                                        <a href="updateattributestatus" id="attribute-{{$attribute->id}}" attribute_id="{{$attribute->id}}" href="javascript:void(0)">Active</a>
                                                    @else
                                                    <a href="updateattributestatus" id="attribute-{{$attribute->id}}" attribute_id="{{$attribute->id}}" href="javascript:void(0)">InActive</a>
                                                    @endif{{ $attribute->productattr_status}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm btn-block">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="one" class="tab-pane active show fade ">
                    @if(Session::has('success_message'))
                        <div class="alert alert-success">
                            {{Session::get('success_message')}}
                        </div>
                    @endif
                    {{-- Add A merchadise --}}
                    <div class="container">
                        <form action="{{ url('admin/attributes/'.$merchadisedata['id']) }}" method="POST" id="contactFormSendMail" class="form" >
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="well-box">
                                        <h2>Add a Merchadise Attribute</h2>
                                        
                                        <!-- Text input-->
                                        <div class="form_group">
                                            <div class="field_wrapper">
                                                <div>
                                                    <input id="productattr_size" type="text" name="productattr_size[]" value="" placeholder="productattr_size" style="width: 120px"/>
                                                    <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form_group">
                                            <div class="field_wrapper">
                                                <div>
                                                    <input id="productattr_stock" type="number" name="productattr_stock[]" value="" placeholder="productattr_stock" style="width: 120px"/>
                                                    <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form_group">
                                            <div class="field_wrapper">
                                                <div>
                                                    <input id="productattr_price" type="number" name="productattr_price[]" value="" placeholder="productattr_price" style="width: 120px"/>
                                                    <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Text input-->
                                        <div class="form_group">
                                            <div class="field_wrapper">
                                                <div>
                                                    <input id="product_id" type="hidden" name="product_id[]" value="" placeholder="product_id" style="width: 120px"/>
                                                    <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form_group">
                                            <div class="field_wrapper">
                                                <div>
                                                    <input id="productattr_sku" type="text" name="productattr_sku[]" value="" placeholder="productattr_sku" style="width: 120px"/>
                                                    <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-sm btn-block">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- end col -->
    </div>
</div>
@endsection