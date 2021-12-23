@extends('admin.master')
@section('title','Category Page')
@section('content')
<main>
    <h2>product Categories</h2>
    <ul class="nav nav-bar">
        @if(!empty($categories))
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Category Id</th>
                        <th>Category Name</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                    </tr>
                    @empty
                        <li>No Category</li>
                    @endforelse
                </tbody>
            </table>
        </div>
        @endif
    </ul>
    <form action="{{route('product_categoriescontroller.store')}}" method="post" role="form">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Category Name:</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="category">
        </div>
        <button type="submit" class="btn">Save</button>
    <form>
</main>
@endsection