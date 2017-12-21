 
@extends('admin.layout.admin')

@section('title', 'Dashboard')

@section('content')

<!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row" >
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{ $orders }}</h3>

            <p>New Orders</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{-- route('order.orders') --}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3> <sup style="font-size: 20px">$</sup> {{ $rate }}</h3>

            <p>Bounce Rate</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{ $users }}</h3>

            <p>User Registrations</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{ route('user.normalusers') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <!--<div class="small-box bg-red">
          <div class="inner">
            <h3>65</h3>

            <p>Unique Visitors</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>-->
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-7 connectedSortable">
        <!-- Chat box -->
        <div class="box box-success">
          <div class="box-header">
            <i class="fa fa-comments-o"></i>

            <h3 class="box-title">Chat</h3>

            <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
              <div class="btn-group" data-toggle="btn-toggle">
                <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i>
                </button>
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
              </div>
            </div>
          </div>
          <div class="box-body chat" id="chat-box">
            <!-- chat item -->
            <div class="item">
              <img src="dist/img/user4-128x128.jpg" alt="user image" class="online">

              <p class="message">
                <a href="#" class="name">
                  <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                  Mike Doe
                </a>
                I would like to meet you to discuss the latest news about
                the arrival of the new theme. They say it is going to be one the
                best themes on the market
              </p>
              <div class="attachment">
                <h4>Attachments:</h4>

                <p class="filename">
                  Theme-thumbnail-image.jpg
                </p>

                <div class="pull-right">
                  <button type="button" class="btn btn-primary btn-sm btn-flat">Open</button>
                </div>
              </div>
              <!-- /.attachment -->
            </div>
            <!-- /.item -->
            <!-- chat item -->
            <div class="item">
              <img src="dist/img/user3-128x128.jpg" alt="user image" class="offline">

              <p class="message">
                <a href="#" class="name">
                  <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                  Alexander Pierce
                </a>
                I would like to meet you to discuss the latest news about
                the arrival of the new theme. They say it is going to be one the
                best themes on the market
              </p>
            </div>
            <!-- /.item -->
            <!-- chat item -->
            <div class="item">
              <img src="dist/img/user2-160x160.jpg" alt="user image" class="offline">

              <p class="message">
                <a href="#" class="name">
                  <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
                  Susan Doe
                </a>
                I would like to meet you to discuss the latest news about
                the arrival of the new theme. They say it is going to be one the
                best themes on the market
              </p>
            </div>
            <!-- /.item -->
          </div>
          <!-- /.chat -->
          <div class="box-footer">
            <div class="input-group">
              <input class="form-control" placeholder="Type message...">

              <div class="input-group-btn">
                <button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box (chat box) -->

      </section>
      <!-- /.Left col -->
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <section class="col-lg-5 connectedSortable">
        
        <div class="box box-info">
          <div class="box-header">
            <i class="fa fa-envelope"></i>

            <h3 class="box-title">Quick Email</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                      title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <div class="box-body">
            <form action="#" method="post">
              <div class="form-group">
                <input value="{{Auth::user()->name}}" type="name" class="form-control" name="name" disabled="">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="emailto" placeholder="Email to:">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" placeholder="Subject">
              </div>
              <div>
                <textarea class="textarea" placeholder="Message"
                          style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
            </form>
          </div>
          <div class="box-footer clearfix">
            <button type="button" class="pull-right btn btn-default" id="sendEmail">Send
              <i class="fa fa-arrow-circle-right"></i></button>
          </div>
        </div>
    
      </section>
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->

  </section>
  <!-- /.content -->

@endsection

