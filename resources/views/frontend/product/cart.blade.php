
@extends('frontend.master')
@section('title','My Cart')
@section('content')
<!-- Cart Page Start -->
<div class="page-section section pt-90 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                  {{-- cart table   --}}
                <div id="appendcartitems">
                    @include('frontend.product.cartitems')
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- Cart Page End --> 
@endsection