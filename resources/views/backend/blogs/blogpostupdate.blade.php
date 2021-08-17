@extends('backend.adminmaster')
@section('title','Edit Blog Post')
@section('content')
<div class="container" style="border:2px solid black; background:rgb(255, 249, 249);">
    <h2>Edit The Blog Post</h2>
    <div class="container mt-5">
        <!-- Success message -->
        @if(Session::has('success'))
           <p class="text-success">{{session('success')}}</p>
        @endif

        @if($errors)
            @foreach($errors->all() as $error)
            <p class="text-danger">{{$error}}</p>
            @endforeach
        @endif

        <form method="post" action="{{ url('admin/blogpost/'.$data->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Blog Post Title</label>
                <input type="text" class="form-control" value="{{ $data->blo_title }}" name="blo_title" id="blo_title">
            </div>

            <div class="form-group">
                <label for="FormControlSelect">Blog Category</label>
                <select name="blocategory" class="form-control" id="FormControlSelect">
                    <option>Choose a Blog Category</option>
                    @foreach($blogcats as $BlogCategory)
                        @if ($BlogCategory->id==$data->cat_id)
                            <option selected value="{{ $BlogCategory->id }}">{{ $BlogCategory->blogcat_title }}</option>
                        @else
                        <option value="{{ $BlogCategory->id }}">{{ $BlogCategory->blogcat_title }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group shadow-textarea">
                <label>Main story</label>
                <textarea id="blo-details" name="blo_details"  class="form-control">{{ $data->blo_details }}</textarea>
               
            </div>

            <div class="form-group">
                <label for="tags">Post Tags</label>
                <select name="tags[]" class="form-control" id="selected-tags" multiple="multiple">
                    @foreach($tags as $blogtag)
                       <option value="{{ $blogtag->id  }}">{{ $blogtag->blogtag_title }}</option>
                    @endforeach
                </select>
            </div>

            <br>
            <!-- Main Image Button--->
            <label for="file">Blog Post Image</label>
            <input type="file" name="blo_image"/>
            <input type="hidden" name="blo_image" value="{{ $data->blo_image }}"/>
            <img id="blo_image" style="width: 100px; height: 80px;" src="{{ asset ('blogposts'.'/'.$data->blo_image) }}"/>
            <br>

            <button type="submit" class="btn btn-dark btn-block">Submit</button>
        </form>
    </div>
</div>
@php
    $tag_ids=[];
@endphp

@foreach ($data->blogtags as $tag)
    @php
        array_push($tag_ids,$tag->id);
    @endphp
@endforeach
@endsection 