
@extends('backend.adminmaster')
@section('title','Add A Merchadise')
@section('content')
<div class="container" style="border:2px solid black; background:rgb(255, 249, 249);">
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="section-title">
                <h3>Merchadise Manager</h3>
            </div>
        </div>
        <!-- end col -->
        <div class="col-lg-12 schedule-tab">
            <ul id="tabsJustified" class="nav nav-tabs justify-content-center text-center">
                <li class="nav-item">
                    <a href="#" data-target="#three" data-toggle="tab" class="nav-link">
                        <p>Merchadise List</p>
                    </a>
                </li>
                <li class="nav-item" >
                    <a href="#" data-target="#one" data-toggle="tab" class="nav-link  active">
                        <p>Add A Merchadise</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" data-target="#two" data-toggle="tab" class="nav-link">
                        <p>Add a Merchadise Category</p>
                    </a>
                </li>
            </ul>
            <div id="tabsJustifiedContent" class="tab-content">
                <div id="three" class="tab-pane fade">
                    All Merchadise
                        @if(Session::has('success'))
                          <div class="alert alert-success">
                              {{Session::get('success')}}
                          </div>
                      @endif
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-12">
                            @if (!empty($merchadise))
                            <table id="admindatatables" class="table table-striped table-bordered dt-responsive nowrap  order-column" style="width:100%;">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Merchadise Name</th>
                                        <th scope="col">Merchadise Category</th>
                                        <th scope="col">Merchadise Image</th>
                                        <th scope="col">Merchadise Code</th>
                                        <th scope="col">Merchadise price</th>
                                        <th scope="col">Merchadise Selling Price</th>
                                        <th scope="col">Merchadise Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($merchadise as $merch)
                                    <tr>
                                        <td>{{$merch->id}}</td>
                                        <td>{{$merch->merch_name}}</td>
                                        <td>{{$merch->merchadisecategor->merchadisecat_title }}</td>
                                        <td><img src="{{ asset ('merchadise/'.$merch->merch_image) }}" style="width:100px; height:100px;"></td>
                                        <td>{{$merch->merch_code}}</td>
                                        <td>{{$merch->merch_price}}</td>
                                        <td>{{$merch->merch_splprice}}</td>
                                        <td>{{$merch->merch_details}}</td>
                                        <td><a title="Edit the Product" href="{{ url('admin/merchadise/addatributes/'.$merch->id)}}"><i class="fa fa-plus"></i></a>
                                            <a title="Edit the Product" href="{{ url('admin/merchadise/'.$merch->id)}}"><i class="fa fa-edit"></i></a>
                                            <a onclick="confirm return('Are you Sure You want to Delete?')" href="{{ url('admin/merchadise/'.$merch->id.'/delete')}}"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                    <strong style="font-size: 20px;">No Merchadise has been added </strong>
                                    @endforelse
                                </tbody>
                            </table>
                        @endif
                          </div>
                      </div>
                  </div>
                </div>
                <div id="one" class="tab-pane active show fade ">
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    {{-- Add A merchadise --}}
                    <div class="container">
                        <div class="row">
                            <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" style="text-decoration: underline; margin-top: 50px;">
                                <h3>Add New Product</h3>
                                <div class="col-md-12">
                                    <div class="panel-body">
                                        <form action="#" method="post" role="form" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="form-group{{$errors->has('pro_name')?' has-error':''}}">
                                                <label for="pro_name">Name</label>
                                                <input type="text" class="form-control" name="pro_name" id="pro_name" placeholder="Product Name">
                                                <span class="text-danger">{{$errors->first('pro_name')}}</span>
                                            </div>
                
                
                                            <div class="form-group{{$errors->has('pro_code')?' has-error':''}}">
                                                <label for="pro_code">Code</label>
                                                <input type="text" class="form-control" name="pro_code" id="pro_code" placeholder="Code">
                                                <span class="text-danger">{{$errors->first('pro_code')}}</span>
                                            </div>
                
                                            <div class="form-group{{$errors->has('pro_price')?' has-error':''}}">
                                                <label for="pro_price">Price</label>
                                                <input type="text" class="form-control" name="pro_price" id="pro_price" placeholder="Price">
                                                <span class="text-danger">{{$errors->first('pro_price')}}</span>
                                            </div>
                
                                            <div class="form-group{{$errors->has('stock')?' has-error':''}}">
                                                <label for="stock">Stock</label>
                                                <input type="text" class="form-control" name="stock" id="stock" placeholder="Stock">
                                                <span class="text-danger">{{$errors->first('stock')}}</span>
                                            </div>
                
                                            <div class="form-group{{$errors->has('pro_info')?' has-error':''}}">
                                                <label for="pro_info">Description</label>
                                                <textarea name="pro_info" id="pro_info" rows="5" class="form-control"></textarea>
                                                <span class="text-danger">{{$errors->first('pro_info')}}</span>
                                            </div>
                
                                            <div class="form-group{{$errors->has('category_id')?' has-error':''}}">
                                                <label for="category_id">Category</label>
                                                <select name="category_id" id="category_id" class="form-control">
                                                    <option value=""> -- Select Category -- </option>
                                                    {{-- @foreach($categories as $id=>$category)
                                                        <option value="{{$id}}">{{$category}}</option>
                                                    @endforeach --}}
                                                </select>
                                                <span class="text-danger">{{$errors->first('category_id')}}</span>
                                            </div>
                
                
                                            <div class="form-group{{$errors->has('image')?' has-error':''}}">
                                                <label for="image">Image</label>
                                                <input type="file" name="image" class="form-control">
                                                <span class="text-danger">{{$errors->first('image')}}</span>
                                            </div>
                
                                            <div class="form-group{{$errors->has('spl_price')?' has-error':''}}">
                                                <label for="spl_price">Sale Price</label>
                                                <input type="text" class="form-control" name="spl_price" id="spl_price" placeholder="Sale Price">
                                                <span class="text-danger">{{$errors->first('spl_price')}}</span>
                                            </div>
                
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </main>
                        </div>
                    </div>
                </div>
                <div id="two" class="tab-pane fade">
                    <div class="container">
                        <form action="{{ url('admin/merchadisecategory') }}" method="POST" id="contactFormSendMail" class="form" >
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="well-box">
                                        <h2>Add a Merchadise Category</h2>
                                        @if(Session::has('success'))
                                            <div class="alert alert-success">
                                                {{Session::get('success')}}
                                            </div>
                                        @endif
                                        
                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="control-label" for="merchadisecat_title">Merchadise Category Title</label>
                                            <input id="merchadisecat_title" name="merchadisecat_title" type="text" value="{{ old('merchadisecat_title') }}" class="form-control input-md {{ $errors->has('merchadisecat_title') ? 'error' : '' }}" required>
                                            <!-- Error -->
                                            @if ($errors->has('merchadisecat_title'))
                                                <div class="error">
                                                    {{ $errors->first('merchadisecat_title') }}
                                                </div>
                                            @endif
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