<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Home')</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type='text/css'>
    <link href="{{ asset('fonts/font-awesome/css/font-awesome.min.css') }}" rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic' rel='stylesheet' type='text/css'>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <link href="{{ asset('fonts/lovelo/stylesheet.css') }}" rel='stylesheet' type='text/css'>

    <link href="{{ asset('css/owl.carousel.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/owl.theme.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('rs-plugin/css/settings.css') }}" rel="stylesheet" type='text/css'>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type='text/css'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body >


        <!--Start class site-->
    <div class="tz-site" id="app">


        
        @include('includes.header')


        @yield('content')



        @include('includes.footer')

    </div>
    <!--End class site-->
    
    <script type='text/javascript' src="{{ asset('js/jquery.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/off-canvas.js') }}"></script>

    <!--jQuery Countdow-->
    <script type='text/javascript' src="{{ asset('js/jquery.plugin.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/jquery.countdown.min.js') }}"></script>
    <!--End Countdow-->
    <script type='text/javascript' src="{{ asset('js/jquery.parallax-1.1.3.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/owl.carousel.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/custom.js') }}"></script>
    <script type='text/javascript' src="{{ asset('rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('rs-plugin/js/custom-rs.js') }}"></script>

</body>

</html>