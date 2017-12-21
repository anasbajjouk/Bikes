
@extends('layouts.front')

@section('title', 'Edit My Profile')

@section('content')
  
  @if( ( (Auth::check() && Auth::user()->id == $user->id)  ) )
    <section class="content">
    
      <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 " style="margin-top: 80px;margin-bottom: 80px;">
          <div class="box box-info">

            <div class="box-header with-border">

              <div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">

                @include('partials.errors')

              </div>

            </div>
            <br>
            <div class="row">
              <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 toppad" >

                <div class="panel panel-success">
                  <div class="panel-heading"> 
                    <h3 class="panel-title">{{ $user->name }}'s Profile</h3>
                  </div>

                  <div class="panel-body">
                    <div class="row">
                      <div class="col-md-3 col-lg-3" align="center"> <img alt="User Pic" src="{{ asset($user->image) }}" class="img-circle img-responsive"> </div>

                      <div class=" col-md-9 col-lg-9"> 

                        {!! Form::open( [ 'files' => true, 'method' => 'PATCH' , 'route' => ['update.profile', $user->id] ] ) !!}
                          
                          <div class="form-group">
                            {!! Form::label('name', 'Name ') !!}
                            {!! Form::text('name' , $user->name , ['class' => 'form-control']) !!}
                          </div>

                          <div class="form-group">
                            {!! Form::label('birthDate', 'Date of Birth ') !!}
                            {!! Form::date('birthDate' , $user->birthDate , ['class' => 'form-control']) !!}
                          </div>

                          <div class="form-group">
                            <label>Select Gender</label>
                            <select class="form-control" name="gender">
                              <option value="Male" {{$user->gender == 'Male'?'selected':null}}>Male</option>
                              <option value="Female" {{$user->gender == 'Female'?'selected':null}}>Female</option>
                            </select>
                          </div>

                          <div class="form-group">
                            {!! Form::label('address', 'Home Address') !!}
                            {!! Form::text('address', $user->address , ['class' => 'form-control']) !!}
                          </div>

                          <div class="form-group">
                            {!! Form::label('email', 'Email Address') !!}
                            {!! Form::email('email', $user->email , ['class' => 'form-control']) !!}
                          </div>

                          <div class="form-group">
                            {!! Form::label('phone', 'Phone Number') !!}
                            {!! Form::text('phone', $user->phone , ['class' => 'form-control']) !!}
                          </div>

                          <div class="form-group">
                            <label for="image">Image : </label>
                            <input type="file" name="image" id="image" >
                          </div>
                          
                          <br>

                          <a class="btn btn-primary" href="{{ route('user.getUserPassword', $user->id) }}">Change Password</a>

                          <br><br>
                          {{ Form::button('<i class="fa fa-save">&nbsp; Save</i>', ['type' => 'submit', 'class' => ' col-md-8 col-xs-8 col-lg-8 col-sm-8 col-md-offset-2 col-xs-offset-2 col-lg-offset-2 col-sm-offset-2 btn btn-info'] )  }}
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

