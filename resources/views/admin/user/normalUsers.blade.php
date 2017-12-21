
@extends('admin.layout.admin')

@section('title', 'Users Only')

@section('pageT', 'Users Only')

@section('content')

<section class="content">
    <div class="row">
        
        <div class="col-lg-12 col-md-12 col-xs-12">
            
            <div class="table-responsive box box-primary ">
                <div class="box-header with-border ">
                  <h3 class="box-title">Users</h3>
                </div>
                <!-- /.box-header -->
                <div class="col-lg-12 col-md-12 col-xs-12">
                  <div >
                    <table class="table table-bordered">
                      <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Role</th>
                        <th>Subscriber</th>
                        <th>Action</th>
                      </tr>
                      @forelse($normalUsers as $user)
                        <tr>
                          <td>{{ $i++ }}</td>
                          <td><img width="95px" height="95px" src="{{ asset($user->image) }}"></td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->phone }}</td>
                          <td>{{ $user->gender }}</td>
                          <td>{{ $user->role }}</td>
                          <td>{{ $user->subscriber ? "Yes": "No" }}</td>
                          <td>
                            <a href="{{ route('user.show',$user->id) }}" class="btn btn-sm btn-info"><i class="fa fa-info"></i></a>

                            @if( Auth::user()->role == 'super_admin')
                             
                              <a href="{{ route('user.edit',$user->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                              
                              {!! Form::open(['method' => 'DELETE', 
                                                'route' => ['user.destroy', $user->id] ,
                                                 'style' => 'display:inline',
                                                 'onsubmit' => "return confirm('Are you Sure?')" ]) !!}

                                {{ Form::button('<i class="fa fa-trash"></i>', 
                                                  ['type' => 'submit', 
                                                    'class' => 'btn btn-sm btn-danger'] )  }}

                              {!! Form::close() !!}
                              
                            @endif
                          </td>
                        </tr>

                      @empty
                      <tr>
                        <td colspan="12">No User Yet</td>
                      </tr>
                      @endforelse
                    </table>
                  </div>

                    <div class="panel panel-info col-md-2 pull-right">
                      <div class="panel-body">
                        Total Users : <strong><?php echo $normalUsers->total(); ?>
                      </div>
                    </div>

                </div>
            </div>

            <div class="pager">
              <?php echo $normalUsers->render(); ?>
            </div>

        </div>
    </div>

</section>

@endsection