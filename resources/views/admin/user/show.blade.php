
@extends('admin.layout.admin')

@section('title', 'Info Users')

@section('pageT', 'Info Users')

@section('content')

  <section class="content">
  
    <div class="row">
      <div class="col-md-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
        <div class="box box-info">

          <div class="box-header with-border">
            <h3 class="box-title">Admin Information</h3>
          </div>
          <br>
          <div class="row">
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 toppad" >

              <div class="panel panel-info">
                <div class="panel-heading">

                  <br>
                  <h3 class="panel-title pull-left">{{ $user->name }}</h3></h3>

                  <span class=pull-right>
                    <a href="{{ route('user.edit',$user->id) }}" class="btn btn-sm btn-warning" >Edit Profile</a>
                    <a href="{{ route('logout') }}" class="btn btn-sm btn-danger" >Logout</a>
                    <br>
                    <small class="text-info">Last Login : {{ $user->last_login_at }} </small>
                  </span>

                  <div class="clearfix"></div>

                </div>

                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-3 col-lg-3" align="center"> <img alt="User Pic" src="{{ asset($user->image) }}" class="img-circle img-responsive"> </div>

                    <div class=" col-md-9 col-lg-9"> 
                      <table class="table table-user-information">
                        <tbody>
                          <tr>
                            <td>Hire date:</td>
                            <td><strong>{{ $user->created_at->format('d/m/Y') }}</strong></strong></td>
                          </tr>

                          <tr>
                            <td>Date of Birth</td>
                            <td><strong>{{ $user->birthDate?$user->birthDate->format('d/m/Y'):'' }}</strong></td>
                          </tr>

                          <tr>
                            <td>Gender</td>
                            <td><strong>{{ $user->gender }}</strong></td>
                          </tr>

                          <tr>
                            <td>Home Address</td>
                            <td><strong>{{ $user->address }}</strong></td>
                          </tr>

                          <tr>
                            <td>Email</td>
                            <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></a></td>
                          </tr>

                          <tr>
                            <td>Phone Number</td>
                            <td><strong>{{ $user->phone }}</strong></td>
                          </tr>

                          <tr>
                            <td>Role</td>
                            <td><strong>{{ $user->role }}</strong></td>
                          </tr>

                          <tr>
                            <td>Subscriber</td>
                            <td><strong>{{ $user->subscriber? "Yes": "No" }}</strong></td>
                          </tr>
                         
                        </tbody>
                      </table>
                      
                      <!--<a href="#" class="btn btn-primary">My Sales Performance</a>
                      <a href="#" class="btn btn-primary">Team Sales Performance</a>-->
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

@endsection

