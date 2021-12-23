<?php use App\Models\Merchadise; ?>
@extends('frontend.master')
@section('title','Our Merchandise')
@section('content')
<!-- Section-->
<div class="row">
  <section class="py-5" style="border: 2px solid black;">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @if (count($products)>0)
                @foreach ($products as $product)
                    <div class="col mb-3" style="border: 2px solid black;">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <img class="card-img-top img-fluid h-100" src="{{ asset ('merchadise/'.$product->merch_image) }}" alt="{{$product->merch_name}}" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{$product->merch_name}}</h5>
                                    <!-- Product reviews-->
                                    {{-- <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div> --}}
                                    <?php $discountedprice=Merchadise::getdiscountedprice($product->id);?>
                                    <!-- Product price-->
                                    @if ($discountedprice>0)
                                        <del>
                                            <span class="text-muted text-decoration-line-through">sh {{$product->merch_price }}</span>
                                        </del>
                                        
                                        <span class="text-muted text-decoration-line-through">sh {{ $discountedprice }}</span>
                                    @else
                                    <span class="text-muted text-decoration-line-through">sh {{$product->merch_price }}</span>
                                    @endif
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="tag">
                                    <a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a>
                                    <a class="float-left btn btn-outline-dark mt-auto" href="{{ url('merchadise/'.Str::slug($product->merch_name).'/'.$product->id) }}">View Product</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h3>No Merchadise has been added At the Moment</h3>
            @endif

            <div class="d-flex justify-content-center">
                {!!$products->links() !!}
           </div>
        </div>
    </div>
  </section>
</div>
@endsection