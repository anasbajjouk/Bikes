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
        <h1 class="page-title">Whish List</h1>

        <!--Start form table-->

        <table class="shop_table cart">
            <!--Table header-->
            <thead>
                <tr>
                    <th class="product-thumbnail">Product</th>
                    <th class="product-name">&nbsp;</th>
                    <th class="product-price">Price</th>
                    <th class="product-subtotal">Total</th>
                    <th class="product-name">Action</th>
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
                            <a href='/front/{{$cartItem->options->type == 'w' ? "widget":"product"}}/{{$cartItem->id}}'> {{ $cartItem->name }} </a>
                            <span class="color">
                                Color: <i class="{{ lcfirst($cartItem->options->color) }}"></i>
                            </span>
                        </td>
                        
                        <td class="product-price">

                            <span class="amount">${{ $cartItem->price }}</span>
                        </td>

                        <td class="product-subtotal">

                            <span class="amount">${{ ($cartItem->price)*$cartItem->qty  }}</span>
                        </td>

                        <td class="">
                            <form action="{{route('cart.destroy',$cartItem->rowId)}}" method="POST" onsubmit="return confirm('Are you sure ? ')">

                                {{csrf_field()}}
                                {{method_field('DELETE')}}

                                <button name="wishlist" style="margin-left: 2px" class="btn btn-sm btn-danger remove" type="submit"><i class="fa fa-trash"></i></button>

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

    </div>
</section>

@endsection
