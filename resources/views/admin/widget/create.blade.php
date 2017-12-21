
@extends('admin.layout.admin')

@section('title', 'Create Product')

@section('pageT', 'Create Product')

@section('content')

<section class="content">
    <div class="row">
        
        <div class="col-md-12">
            
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Widget Information</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <form role="form" method="POST" action="{{ route('widget.store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label>Name</label>
                      <input name="name" id="name" type="text" class="form-control" placeholder="Name of the product ..." value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                      <label>Brand</label>
                      <input name="brand" id="brand" type="text" class="form-control" placeholder="Brand name ..." value="{{ old('brand') }}">
                    </div>

                    <div class="form-group">
                      <label>Description</label>
                      <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter your description here ... " >{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                      <label>Information</label>
                      <textarea name="information" id="information" class="form-control" rows="3" placeholder="Enter the necessary information here ... " >{{ old('information') }}</textarea>
                    </div>

                    <div class="form-group">
                      <label>Select Category</label>
                      <select class="form-control" name="category_id" id="category_id">

                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                        
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Overview</label>
                      <textarea class="form-control" name="overview" id="overview" rows="3" placeholder="Short description ... ">{{ old('overview') }}</textarea>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                        <input type="number" class="form-control" name="price" id="price" placeholder="Add Price ..." min="0.99" max="3999.99" step="0.01" value="{{ old('price') }}">
                    </div>

                    <br>

                    <div class="form-group text-center">
                      <div class="radio">
                        <label>
                          <input type="radio" name="availability" id="availability" value="1" checked="">On Stock &nbsp;
                        </label>
                        <label>
                          <input type="radio" name="availability" id="availability" value="0" >Out Stock &nbsp;
                        </label>                 

                      </div>
                    </div>

                    <br>

                    <div class="form-group text-center">
                      <div class="radio">
                        <label>
                          <input type="radio" name="onSale" id="onSale" value="1" >On Sale &nbsp;
                        </label>
                        <label>
                          <input type="radio" name="onSale" id="onSale" value="0" checked="">Normal Price &nbsp;
                        </label>                 

                      </div>
                    </div>

                    <br>
                    
                    <div class="form-group text-center">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="color[]" value="black"> Black &nbsp;
                        </label>

                        <label>
                          <input type="checkbox" name="color[]" value="White"> White &nbsp;
                        </label>

                        <label>
                          <input type="checkbox" name="color[]" value="Blue"> Blue &nbsp;
                        </label>

                        <label>
                          <input type="checkbox" name="color[]" value="Orange"> Orange &nbsp;
                        </label>

                        <label>
                          <input type="checkbox" name="color[]" value="Grey"> Grey &nbsp;
                        </label>

                        <label>
                          <input type="checkbox" name="color[]" value="Pink"> Pink &nbsp;
                        </label>

                        <label>
                          <input type="checkbox" name="color[]" value="Red"> Red &nbsp;
                        </label>

                      </div>

                    </div>

                    <br>

                    <div class="form-group">
                      <label>Select Size</label>
                      <select multiple class="form-control" name="size[]">
                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                        
                      </select>
                    </div>
      
                    <div class="form-group">
                        <label for="image">Image : </label> 
                        <input type="file" name="image" id="image">
                    </div>
                    
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-fw fa-minus"></i> <i class="fa fa-percent"></i></span>
                        <input type="number" class="form-control" name="discount" id="discount" placeholder="Discount if Available" min="0" max="100" value="{{ old('discount') }}">
                    </div>

                    <br>

                    <div class="form-group text-center">
                        <input type="submit" name="submit" value="Submit" class="btn btn-lg btn-info ">
                    </div>
                    
                 </form>
                </div>
                <!-- /.box-body -->
            </div>

        </div>
    </div>
</section>
@endsection