@extends('layouts.front')

@section('content')
<!--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
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
            <h2>Create an account</h2>
            
            <!--Start form-->
            <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-12 ">
                @include('partials.errors')
            </div>

            <div class="clearfix"></div>

            <form method="post" action="{{ route('register')}}">
                {{ csrf_field() }}
                <p class="form-row form-row-wide">
                    <label for="email">Email address</label>
                    <input type="text" class="input-text" name="email" value="{{old('email')}}">
                </p>

                <p class="form-row form-row-wide">
                    <label for="name">Name</label>
                    <input type="text" class="input-text" name="name" value="{{old('name')}}">
                </p>

                <p class="form-row form-row-wide">
                    <label for="password">Password</label>
                    <input class="input-text" type="password" name="password">
                </p>

                <p class="form-row form-row-wide">
                    <label for="password_confirmation">Password Confirmation</label>
                    <input class="input-text" type="password" name="password_confirmation">
                </p>

                <p class="form-row">
                    <input type="submit" class="button" name="register" value="Create an account">
                </p>
            </form>
            <!--End form-->

        </div>
    </div>
</section>
@endsection
