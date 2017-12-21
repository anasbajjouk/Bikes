@extends('layouts.front')

@section('title', 'Home')

@section('content')

<section class="shop-checkout">
    <div class="container"> 
        
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12">
                @include('partials.errors')
            </div>
            <div class="clearfix"></div>

            <form action="{{ route('address.store') }}" method="POST" role="form">
                {{ csrf_field() }}
                <legend>Shipping Address</legend>
            
                <div class="form-group">
                    <label for="">Address Line</label>
                    <input type="text" class="form-control" name="addressline" placeholder="Shipping Address" required="" value="{{ old('addressline') }}">
                </div>

                <div class="form-group">
                    <label for="">Country</label>
                    <select name="country" id="inputCountry" class="form-control" required="required">
                        @foreach($countries as $country)
                            <option value="{{ $country }}">{{ $country }}</option>
                        @endforeach
                        
                    </select>
                </div>

                <div class="form-group">
                    <label for="">State</label>
                    <input type="text" class="form-control" name="state" placeholder="State" value="{{ old('state') }}">
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-8">
                            <label for="">City</label>
                            <input type="text" class="form-control" name="city" placeholder="City" required="" value="{{ old('city') }}">
                        </div>

                        <div class="col-md-4">
                            <label for="">Zip Code</label>
                            <input type="text" class="form-control" name="zip" placeholder="Zip Code" required="" value="{{ old('zip') }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Phone </label><small> (include your national code please)</small>
                    <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="{{ old('phone') }}">
                </div>

                <div class="actions">
                    <br>
                   <!--<a href="{{ route('checkout.shipping') }}" class="update-cart" type="submit">CheckOut</a>-->
                   <button type="submit" class="update-cart">Submit</button>
                </div>

            </form>

        </div>
        
    </div>
</section>

@endsection
