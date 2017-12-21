@extends('layouts.front')

@section('title', 'Home')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/colors.css') }}">
<section class="shop-checkout">
    <div class="container">
        <!--Start Breadcrumbs-->
        <ul class="tz-breadcrumbs">
            <li>
                <a href="#">Home</a>
            </li>
            <li class="current">
                Shop Cart
            </li>
        </ul>
        <!--End Breadcrumbs-->
        <h1 class="page-title">Shop Cart</h1>

        <!--Start form table-->

        <table class="shop_table cart">
            <!--Table header-->
            <thead>
                <tr>
                    
                    <th class="product-thumbnail">Product</th>
                    <th class="product-name">&nbsp;</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-subtotal">Total</th>
                    <th class="product-subtotal">Actions</th>
                </tr>
            </thead>
            <!--End table header-->

            <!--Table body-->
            <tbody>
                @foreach($cartItems as $cartItem)


                        <tr class="cart_item">
                            <td class="product-thumbnail">

                                <a href="#"><img src="{{ asset($cartItem->options->image) }}" alt="{{ $cartItem->name }}" /></a>
                            </td>

                            <td class="product-name">
                                <a href=""> {{ $cartItem->name }} </a>
                                <span class="color">
                                    Color: <i class="{{ lcfirst($cartItem->options->color) }}"></i>
                                </span>
                            </td>
                            
                            <td class="product-price">

                                <span class="amount">${{ $cartItem->price }}</span>
                            </td>
                            
                            <td class="product-quantity">
                                {!! Form::open(['route' => ['cart.update',$cartItem->rowId], 'method' => 'PUT']) !!}

                                    <div class="quantity">
                                        <input type="number" step="1" min="0" name="qty" value="{{ $cartItem->qty }}" class="input-text qty text" size="4">
                                    </div>
                                
                            </td>

                            <td class="product-subtotal">

                                <span class="amount">${{ ($cartItem->price)*$cartItem->qty  }}</span>
                            </td>

                                
                            <td class="">

                                <button style="float: left;margin-right: 2px" class="btn btn-sm btn-primary" type="submit"><i class="fa fa-pencil"></i></button>

                                {!! Form::close() !!}

                                <form action="{{route('cart.destroy',$cartItem->rowId)}}"  method="POST" onsubmit="return confirm('Are you sure ? ')">

                                   {{csrf_field()}}
                                   {{method_field('DELETE')}}

                                   <button name="cart" style="margin-left: 2px" class="btn btn-sm btn-danger remove" type="submit"><i class="fa fa-trash"></i></button>

                                 </form>
                                
                            </td>
                           
                        </tr>

                @endforeach

                    <tr>
                        <td class="actions" colspan="6">
                            <a class="back-shop" href="{{ url()->previous() }}"><i class="fa fa-angle-left"></i> BACK TO SHOP</a>
                            <!--<button class="update-cart" type="submit">update cart</button>-->
                        </td>
                    </tr>

            </tbody>
            <!--End table body-->
        </table>

        <!--End form table-->

        <!--Cart attr-->
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <!--Coupon
                <div class="coupon">
                    <h3>Coupon</h3>
                    <form>
                        <p>Enter your coupon code if you have one.</p>
                        <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code">
                        <input type="submit" class="button" name="apply_coupon" value="Apply Coupon">
                    </form>
                </div>-->
                <!--End coupon-->
            </div>
            <div class="col-md-6 col-sm-6">

                <!--Cart totals-->
                <div class="cart_totals">
                    <div class="cart_totals_inner">
                        <table>
                            <tbody>    
                                <tr class="order-total">
                                    <th>Order total</th>
                                    <td><span class="amount">$ {{ Cart::subtotal() }}</span></td>
                                </tr>

                                <tr class="actions" colspan="6">
                                    <td class="actions" colspan="6">

                                        <a href="{{ route('checkout.shipping') }}" class="update-cart" type="submit">CheckOut</a> 
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <!--End cart totals-->

            </div>
        </div>
        <!--End cart attr-->
    </div>
</section>

@endsection
