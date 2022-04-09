<?php use App\Models\Merchadise; ?>

<div id="showproducts" class="row view-group">
    @if (count($products)>0)
        @foreach ($products as $product)
            <div class="item col-xs-4 col-lg-4">
                <div class="thumbnail card">
                    <div class="img-event">
                        <img class="group list-group-image img-fluid" src="{{ asset ('merchadise/'.$product->merch_image) }}" alt="" style="width: 200px; height:100px;" />
                    </div>
                    <div class="caption card-body">
                        <h4 class="group card-title inner list-group-item-heading">{{$product->merch_name }}</h4>
                        <p class="group inner list-group-item-text">{{$product->merch_details }}</p>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <?php $discountedprice=Merchadise::getdiscountedprice($product->id);?>
                                <!-- Product price-->
                                @if ($discountedprice>0)
                                    <del>
                                        <p class="lead text-muted text-decoration-line-through">sh {{$product->merch_price }}</p>
                                    </del>
                                    <p class="lead text-muted text-decoration-line-through" style="float-right">sh {{ $discountedprice }}</p>
                                @else
                                    <p class="lead text-muted text-decoration-line-through">sh {{$product->merch_price }}</p>
                                @endif
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a>
                {{-- <a class="float-left btn btn-outline-dark mt-auto" href="">View Product</a></div> --}}
                                <a class="btn btn-success" href="{{ url('merchadise/'.Str::slug($product->merch_name).'/'.$product->id) }}">View Product</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <h3>No Merchadise has been added At the Moment</h3>
    @endif
</div>