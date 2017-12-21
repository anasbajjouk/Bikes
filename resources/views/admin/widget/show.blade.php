
@extends('admin.layout.admin')

@section('title', 'Product Detail')

@section('pageT', 'Product Detail')

@section('content')

<section class="content">
  <div class="row">
      
      <div class="col-md-12">

          <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Product Information</h3>
                <a href="{{ route('widget.edit',$product->id) }}" class="btn btn-info pull-right col-md-2"> Edit</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
              
                <div class="container col-md-11 col-md-offset-1 col-sm-12">
                  <div style="margin-right: 200px;"></div>
                  <div class="row">
                    <div class="col-md-10 col-sm-12">
                      <div class="widget">
                        <div class="panel panel-default">
                          <div class="panel-heading">Image</div>
                          <div class="panel-body">
                            <div class="panel-list margin-top-1 text-center">

                              <img src="{{ asset($product->image) }}" class="col-xs-12 col-md-12 col-sm-10">

                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">

                    <div class="col-md-5 col-sm-6 col-xs-12">
                      <div class="widget">
                        <div class="panel panel-default">
                          <div class="panel-heading">Information</div>
                          <div class="panel-body">
                            <div class="panel-list margin-top-1 text-center">

                              <div class="form-group">
                                <label> <u>Name : </u> </label> &nbsp;
                                <strong class="">{{ $product->name }}</strong>
                              </div>

                              <div class="form-group">
                                <label> <u>Overview : </u> </label> &nbsp;
                                <strong class=""> " {{ $product->overview }} "</strong>
                              </div>

                              <div class="form-group">
                                <label><u>Color : </u></label> &nbsp;
                                <strong class="">{{ $product->color }}</strong>
                              </div>

                              <div class="form-group">
                                <label><u>Size : </u></label> &nbsp;
                                <strong class="">{{ $product->size }}</strong>
                              </div>

                              <div class="form-group">
                                <label><u>Price : </u></label> &nbsp;
                                <strong class=""> $ {{ $product->price }}</strong>
                              </div>

                              <div class="form-group">
                                <label><u>Category : </u></label> &nbsp;
                                <strong class="">{{ $product->widgcategory->name }}</strong>
                              </div>

                              <div class="form-group">
                                <label> <u>Description : </u> </label> &nbsp;
                                <strong class=""> " {{ $product->description }} " </strong>
                              </div>
                              
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-5 col-sm-6 col-xs-12">
                      <div class="widget">
                        <div class="panel panel-default">
                          <div class="panel-heading">Information</div>
                          <div class="panel-body">
                            <div class="panel-list margin-top-1 text-center">

                              <div class="form-group">
                                <label> <u>Brand : </u> </label> &nbsp;
                                <strong class="">{{ $product->brand }}</strong>
                              </div>

                              <div class="form-group">
                                <label> <u>Information : </u> </label> &nbsp;
                                <strong class=""> " {{ $product->information }} "</strong>
                              </div>

                              <div class="form-group">
                                <label><u>Availability : </u></label> &nbsp;
                                <strong class="">{{ $product->availability ? "On Stock": "Out Stock" }}</strong>
                              </div>

                              <div class="form-group">
                                <label><u>On Sale : </u></label> &nbsp;
                                <strong class="">{{ $product->onSale ? "on Sale": "Normal Price" }}</strong>
                              </div>

                              <div class="form-group">
                                <label><u>Discount : </u></label> &nbsp;
                                <strong class=""> $ {{ $product->discount? discount:0 }}</strong>
                              </div>

                              <div class="form-group">
                                <label><u></u></label> &nbsp;
                                <strong class=""></strong>
                              </div>

                              <div class="form-group">
                                <label> <u> </u> </label> &nbsp;
                                <strong class=""></strong>
                              </div>
                              
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>

                  </div>

                </div>

              </div>
              <!-- /.box-body -->
          </div>

      </div>
  </div>
</section>
@endsection