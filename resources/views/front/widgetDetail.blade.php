@extends('layouts.front')

@section('title', 'Home')

@section('content')

<script src="{{ asset('js/bootstrap-rating-input.min.js')}}"></script>

<section class="tz-shop-single">
    <div class="container">

        <!--Start Breadcrumbs-->
        <ul class="tz-breadcrumbs">
            <li>
                <a href="">Home</a>
            </li>
            <li class="current">
                Category
            </li>
        </ul>
        <!--End Breadcrumbs-->
        <div class="row">
            <div class="col-md-6 col-sm-6">

                <!--Shop images-->
                <div class="shop-images" style="padding-right: 20px;">
                    <ul class="single-gallery">
                        <li>
                            <img src="{{ asset($widget->image) }}" alt="{{ $widget->name }}" width="450px">
                        </li>
                    </ul>
                    <div class="product-social">
                        <a href="#" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-twitter"></a>
                        <a href="#" class="fa fa-google-plus"></a>
                        <a href="#" class="fa fa-dribbble"></a>
                    </div>
                </div>
                <!--End shop image-->
            </div>

            <div class="col-md-6 col-sm-6">
                <!--Shop content-->
                <div class="entry-summary">
                    <h1>{{ $widget->name }}</h1>
                    <span class="p-vote">
                        <input type="number" name="your_awesome_parameter" id="rating-readonly" class="rating" data-clearable="remove" value="{{ $overallRate?:'1' }}" data-readonly/> ({{ $countUsers?:'0' }} <i class="fa fa-users"></i>)
                    </span>
                    <p class="product-price">
                        <span class="price">${{ $widget->price }}</span>
                        <span class="stock">Availability:  <span>{{ $widget->availability? "In Stock": "Out Stock" }}</span></span>
                    </p>
                    <div class="description">
                        <p>
                            {{ $widget->overview }}
                        </p>
                    </div>
                    <form class="tz_variations_form" method="POST" action="{{ route('cart.widgetItem',$widget->id) }}">
                        {{ csrf_field() }}
                        <p class="form-attr">
                            <span class="color">
                                <label>Color:</label>
                                @if($widget->color != '')
                                    <select name="color">
                                        @foreach(explode(', ' , $widget->color) as $color)
                                            <option value="{{ $color }}">{{ $color }}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </span>
                            <span class="tzqty">
                                <label>Qty:</label>
                                <input type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="input-text qty text" size="4">
                            </span>
                        </p>
                        <p>
                            <button type="submit" name="cart" class="single_add_to_cart_button">Add to cart</button>
                            <button type="submit" name="wishlist" class="single_add_to_wishlist">add to wishlist</button>
                        </p>
                    </form>
                </div>
                <!--End shop content-->
            </div>

        </div>
    </div>

    <!--Shop tabs-->
    <div class="tz-shop-tabs">
        <div class="container">
            <div class="tab-head">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#description" data-toggle="tab">Description</a></li>
                    <li role="presentation"><a href="#information" data-toggle="tab">Information</a></li>
                    <li role="presentation"><a href="#rating" data-toggle="tab">Rate</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="description">
                    <p>{{ $widget->description }}</p>
                </div>

                <div class="tab-pane" id="information">
                    <p>{{ $widget->information }}</p>
                </div>

                @auth
                    @if ( isset($pivotUserID) && isset($pivotWidgetID) /*OrderProduct Table */ ) 

                        @if( ( Auth::user()->id == $pivotUserID) && ($pivotWidgetID == $widget->id) /*IF THE USER HAS BOUGHT THIS PRODUCT*/)

                            @if( isset($itemRate) && isset($userRate) ) 

                                @if( (Auth::user()->id == $userRate) && ($itemRate == $widget->id) /* IF RATED THEN SHOW THE RATE OTHERWISE Let the suer rate it*/)
                                    <div class="tab-pane" id="rating">
                                        <div class="col-md-4 col-md-offset-5 col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-4">
                                            <input type="number" name="your_awesome_parameter" id="rating-readonly" class="rating" data-clearable="remove" value="{{ $rateValue }}" data-readonly/>
                                        </div>
                                    </div>

                                @endif

                            @else
    
                                <div class="tab-pane" id="rating">
                                    <div class="col-md-4 col-md-offset-5 col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-4">
                                        <form method="POST" action="{{ route('rate.widgetRate',$widget->id) }}" class="rating">
                                            {{ csrf_field() }}

                                            <input type="number" name="your_awesome_parameter" id="rating1" class="rating" />

                                            <button type="submit" class="btn btn-success col-md-offset-4 col-xs-offset-4">Submit</button>

                                        </form>
                                    </div>
                                </div>

                            @endif


                        @else

                            <div class="tab-pane" id="rating">

                                <p>You can not rate this product until buying it .</p>
                            </div>

                        @endif

                    @else

                        <div class="tab-pane" id="rating">

                            <p>You can not rate this product until buying it .</p>

                        </div>
                        
                    @endif

                @endauth

            </div>
        </div>
    </div>
    <!--End tab-->

    <!--Tabs product-->
    <div class="container">
        <div class="box-shadow">

            <!--Tabs header-->
            <div class="tz-tabs-header">
                <h2 class="tz-tabs-title pull-left">Products</h2>
            </div>
            <!--End tab header-->

            <!--Tab content-->
            <div class="tab-content">
                @foreach($products->chunk(4) as $chunk)
                    <!--Tab item-->
                    <div class="tab-pane active">
                        <!--Start product-->
                        <div class="row row-item">
                            @foreach($chunk as $product)
                                <div class="col-md-3 col-sm-6" >

                                    <!--Start product item-->
                                    <div class="product-item" >
                                        <div class="product-thubnail">
                                            <img src="{{ asset($product->image) }}" alt="{{$product->name}}" width="100px" />
                                            <div class="product-meta">
                                                <a class="add-to-cart" href="{{ route('front.productDetail',$product->id)}}">Add to cart</a>
                                                <span class="quick-view">
                                                    <a href="{{ route('front.productDetail',$product->id)}}">Quick view</a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="product-infomation">
                                            <h4><a href="{{ route('front.productDetail',$product->id) }}">{{ $product->name }}</a></h4>
                                            <span class="product-price">$ {{ $product->price }}</span>
                                        </div>
                                    </div>
                                    <!--End product item-->

                                </div>
                            @endforeach
                        </div>

                    </div>
                    <!--End tab item-->
                @endforeach
            </div>
            <!--End tab content-->

        </div>
    </div>
    <!--End tabs-->

    @include('includes.partners')
</section>

@endsection
