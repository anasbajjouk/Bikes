
@extends('admin.layout.admin')

@section('title', 'Create Users')

@section('pageT', 'Create Users')

@section('content')
  
  @if( Auth::check() && Auth::user()->isSuperAdmin() )
    <section class="content">
    
      <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="box box-info">

            <div class="box-header with-border">
              <h3 class="box-title">Create a User</h3>
            </div>

            <br>

            <div class="row">
              <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 toppad" >

                <div class="panel panel-primary">
                  <div class="panel-heading"> 
                    <h3 class="panel-title">New Profile</h3>
                  </div>

                  <div class="panel-body">
                    <div class="row">

                      <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 toppad" >
                        </form>
                        {!! Form::open( ['method' => 'POST' , 'route' => ['user.store'] ] ) !!}
                          
                          <div class="form-group">
                            <label>Name : </label>
                            <input type="text" name="name" class="form-control">
                          </div>

                          <div class="form-group">
                            <label>Emil address : </label>
                            <input type="email" name="email" class="form-control">
                          </div>
                          
                          <div class="form-group">
                            <label>Password : </label>
                            <input type="password" name="password" class="form-control">
                          </div>

                          <div class="form-group">
                            <label>Password Confirmation : </label>
                            <input type="password" name="password_confirmation" class="form-control">
                          </div>

                          <div class="form-group">
                            <label>Select Gender : </label>
                            <select class="form-control" name="gender">
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label>Select Role : </label>
                            <select class="form-control" name="gender">
                              <option value="super_admin">Super Admin</option>
                              <option value="admin">Admin</option>
                              <option value="user">User</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <div class="checkbox">
                              Subscriber : &nbsp;
                              <label>
                                <input type="checkbox" value="1">
                                  Yes &nbsp;
                              </label> &nbsp;
    
                              <label>
                                <input type="checkbox" value="0" checked="">
                                  No
                              </label>
                            </div>
                          </div>
                          
                          {{ Form::button('<i class="fa fa-save">&nbsp; Save</i>', ['type' => 'submit', 'class' => ' col-md-8 col-xs-8 col-lg-8 col-sm-8 col-md-offset-2 col-xs-offset-2 col-lg-offset-2 col-sm-offset-2 btn btn-success'] )  }}

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
    <script>window.location = "/admin";</script>
  @endif
@endsection

