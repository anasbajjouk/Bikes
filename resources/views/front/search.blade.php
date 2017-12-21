@extends('layouts.front')

@section('title', 'Home')


@section('content')

<!--Start shop-->
<div class="tz-shop">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <!--Start for shop sidebar-->
                <div class="tz-shop-sidebar">
                    <aside class="widget widget_product_categories">

                    </aside>
                    <aside class="product-catlog widget">

                    </aside>
                    <aside class="widget widget_product">

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
    
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="tz-product row grid-eff">
                        @foreach($search as $product)
                            <!--Product item-->
                            <div class="product-item col-md-4 col-sm-6">
                                <div class="item">
                                    <div class="product-item-inner">
                                        <div class="product-thumb">
                                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
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
                            {{--  $search->render(); --}}
                            {{-- $search->appends(['name' => $name])->links() --}}
                            {{ $search->appends(['number_item' => $number_item ,
                                                     'name' => $name,
                                                     'category' => $category,
                                                     'orderby' => $orderby,
                                                     ])->links() }}
                        </ul> 
                    </div>
                    
                    
                </div>
                <!--End shop content-->
            </div>
        </div>
    </div>
</div>

@endsection
