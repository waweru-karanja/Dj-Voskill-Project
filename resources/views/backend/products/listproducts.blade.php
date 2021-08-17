@extends('admin.master')
@section('title','List Products')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            @if ($message=Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>
    </div>
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('products.create') }}">Add A Product</a>
        </div>
    </div>
</div>
@if (!empty($products))
<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Available Stock</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->pro_name}}</td>
            <td>{{$product->stock}}</td>
            <td>sh{{$product->pro_price}}</td>
            <td><img src="{{ asset ('productimages/'.$product->pro_image) }}" style="width:120px; border:2px solid black;height:80px;"></td>
            <td>
                <form action="{{route('products.destroy',$product->id)}}" method="post">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <a class="btn" href="{{ route('products.show',$product->id)}}"> Show </a>
                    <a class="btn" href="{{ route('products.edit',$product->id)}}"> Edit </a>
                    <input type="submit" class="btn" value="DELETE">
                </form>
            </td>
        </tr>
        @empty
        <strong style="font-size: 20px;">No Available Products</strong>
        @endforelse
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {!! $products->links() !!}
</div>
    
@endif
@endsection
