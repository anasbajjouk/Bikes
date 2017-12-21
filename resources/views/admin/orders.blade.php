
@extends('admin.layout.admin')

@section('title', 'Orders ')

@section('pageT', 'Orders ')

@section('content')

<section class="content">
  <div class="row">
        
    <div class="col-md-12 col-xs-12">

      <div class="box box-danger">

        <div class="box-header">

          <h3 class="box-title">Order Panel</h3>
        </div>

        <div class="box-body">

          <div class="form-group">
            <label>Date masks:</label>

          </div>
          @foreach($orders as $order)
          
            <div class="panel-group" id="accordion">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1{{ $order->id }}">
                      Order By : <strong>{{ $order->user->name }}</strong> 
                      <br> Total Price : <strong> $ {{ $order->total }}</strong>
                      <br> Order ID : <strong> {{ $order->id }}</strong>
                      <br> Status : <strong>{{ $order->status }} %</strong>
                    </a>
                  </h4>
                </div>
                <div id="collapse1{{ $order->id }}" class="panel-collapse collapse">
                  <div class="panel-body">
                    <div class="container">
                      <br>
                        <div class="row">
                          <form action="{{route('toggle.order',$order->id)}}" method="POST" id="deliver-toggle">
                            {{csrf_field()}}
                            
                            <div class="form-group col-md-6 col-xs-12 col-sm-6 pull-left">
                              <select name="action" id="input" class="form-control" required="required">

                                @if($order->delivered==1)

                                  <option value="1" disabled="" selected="">Delivered</option>

                                @else
                                  <option disabled="" selected="">Choose an action</option>
                                  <option value="waiting">Waiting</option>
                                  <option value="picked">Picked</option>
                                  <option value="on_the_way">On it's Way</option>

                                @endif

                              </select>
                            </div>
                            
                            <div class="form-group col-md-6 col-xs-12 col-sm-12 ">
                              <div class="checkbox col-md-3">
                                <label>
                                  <input type="checkbox" value="1" name="delivered"  {{$order->delivered==1?"checked":"" }}>
                                  Delivered
                                </label>
                              </div>

                              <input type="submit" value="Submit" class="btn btn-success">
                              
                            </div>
                            
                          </form>
                        </div>
                    </div>
                    
                  </div>

                  <!-- Table -->

                  <h3 style="margin-left: 10px">Items</h3>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>qty</th>
                        <th>price</th>
                      </tr>

                    </thead>
                    <tbody>

                      @if(isset($order->orderItems))

                        @foreach($order->orderItems as $item)

                          <tr>
                              <td>{{$item->name}}</td>
                              <td>{{$item->pivot->qty}}</td>
                              <td>{{$item->pivot->total}}</td>
                          </tr>

                        @endforeach

                      @endif

                      @if(isset($order->widgetItems))

                        @foreach($order->widgetItems as $item)

                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->pivot->qty}}</td>
                            <td>{{$item->pivot->total}}</td>
                        </tr>

                      @endforeach

                      @endif

                    </tbody>
                  </table>
                </div>
              </div>

            </div> 













          @endforeach
        </div>

      </div>

      <div class="pager">
        
      </div>

    </div>
  </div>

</section>

@endsection