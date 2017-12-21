
@extends('admin.layout.admin')

@section('title', 'Edit Product')

@section('pageT', 'Edit Product')

@section('content')

<section class="content">
    <div class="row">
        
        <div class="col-md-12">
            
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Product Information</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <form role="form" method="POST" action="{{ route('product.update', $products->id)}}" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="form-group">
                      <label>Name</label>
                      <input name="name" id="name" type="text" class="form-control" placeholder="Name of the product ..." value="{{ $products->name }}">
                    </div>

                    <div class="form-group">
                      <label>Brand</label>
                      <input name="brand" id="brand" type="text" class="form-control" placeholder="Brand name ..." value="{{ $products->brand }}">
                    </div>

                    <div class="form-group">
                      <label>Description</label>
                      <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter your description here ... " >{{ $products->description }}</textarea>
                    </div>

                    <div class="form-group">
                      <label>Information</label>
                      <textarea name="information" id="information" class="form-control" rows="3" placeholder="Enter the necessary information here ... " >{{ $products->information }}</textarea>
                    </div>

                    <div class="form-group">
                      <label>Select Category</label>
                      <select class="form-control" name="category_id" id="category_id">

                        <option value="{{ $products->category_id }}">{{ $proCatName }}</option>

                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                        
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Overview</label>
                      <textarea class="form-control" name="overview" id="overview" rows="3" placeholder="Short description ... ">{{ $products->overview }}</textarea>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                        <input type="number" class="form-control" name="price" id="price" placeholder="Add Price ..." min="0.99" max="3999.99" step="0.01" value="{{ $products->price }}">
                    </div>

                    <br>

                    <div class="form-group text-center">
                      <div class="radio">
                        <label>
                          <input type="radio" name="availability" id="availability" value="1" {{ $products->availability? 'checked': null }}   >On Stock &nbsp;
                        </label>
                        <label>
                          <input type="radio" name="availability" id="availability" value="0" {{ $products->availability? null: 'checked' }} >Out Stock &nbsp;
                        </label>                 

                      </div>
                    </div>

                    <br>

                    <div class="form-group text-center">
                      <div class="radio">
                        <label>
                          <input type="radio" name="onSale" id="onSale" value="1" {{ $products->onSale? 'checked': null }}>On Sale &nbsp;
                        </label>
                        <label>
                          <input type="radio" name="onSale" id="onSale" value="0" {{ $products->onSale? null: 'checked' }}>Normal Price &nbsp;
                        </label>                 

                      </div>
                    </div>

                    <br>
                    
                    <div class="form-group text-center">
                      <div class="checkbox">

                        <label class="text-center">
                          <input type="checkbox" disabled="" > Product's actual colors Please Re-Choose : {{ $products->color }} &nbsp;
                        </label>

                        <br><br>

                        <label>
                          <input type="checkbox" name="color[]" value="Black"> Black &nbsp;
                        </label>

                        <label>
                          <input type="checkbox" name="color[]" value="White" > White &nbsp;
                        </label>

                        <label>
                          <input type="checkbox" name="color[]" value="Blue"> Blue &nbsp;
                        </label>

                        <label>
                          <input type="checkbox" name="color[]" value="Orange" > Orange &nbsp;
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
                        <option disabled="" >Product actual Size- Please Re-Choose : {{ $products->size }}</option>
                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                        
                      </select>
                    </div>
      
                    <br>

                    <div class="form-group">
                        <label for="image">Image : </label> 
                        <input type="file" name="image" id="image">
                    </div>

                    <br>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-fw fa-minus"></i> <i class="fa fa-percent"></i></span>
                        <input type="number" class="form-control" name="discount" id="discount" placeholder="Discount if Available" min="0" max="100" value="{{ $products->discount }}">
                    </div>

                    <br>

                    <div class="form-group text-center">
                        <input type="submit" name="submit" value="Submit" class="btn btn-lg btn-primary ">
                    </div>
                    
                 </form>
                </div>
                <!-- /.box-body -->
            </div>

        </div>
    </div>
</section>
@endsection