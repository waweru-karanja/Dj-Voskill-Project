<!-- Cart Table -->
<?php use App\Models\Merchadise; ?>
<?php use App\Models\Cart; ?>
<div class="cart-table table-responsive mb-40">
    <table class="table">
        <thead>
            <tr>
                <th class="pro-thumbnail">Image</th>
                <th class="pro-title">Product</th>
                <th class="pro-price">Price</th>
                <th class="pro-quantity">Quantity</th>
                <th class="pro-price">Discount</th>
                <th class="pro-subtotal">Total</th>
                <th class="pro-remove">Remove</th>
            </tr>
        </thead>
        <tbody>
            <?php $total_price=0; ?>
                @forelse ($cartitems as $item)
                    <?php $attrpric=Merchadise::getdiscountedattrprice($item['product_id'],$item['size']);?>
                        <tr>
                            <td class="pro-thumbnail">
                                <a href="#">
                                    <img src="{{ asset ('merchadise/'.$item->product->merch_image) }}" alt="Product">
                                </a>
                            </td>
                            <td class="pro-title"><a href="#">{{ $item['product'] ['merch_name'] }}</a></td>
                            <td class="pro-price"><span>{{ $attrpric['merch_price'] }}</span></td>
                            <td class="pro-quantity">
                                <div class="def-number-input number-input safari_only mb-0 w-100">
                                    <button  onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="itemupdate qtyminus" type="button" data-cartid="{{ $item['id'] }}"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                        <input data-id={{ $item->id }} class="quantity" min="1" name="quantity[]" value="{{ $item['quantity'] }}" type="number">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="itemupdate qtyplus" type="button" data-cartid="{{ $item['id'] }}"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                </div> 
                            </td>
                            <td class="pro-price"><span>sh.{{ $attrpric['discount']*$item['quantity']  }}</span></td>
                            <td class="pro-subtotal"><span>sh.{{ $attrpric['final_price']*$item['quantity'] }}</span></td>
                            <td class="pro-remove">
                                <form method="POST" action="{{ route('deletecartitem', $item->id) }}">
                                    @csrf
                                    <input name="method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                                </form>
                            </td>
                        </tr>  
                    <?php $total_price=$total_price+($attrpric['final_price']*$item['quantity']);?>
                @empty
                    <P style="font-size: 15px; text-align:center;margin:40px;">Your Cart is Empty.Click <a href="{{url('products')}}">here</a> to shop for products</p>
                @endforelse
        </tbody>
    </table>
</div>

<div class="row">
            <div class="col-12">
                <div class="coupon-all">
                    <div class="coupon">
                        <input id="coupon_code" class="input-text" name="coupon_code" value=""
                            placeholder="Coupon code" type="text">
                            <button type="submit" class="btn btn-secondary">Apply
                                coupon</button>
                        <button class="btn theme-btn-2" name="apply_coupon" ></button>
                    </div>
                    <div class="coupon2">
                        <a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 ml-auto">
                <div class="cart-page-total">
                    <h2>Cart totals</h2>
                    <ul class="mb-20">
                        <li>Subtotal <span>$250.00</span></li>
                        <li>Total <span>$250.00</span></li>
                    </ul>
                    @auth
                        <a href="{{ url('checkout') }}" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a>
                    @else
                        <p>To proceed to checkout create or log in to your account...</p>
                        <span href="#" data-toggle="modal" data-target="#RegistrationModal" class="btn btn-success btn-block">Create/Login an Account<i class="fa fa-angle-right"></i></span>
                    @endauth
                </div>
            </div>
        </div>

    {{-- <div class="col-lg-6 col-12 mb-15" style="border: 2px solid green;">
        <!-- Billing Address -->
        {{-- <div class="well-box">
            <h2>Delivery Address</h2>
        
            <form action="{{ url('address') }}" method="POST"class="form" >
                {{csrf_field()}}
                <!-- Name of the Buyer-->
                <div class="form-group">
                    <label class="control-label" for="buyers_name">Your Full Name
                    </label>
                    <input id="buyers_name" name="buyers_name" type="text" value="{{ old('buyers_name') }}" class="form-control input-md {{ $errors->has('buyers_name') ? 'error' : '' }}" required>
                </div>

                <!-- Phone Number of the Buyer-->
                <div class="form-group">
                    <label class="control-label" for="phone">Your Phone Number
                    </label>
                    <input id="phone" name="phone" type="text" value="{{ old('phone') }}" class="form-control input-md {{ $errors->has('phone') ? 'error' : '' }}" required>
                </div>

                <!-- County of the Buyer-->
                <div class="form-group">
                    <label class="control-label" for="county">Your County
                    </label>
                    <select name="countyname" class="form-control" id="FormControlSelect">
                        <option>Select Your County</option>
                        @foreach($shippingcharges as $shippingcharge)
                           <option value="{{ $shippingcharge->id }}">{{ $shippingcharge->county }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- City of the Buyer-->
                <div class="form-group">
                    <label class="control-label" for="city">Your Town/City
                    </label>
                    <input id="city" name="city" type="text" value="{{ old('city') }}" class="form-control input-md {{ $errors->has('city') ? 'error' : '' }}" required>
                </div>

                <!-- Street address of the Buyer-->
                <div class="form-group">
                    <label class="control-label" for="address">Your Street Address Name
                    </label>
                    <input id="address" name="address" type="text" value="{{ old('name') }}" class="form-control input-md {{ $errors->has('name') ? 'error' : '' }}" required>
                </div>
                
                <!-- Button -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
            </form>
        </div>
        <!-- Discount Coupon -->
        <div class="discount-coupon">
            <P>Do you have a coupon code?</p>
                <h4>Discount Coupon Code</h4>
                <form action="#">
                    <div class="row">
                        <div class="col-md-6 col-12 mb-25">
                            <input type="text" placeholder="Coupon Code">
                        </div>
                        <div class="col-md-6 col-12 mb-25">
                            <input type="submit" value="Apply Code">
                        </div>
                    </div>
                </form>
                <div class="cart-coupon-button">
                    @auth
                        <button class="checkout-btn">Proceed to Checkout</button>
                    @else
                        <button class="checkout-btn">Create an account to proceed</button>
                    @endauth
                    {{-- <button class="update-btn">Update Cart</button>
                </div>
        </div>
    </div> 

    <!-- Cart Summary 
    <div class="col-lg-6 col-12 mb-40 d-flex" style="border: 2px solid green;">
        @if ()
            <div class="cart-summary">
                <div class="cart-summary-wrap">
                    <h4>Your Delivery Address</h4>
                    <p>Kiambu<span><a href="#">change address</a></span></p>
                </div>
            </div>

            <div class="cart-summary">
                <div class="cart-summary-wrap">
                    <h4>Cart Summary</h4>
                    <p>Sub Total <span>Sh.{{ $total_price }}</span></p>
                    <p>Shipping Cost <span>$00.00</span></p>
                    <h2>Grand Total <span>Sh.total price</span></h2>
                </div>
                <div class="cart-summary-button">
                    <button class="checkout-btn">Checkout</button>
                    <button class="update-btn">Update Cart</button>
                </div>
            </div>
        @else
            <div class="cart-summary">
                <div class="cart-summary-wrap">
                    <h4>Cart Summary</h4>
                    <p>Sub Total <span>Sh.{{ $total_price }}</span></p>
                    <p>Shipping Cost <span>$00.00</span></p>
                    <h2>Grand Total <span>Sh.total price</span></h2>
                </div>
                <div class="cart-summary-button">
                    <button class="checkout-btn">Checkout</button>
                    <button class="update-btn">Update Cart</button>
                </div>
            </div>
        @endif 
         <div class="cart-summary">
            <div class="cart-summary-wrap">
                <h4>Your Delivery Address</h4>
                <p>Kiambu<span><a href="#">change address</a></span></p>
            </div>
        </div> 
    
        <div class="cart-summary">
            <div class="cart-summary-wrap">
                <h4>Cart Summary</h4>
                <p>Sub Total <span>Sh.{{ $total_price }}</span></p>
                <h2>Grand Total <span>Sh.total price</span></h2>
            </div>
            <div class="cart-summary-button">
                @auth
                    <button class="checkout-btn">Proceed to Checkout</button>
                @else
                    <button class="checkout-btn">Create an account to proceed</button>
                @endauth
                {{-- <button class="update-btn">Update Cart</button>
            </div>
        </div>
     </div> --}}
    
</div>