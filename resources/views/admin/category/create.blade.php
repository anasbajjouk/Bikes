
@extends('admin.layout.admin')

@section('title', 'Add Category')

@section('content')

<section class="content">
  <div class="row">
      
    <div class="col-md-12">
        
      <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Category Information</h3>
          </div>
          <!-- /.box-header -->
          <div class="box col-md-6">
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Category name</th>
                  <th>Action</th>
                </tr>
                @forelse($categories as $category)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $category->name }}</td>
                    <td width="200px" class="text-center">
                      <a href='#modal-id-{{$category->id}}' data-toggle="modal" class="btn btn-sm btn-info"><i class="fa fa-pencil"></i></a>
                      
                      {!! Form::open(['method' => 'DELETE', 
                                      'route' => ['category.destroy', $category->id] ,
                                      'style' => 'display:inline',
                                      'onsubmit' => 'return confirm("Are you sure?")' ]) !!}

                        {{ Form::button('<i class="fa fa-trash"></i>', 
                                        ['type' => 'submit', 
                                          'class' => 'btn btn-sm btn-danger'] )  }}
                                          
                      {!! Form::close() !!}
                      
                      <div class="modal fade" id="modal-id-{{$category->id}}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Edit Category</h4>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('category.update',$category->id) }}" method="POST" role="form">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <div class="form-group">
                                  <label for="">Category Name</label>
                                  <input type="text" class="form-control" name="name" placeholder="Input field" value="{{ $category->name }}" required="">
                                </div>

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>

                              </form>
                            </div>
                            
                          </div>
                        </div>
                      </div>

                    </td>
                  </tr>

                @empty
                <tr>
                    <td></td>
                    <td>No Category yet </td>
                    <td></td> 
                  </tr>
                @endforelse
              </table>
            </div>
          </div>

          <div class="box-body">
            <form role="form" method="POST" action="{{ route('category.store')}}" enctype="multipart/form-data">
              
              {{ csrf_field() }}

              <div class="form-group">
                <label>Name</label>
                <input name="name" id="name" type="text" class="form-control" placeholder="Name of the category ..." value="{{ old('name') }}" required="">
              </div>
              
              <div class="form-group text-center">
                  <input type="submit" name="submit" value="Submit" class="btn btn-info ">
              </div>
              
            </form>
          </div>
          <!-- /.box-body -->
      </div>

    </div>
  </div>
</section>

@endsection