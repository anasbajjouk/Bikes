@extends('layouts.front')

@section('content')

<section class="default-page">
    <div class="container">
        <div class="tz-register ">
            <div class="col-md-6 col-md-offset-3">
                <h2>Order Details</h2>
                <br><br>
                @foreach($orders as $order)
                    <div class="panel-group" id="accordion">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                            Order Number : {{ $i++ }}</a>
                          </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse in">
                          <div class="panel-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4 col-lg-5"><label>Order ID :</label></div>
                                    <div class="col-md-8 col-lg-7">{{ $order->id }}</div>                                 
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-4 col-lg-5"><label>Number Of Products :</label></div>
                                    <div class="col-md-8 col-lg-7">{{$numberOfProducts}}</div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-4 col-lg-5"><label>Total Price :</label></div>
                                    <div class="col-md-8 col-lg-7">${{ $totalPrice }}</div>
                                </div>
                                <br>
                                
                                <order-progress status="{{ $order->delivered  }}" initial="{{ $order->status }}" order_id="{{ $order->id }}"></order-progress>

                            

                                <!--<div class="row">
                                    <div class="col-md-4 col-lg-5"><label>Delivered :</label></div>
                                    <div class="col-md-8 col-lg-7">{{-- $order->delivered == 0? "Waiting" : "Yes" --}}</div>
                                </div>
                                <br>

        
                                <div class="row">
                                    <div class="col-md-0 col-lg-5"><label>Status :</label></div>
                                    <div  class="col-md-5 col-lg-7 col-sm-10 ">
                                        <order-progress initial="{{-- $order->status --}}" order_id="{{-- $order->id --}}"></order-progress>
                                    </div>
                                </div>-->
                            </div>
                            
                          </div>
                        </div>
                      </div>
            
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
