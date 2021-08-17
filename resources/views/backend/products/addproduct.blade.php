
@extends('admin.master')
@section('title','Add A Product')
@section('content')
<div class="container" style="border:2px solid black; background:rgb(255, 249, 249);">
    <h2>Add A New Product</h2>
    <div class="container mt-5">
        <!-- Success message -->
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger">
            <strong>Please Check The Details Again</strong>
            <ul>
                @foreach ($errors ->all() as $error)
                    <li>{{ $error }}</li> 
                @endforeach
            </ul>
        @endif
        <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data" id="uploadform">
            @csrf
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" class="form-control {{ $errors->has('pro_name') ? 'error' : '' }}" name="pro_name" id="pro_name">
                <!-- Error -->
                @if ($errors->has('pro_name'))
                <div class="error">
                    {{ $errors->first('pro_name') }}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Available Stock</label>
                <input type="text" class="form-control {{ $errors->has('stock') ? 'error' : '' }}" name="stock"
                    id="stock">

                @if ($errors->has('stock'))
                <div class="error">
                    {{ $errors->first('stock') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>Product Price</label>
                <input type="text" class="form-control {{ $errors->has('pro_price') ? 'error' : '' }}" name="pro_price"
                    id="pro_price">

                @if ($errors->has('pro_price'))
                <div class="error">
                    {{ $errors->first('pro_price') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>Spl Price</label>
                <input type="text" name="spl_price" class="form-control {{ $errors->has('spl_price') ? 'error' : '' }}" name="pro_price"
                    id="spl_price">
            </div>

            <div class="form-group">
                <label>Product Code</label>
                <input type="text" class="form-control {{ $errors->has('pro_code') ? 'error' : '' }}" name="pro_code"
                    id="pro_code">

                @if ($errors->has('pro_code'))
                <div class="error">
                    {{ $errors->first('pro_code') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label for="FormControlSelect">Product Category</label>
                <select name="category_id" class="form-control" id="FormControlSelect">
                    <option>Choose a Product Category</option>
                    @foreach($ProductCategories as $productCategory)
                       <option value="{{ $productCategory->id }}">{{ $productCategory->name }}</option>
                    @endforeach
                </select>

                
                @if ($errors->has('category_id'))
                <div class="error">
                    {{ $errors->first('category_id') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>Product Details</label>
                <textarea class="form-control {{ $errors->has('pro_info') ? 'error' : '' }}" name="pro_info" id="pro_info"
                    rows="4">
                </textarea>

                @if ($errors->has('pro_info'))
                <div class="error">
                    {{ $errors->first('pro_info') }}
                </div>
                @endif
            </div>
            <br>
            <!-- Main Image Button--->
            <label for="file">Product-Image</label>
            <input type="file" id="pro_image" name="pro_image" onchange="readURL(this);"/>
            <img id="pro_image" style="width: 100px;"  src="{{asset('dist/admin/productimages')}}"/>
            <div class="progress-bar" id="ProgressBar">
                <div class="progress-bar-fill">
                    <span class="progress-bar-text">0%</span>
                </div>
            </div>
            <br>

            <button  type="submit" value="submit" class="btn btn-dark btn-block">Submit</button>
        </form>
    </div>
</div>


@endsection