
@extends('layouts.front')

@section('title', 'Change Password')

@section('content')

  @if( ( (Auth::check() && Auth::user()->id == $user->id) ) )
    <section class="content">
    
      <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="box box-info">

            <div class="box-header with-border">

              <div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">

                @include('partials.errors')
                @include('partials.success')

              </div>

            </div>
            <br>
            <div class="row">
              <div class="col-xs-10 col-sm-10 col-md-8 col-lg-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-2 col-lg-offset-2 toppad" >

                <div class="panel panel-success">
                  <div class="panel-heading"> 
                    <h3 class="panel-title">{{ $user->name }}'s Profile</h3>
                  </div>

                  <div class="panel-body">
                    <div class="row">
                      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> 

                        {!! Form::open( [ 'files' => true, 'method' => 'PUT' , 'route' => ['user.changeUserPassword', $user->id] ] ) !!}
                          
                          <div class="form-group">
                            <label>Old Password : </label>
                            <input type="password" name="old_password" class="form-control">
                          </div>

                          <div class="form-group">
                            <label>New Password : </label>
                            <input type="password" name="password" class="form-control">
                          </div>

                          <div class="form-group">
                            <label>Confirm your Password : </label>
                            <input type="password" name="password_confirmation" class="form-control">
                          </div>

                          <br><br>
                          {{ Form::button('<i class="fa fa-save">&nbsp; Save</i>', ['type' => 'submit', 'class' => ' col-md-8 col-xs-8 col-lg-8 col-sm-8  col-md-offset-2 col-xs-offset-2 col-lg-offset-2 col-sm-offset-2 btn btn-info'] )  }}

                        {!! Form::close() !!}          

                      </div>
                    </div>
                  </div>

                  <div class="panel-footer">
                  </div>
        
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
  @else
    <script>window.location = "/home";</script>

@endif
@endsection

