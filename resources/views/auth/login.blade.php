@extends('layouts.front')

@section('content')
<!--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->

<section class="default-page">
    <div class="container">
        <div class="tz-register">
            <h2>Login</h2>
            
            <!--Start form-->
            <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-12 ">
                @include('partials.errors')
            </div>

            <div class="clearfix"></div>

            <form method="post" action="{{ route('login')}}">
                {{ csrf_field() }}
                <p class="form-row form-row-wide">
                    <label for="email">Email address</label>
                    <input type="text" class="input-text" name="email" value="{{old('email')}}">
                </p>

                <p class="form-row form-row-wide">
                    <label for="password">Password</label>
                    <input class="input-text" type="password" name="password">
                </p>

                <p class="form-footer">
                    <a href="{{ route('password.request') }}" style="color: red;">Forgot Password?</a>
                    <button type="submit" class="pull-right button_class">LOGIN</button>
                </p>

                <p class="form-text">
                    Don't have an account? <a href="{{ route('register') }}" style="color: red;">Register Here</a>
                </p>
            </form>
            <!--End form-->

        </div>
    </div>
</section>
@endsection
