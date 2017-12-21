@extends('layouts.front')

@section('title', 'Shop')

@section('content')

<!--Start shop-->
<div class="tz-shop">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <!--Start for shop sidebar-->
                <div class="tz-shop-sidebar">
                    <aside class="widget widget_product_categories">
                        <h3 class="widget-title">Bikes product</h3>

                        <form method="GET" action="{{ route('front.productshop') }}">

                            <ul class="product-categories">

                                <div class="radio">
                                    <label>
                                        <input type="radio" name="category" value="" checked="">All
                                    </label>
                                </div>

                                @foreach($categories as $category)
                                <li>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="category" value="{{ $category->id }}">{{ $category->name }}
                                        </label>
                                    </div>
                                    
                                </li>
                                @endforeach
                            </ul>
                    </aside>
                    <aside class="product-catlog widget">
                        <h3 class="widget-title">Catalog</h3>
                        
                            
                            <div class="widget_price_filter">
                                <h4 class="widget-title-children">
                                    Price Filter
                                </h4>
                                <div class="form-group">
                                    <label>Min Price : </label>
                                    <input type="number" name="min_price" class="form-control" value="{{ $min_price }}" min="0" max="4000" step="0.1">
                                </div>
            
                                <div class="form-group">
                                    <label>Max Price : </label>
                                    <input type="number" name="max_price" class="form-control" value="{{ $max_price }}" min="0" max="4000" step="0.1" >
                                </div>
                                
                            </div>

                            <div class="widget_price_filter">
                                <h4 class="widget-title-children">
                                    Brand Filter
                                </h4>

                                <div class="radio">
                                    <label>
                                        <input type="radio" name="brand" value="">All
                                    </label>
                                </div>

                                <div class="radio">
                                    <div class="form-group">
                                        <label>
                                            <input {{ $brand=="Trek" ? 'checked' : '' }} type="radio" name="brand" value="Trek">
                                        Trek
                                        </label>
                                    </div>
                                </div>

                                <div class="radio">
                                    <div class="form-group">
                                        <label>
                                            <input {{ $brand=="something" ? 'checked' : '' }} type="radio" name="brand" value="something">
                                        Something
                                        </label>
                                    </div>
                                </div>

                                <div class="radio">
                                    <div class="form-group">
                                        <label>
                                            <input {{ $brand=="decathlon" ? 'checked' : '' }} type="radio" name="brand" value="decathlon">
                                        Decathlon
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="widget_price_filter ">
                                <br>
                                <button class="btn btn-success col-lg-12 col-xs-12 col-md-12 col-sm-12" type="submit">Submit</button>
                                <br>
                            </div>
                            
                        
                    </aside>
                    <aside class="widget widget_product">
                        <h3 class="widget-title">Featured product</h3>
                        <ul>
                            @foreach($randomProducts as $randomProduct)
                                <li>
                                    <a href="{{ route('front.productDetail', $randomProduct->id) }}">
                                        <img src="{{ asset($randomProduct->image) }}" alt="{{ $randomProduct->name }}" >
                                        <div class="item-info">
                                            <h5>{{ $randomProduct->name }}</h5>
                                             <span class="p-vote">
                                                <br>
                                            </span>
                                            <span class="price">${{ $randomProduct->price }}</span>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
                <!--End shop sidebar-->

            </div>

            <div class="col-md-9">

                <!--Start shop content-->
                <div class="tz-shop-content">
                    <ul class="tz-breadcrumbs">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="current">
                            Category
                        </li>
                    </ul>
                    <div class="shop-banner">
                        <img src="{{ asset('images/product/banner.jpg') }}" alt="banner">
                    </div>
                    <div class="catalog-meta">
                        <div class="catalog_top">
                            <span class="style-switch">
                                <a class="nav-grid-view fa fa-th-large active"></a>
                                <a class="nav-list-view fa fa-list"></a>
                            </span>

                                <div class="shop-order">
                                    <label class="form-arrow">
                                        <select class="number-item" name="number_item">
                                            <option value="{{ $number_item }}">{{ $number_item }} items/page</option>
                                            <option value="12">12 items/page</option>
                                            <option value="6">6 items/page</option>
                                            <option value="3">3 items/page</option>
                                        </select>
                                    </label>
                                    <label class="form-arrow">
                                        <select name="orderby" class="orderby">
                                            <option value="rating">Sort by rating</option>
                                            <option value="desc">Sort by newness</option>
                                            <option value="asc">Sort by old</option>
                                        </select>
                                    </label>

                                    <label class="form-group" style="margin: 10px">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="tz-product row grid-eff">
                        @foreach($products as $product)
                            <!--Product item-->
                            <div class="product-item col-md-4 col-sm-6">
                                <div class="item">
                                    <div class="product-item-inner">
                                        <div class="product-thumb">
                                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="170px" >
                                        </div>
                                        <div class="product-info">
                                            <h4><a href="{{ route('front.productDetail',$product->id)}}">{{ $product->name }}</a></h4>
                                            <span class="p-meta">
                                                <span class="p-price">${{ $product->price }}</span>
                                                <span class="p-vote">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </span>
                                            </span>
                                            <span class="p-color">
                                                 <i class="fa fa-circle light-blue"></i>
                                                <i class="fa fa-circle orange"></i>
                                                <i class="fa fa-circle blueviolet"></i>
                                                <i class="fa fa-circle orange-dark"></i>
                                                <i class="fa fa-circle steelblue"></i>
                                            </span>
                                                <p>
                                                   {{ $product->overview }}
                                                </p>
                                            <span class="p-mask">
                                                <a href="{{ route('front.productDetail',$product->id)}}" class="add-to-cart">Add to cart</a>
                                               <span class="quick-view">
                                                    <a href="{{ route('front.productDetail',$product->id)}}"><i class="fa fa-eye"></i> Quick view</a>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End product item-->
                        @endforeach

                    </div>

                    <div class="col-lg-4 col-lg-offset-4 col-xs-8 col-xs-offset-3">
                       <ul class="pager">
                            {{--$products->render()--}}
                            {{ $products->appends(['number_item' => $number_item ,
                                                     'min_price' => $min_price,
                                                     'max_price' => $max_price,
                                                     'brand' => $brand,
                                                     ])->links() }}
                        </ul> 
                    </div>
                    
                    
                </div>
                <!--End shop content-->
            </div>
        </div>
    </div>
</div>
<!--End Shop-->

@endsection
