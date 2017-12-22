@extends('layouts.front')

@section('title', 'Home')


@include('partials.success')

@section('content')

@include('includes.slider')

    <script type="text/javascript">
        swal({
          title: "Welcome",
          text: "Admin account : admin@gmail.com - password : secret",
          icon: "success",
          button: "Gotcha",

        });
       
    </script>

<!--Start section large top for tabs content-->
<div class="section-large-top">
    <div class="container">
        <!--Tabs Shop-->
        <div class="tz-shortcode-tabs">
            <h1><strong>PRODUCTS </strong> </h1>
            <!--Tab content-->
            <div class="tab-content">

                @forelse($products->chunk(4) as $chunk)
                    <!--Tab item-->
                    <div class="tab-pane active" >
                        <div class="row row-item">
                            @foreach($chunk as $product)
                                <div class="col-md-3 col-sm-6 ">
                                    
                                    <!--Start product item-->
                                    <div class="product-item">
                                        <div class="product-thubnail">
                                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="100px" />
                                            <div class="product-meta">
                                                <a class="add-to-cart" href="{{ route('front.productDetail',$product->id)}}">Add to cart</a>
                                                <span class="quick-view">
                                                    <a href="{{ route('front.productDetail',$product->id)}}">Quick view</a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="product-infomation">
                                            <h4><a href="{{ route('front.productDetail',$product->id)}}">{{ $product->name }}</a></h4>
                                            <span class="product-price">${{ $product->price }}</span>
                                        </div>
                                    </div>
                                    <!--End product item-->

                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!--End tab item-->
                @empty
                    No product is available
                @endforelse
            </div>
            <!--End tab content-->

        </div>
        <!--End Tabs Shop-->
    </div>
</div>
<!--End section large top for tabs content-->

@include('includes.onsale')


<!--Start section large top for tabs content-->
<div class="section-large-top">
    <div class="container">

        <!--Start class Shortcode tabs-->
        <div class="tz-shortcode-tabs">
            <h1><strong>WIDGETS </strong> </h1>
            <!--Start Tabs content-->
            <div class="tab-content">
                @forelse($widgets->chunk(4) as $chunk)
                    <!--Tab item-->
                    <div class="tab-pane active">
                        <!--Start product-->
                        <div class="row row-item">
                            @foreach($chunk as $widget)
                                <div class="col-md-3 col-sm-6" >

                                    <!--Start product item-->
                                    <div class="product-item" >
                                        <div class="product-thubnail">
                                            <img src="{{ asset($widget->image) }}" alt="{{ $widget->name }}" width="100px" />
                                            <div class="product-meta">
                                                <a class="add-to-cart" href="{{ route('front.widgetDetail',$widget->id)}}">Add to cart</a>
                                                <span class="quick-view">
                                                    <a href="{{ route('front.widgetDetail',$widget->id)}}">Quick view</a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="product-infomation">
                                            <h4><a href="{{ route('front.widgetDetail',$widget->id) }}">{{ $widget->name }}</a></h4>
                                            <span class="product-price">$ {{ $widget->price }}</span>
                                        </div>
                                    </div>
                                    <!--End product item-->
                                
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <!--End tab item-->
                @empty
                    No product is available
                @endforelse
            </div>
            <!--End tabs content-->

        </div>
        <!--End class Shortcode tabs-->

    </div>
</div>
<!--End section large top for tabs content-->

@include('includes.parallax')

@include('includes.partners')
@auth
            <order-alert user_id={{ Auth()->user()->id }}></order-alert>
        @endauth
        <script src="{{ asset('js/app.js') }}"></script>
@endsection
