<!--Start id tz header-->
<header id="tz-header" class="bk-white">
    <div class="container">

        <!--Start class header top-->
        <div class="header-top">
            <ul class="pull-left">
                <li>
                    <a href="#">Call us:   (012) 3456 7890</a>
                </li>
            </ul>
            @auth
                <ul class="pull-right">
                    @if(Auth::user()->role == "admin" || Auth::user()->role == "super_admin")
                        <li>
                            <a href="{{ route('admin.index') }}">Admin Panel</a>
                        </li>
                    @endif
                    <li>
                        <a href="{{ route('cart.wishlist') }}">Wishlist</a>
                    </li>
                    <li>
                        <a href="{{ route('cart.index') }}">My Cart</a>
                    </li>

                    @if(Auth::user()->role == 'user')
                        <li>
                            <a href="{{ route('show.profile', Auth::user()->id ) }}">Account</a>
                        </li>
                    @endif

                    <li>
                        <a href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>
            @endauth

            @guest
                <ul class="pull-right">
                    <li>
                        <a href="{{ route('register') }}">Register</a>
                    </li>
                    <li class="tz-header-login">
                        <a href="{{ route('login') }}">Login</a>
                    </li>
                </ul>
            @endguest

                

        </div>
        <!--End class header top-->

        <!--Start header content-->
        <div class="header-content">
            <h3 class="tz-logo pull-left"><a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="home" /></a></h3>
            <div class="tz-search pull-right">

                <!--Start form search-->
                <form method="GET" action="{{ route('front.search') }}">
                    <label class="select-arrow">
                        <select name="category">
                            <option value="product">Products</option>
                            <option value="widget">Widgets</option>
                        </select>
                    </label>
                    <input type="text" class="tz-query" id="tz-query" value="{{ old('search') }}" placeholder="Search for product" name="search">
                    <button type="submit"></button>
                </form>
                <!--End Form search-->
            </div>
        </div>
        <!--End class header content-->
    </div>

    <!--Start main menu -->
    <nav class="tz-menu-primary">
        <div class="container">

            <!--Main Menu-->
            <ul class="tz-main-menu pull-left nav-collapse">
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>

                <!--<li>
                    <a href="shop.html">Bikes
                        <span class="red-light">On sale!</span>
                    </a>
                </li>
                <li>
                    <a href="shop.html">Gear</a>
                </li>-->
                <li>
                    <a href="{{ route('front.widgetshop') }}">Widgets Shop</a>
                </li>

                <li>
                    <a href="{{ route('front.productshop') }}">products Shop</a>
                </li>

                <li>
                    <a href="{{ url('/contact-us') }}">Contact</a>
                </li>
            </ul>
            <!--End Main menu-->

            <!--Shop meta-->
            <ul class="tz-ecommerce-meta pull-right">
                <li class="tz-menu-wishlist">
                    <a href="{{ route('cart.wishlist') }}">
                        <strong>{{ Cart::instance('wishlist')->count() }}</strong>
                    </a>
                </li>

                <li class="tz-mini-cart">
                    <a href="{{ route('cart.index') }}">
                        <strong>{{ Cart::instance('shopping')->count() }}</strong>Cart : ${{Cart::total()}}
                    </a>

                </li>
            </ul>
            <!--End Shop meta-->

            <!--navigation mobi-->
            <button data-target=".nav-collapse" class="btn-navbar tz_icon_menu" type="button">
                <i class="fa fa-bars"></i>
            </button>
            <!--End navigation mobi-->
        </div>
    </nav>
    <!--End stat main menu-->

</header>
<!--End id tz header-->