
@extends('admin.layout.admin')

@section('title', 'Add Category')

@section('pageT', 'All Products')

@section('content')

<style type="text/css">
	h2 {
  text-align: center;
  }

  table caption {
    padding: .5em 0;
  }

  @media screen and (max-width: 767px) {
    table caption {
      border-bottom: 1px solid #ddd;
    }
  }

  .p {
    text-align: center;
    padding-top: 140px;
    font-size: 14px;
  }
</style>

<section class="content">
    <div class="row">
        
        <div class="col-md-12 col-xs-12">
            
            <div class="table-responsive box box-primary ">
                <div class="box-header with-border ">
                	<h3 class="box-title">Products</h3>
                </div>
                <!-- /.box-header -->
                <div class="col-md-12 col-xs-12">
                  <div >
                    <table class="table table-bordered">
                      <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Brand</th>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Avaibility</th>
                        <th>OnSale</th>
                        <th>Rate</th>
                        <th>Action</th>
                      </tr>
                      @forelse($products as $product)
                        <tr>
                          <td>{{ $i++ }}</td>
                          <td><img width="95px" height="95px" src="{{ asset($product->image) }}"></td>
                          <td>{{ $product->name }}</td>
                          <td>{{ $product->brand }}</td>
                          <td>{{ $product->color }}</td>
                          <td>{{ $product->size }}</td>
                          <td>$ {{ $product->price }}</td>
                          <td>{{ $product->widgcategory->name}}</td>
                          <td>{{ $product->availability ? "On Stock": "Out Stock" }}</td>
                          <td>{{ $product->onSale ? "on Sale": "Normal Price" }}</td>
                          <td>{{-- $product->rate->rate --}}</td>
                          <td>
                            <a href="{{ route('widget.show',$product->id) }}" class="btn btn-sm btn-info"><i class="fa fa-info"></i></a>
                            <a href="{{ route('widget.edit',$product->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                            {!! Form::open(['method' => 'DELETE', 
                                              'route' => ['widget.destroy', $product->id] ,
                                               'style' => 'display:inline',
                                               'onsubmit' => "return confirm('Are you Sure?')" ]) !!}

                              {{ Form::button('<i class="fa fa-trash"></i>', 
                                                ['type' => 'submit', 
                                                  'class' => 'btn btn-sm btn-danger'] )  }}

                            {!! Form::close() !!}

                          </td>
                        </tr>

                      @empty
                      <tr>
                          <td></td>
                          <td> </td>
                          <td>No Product Yet</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td> 
                      </tr>
                      @endforelse
                    </table>
                  </div>

                    <div class="panel panel-info col-md-2 pull-right">
                      <div class="panel-body">
                        Total Products : <strong><?php echo $products->total() ; ?>
                      </div>
                    </div>

                </div>
            </div>

            <div class="pager">
              <?php echo $products->render(); ?>
            </div>

        </div>
    </div>

</section>

@endsection