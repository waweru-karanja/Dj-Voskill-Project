<?php use App\Models\Merchadise; ?>
@extends('frontend.master')
@section('title','Merchadise')
@section('content')
<div class="container">
    <ul class="ps-breadcrumb">
        <li class="ps-breadcrumb__item"><a href="index.html">Home</a></li>
        <li class="ps-breadcrumb__item"><a href="shop-list.html">Shop</a></li>
        <li class="ps-breadcrumb__item"><a class="active" aria-current="page" href="#">Women</a></li>
    </ul>
    <div class="ps-product--detail">
        <div class="row">
            <div class="col-12 col-md-7">
                <div class="entry-date-media">
                    <div class="entry-media" style="border: 5px solid black">
                      <img src="{{ asset ('merchadise/'.$products->merch_image) }}" class="img img-responsive img-rounded" style="width:100%; height:500px;">
                    </div>
                  </div>
                {{-- <div class="ps-product--gallery">
                    <div class="entry-media" style="border: 5px solid black">
                        <img src="{{ asset ('productimages/'.$products->merch_name) }}" class="img img-responsive" style="width:100%; height:500px;">
                      </div>
                    {{-- <div class="ps-gallery--image">
                        <div class="slide">
                        <div class="ps-gallery__item">
                            <img src="{{ asset ('productimages/'.$products->merch_name) }}" alt="$products->merch_name" /></div>
                        </div>
                    </div> --}}
                    {{-- <div class="ps-product__thumbnail">
                        <div class="slide"><img src="img/products/3_dt_1.jpg" alt="alt" /></div>
                        <div class="slide"><img src="img/products/3_dt_2.jpg" alt="alt" /></div>
                        <div class="slide"><img src="img/products/3_dt_3.jpg" alt="alt" /></div>
                        <div class="slide"><img src="img/products/3_dt_4.jpg" alt="alt" /></div>
                    </div>
                </div> --}}
            </div>
            <div class="col-12 col-md-5">
                <div class="ps-product__info">
                    <div class="ps-product__branch"><a href="#">Apple</a></div>
                    <h4 class="ps-product__title"><a href="product-1.html">{{ $products->merch_name }}</a></h4>
                    {{-- <div class="ps-product__rating">
                        <select class="ps-rating" data-read-only="true">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4" selected="selected">4</option>
                            <option value="5">5</option>
                        </select><span class="ps-product__review">45 Reviews</span><a class="ps-product__write" href="#">Write a review</a>
                    </div> --}}
                    <div class="ps-product__type">
                        <div class="ps-product__item"><span class="text">Product code</span><span class="text-bold">AA798D</span></div>
                        <div class="ps-product__item"><span class="text">Availability</span><span class="text-bold">3 in stock</span></div>
                    </div> 
                    <div class="ps-product__meta">
                        <?php $discountedprice=Merchadise::getdiscountedprice($products->id);?>
                                    <!-- Product price-->
                                    @if ($discountedprice>0)
                                        <del>
                                            <span class="getattrprice merch_price ps-product__price sale">
                                                Sh.{{ $products->merch_price }}
                                            </span>
                                        </del>
                                        <span class="getattrCalculatedPrice ps-product__price sale">
                                            Sh.{{ $discountedprice }}
                                        </span>
                                    @else
                                    <span class="getattrprice ps-product__price sale">
                                        Sh.{{ $products->merch_price }}
                                    </span>
                                    @endif
                        {{-- <span class="getattrprice ps-product__price sale">
                            Sh.{{ $products->merch_price }}
                        </span> --}}
                    </div>
                    <div class="ps-product__available">
                        <div class="ps-product__text">Hurry! Only 3 left in stock</div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="ps-product__sale"> <img src="img/icon/fire.svg" alt="" />28 sold in last 24 hours</div>
                    </div>

                   

                    <form action="{{ url('addtocart') }}" method="POST">
                        @csrf
                        <div class="ps-product__quantity">
                            <h6>Quantity</h6>
                            <div class="d-flex align-items-center">
                                <div class="def-number-input number-input safari_only">
                                    <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="product_id" value="{{ $products->id }}">

                        <div class="ps-product__feature">
                            {{-- <div class="ps-product__group">
                                <h6>Color</h6>
                                @foreach ( as )
                                <div class="ps-product__color">
                                    <div class="custom-control">
                                        <input class="custom-control-input" type="radio" name="productattr_size" value="Gray" id="color#5b6c8fundefined" />
                                        <label class="custom-control-label" for="color#5b6c8fundefined"> <img src="img/products/3_dt_1.jpg" alt="" /></label>
                                    </div>
                                </div>
                                @endforeach
                            </div> --}}
                            <div class="ps-product__group">
                                <h6>Size</h6>
                                
                                <div class="input-group mb-3">
                                    <select class="custom-select" product-id="{{ $products['id'] }}" id="getprice" name="productsize">
                                        <option value="">Select Size</option>
                                        @foreach ($products->merchadiseattributes as $attribute )
                                            <option value="{{ $attribute->productattr_size }}">{{ $attribute->productattr_size }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button type="submit"><i class="fas fa-shopping-cart"></i>Add to cart</button>
                    </form>

                    
                    
                    
                    
                    
                    
                    <div class="ps-product__social">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

  