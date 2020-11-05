@extends('layouts.main')

@section('content')
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{route('public.home')}}">Home</a></li>
            <li class="active">Create new account</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-3">
            <ul class="list-group margin-bottom-25 sidebar-menu">
              <li class="list-group-item clearfix"><a href="{{ route('login') }}"><i class="fa fa-angle-right"></i> Login</a></li>
              <li class="list-group-item clearfix active"><a href="{{ route('register') }}"><i class="fa fa-angle-right"></i> Register</a></li>
              <li class="list-group-item clearfix"><a href="{{ route('password.request') }}"><i class="fa fa-angle-right"></i> Reset Password</a></li>
            </ul>
          </div>
          <!-- END SIDEBAR -->

          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-9">
            <h1>Create an account</h1>
            <div class="content-form-page">
              <div class="row">
                <div class="col-md-7 col-sm-7">
                  <form class="form-horizontal" action="{{ route('register') }}" role="form" method="POST" >
                        {{ csrf_field() }}
                    <fieldset>
                      <legend>Your personal details</legend>
                      <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="username" class="col-lg-4 control-label">Username @if ($errors->has('username'))<span class="require">*</span>@endif</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}">
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                      <div class="form-group {{ $errors->has('firstname') ? ' has-error' : '' }}">
                        <label for="firstname" class="col-lg-4 control-label">First Name @if ($errors->has('firstname'))<span class="require">*</span>@endif</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="firstname" id="firstname" value="{{ old('firstname') }}">
                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                      <div class="form-group {{ $errors->has('lastname') ? ' has-error' : '' }}">
                        <label for="lastname" class="col-lg-4 control-label">Last Name @if ($errors->has('lastname'))<span class="require">*</span>@endif</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="lastname" id="lastname" value="{{ old('lastname') }}">
                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="firstname" class="col-lg-4 control-label">Gender @if ($errors->has('gender'))<span class="require">*</span>@endif</label>
                        <div class="col-lg-8">
                          <div class="row">
                            <div class="col-lg-4 checkbox">
                              <label for="male"><input type="radio" name="gender" id="male" value="Male">Male</label>
                            </div>
                            <div class="col-lg-4 checkbox">
                              <label for="female"><input type="radio"  name="gender" id="female" value="Female">Female</label>
                            </div>
                          </div>
                                @if ($errors->has('gender'))
                                   <span class="help-block">
                                     <strong>{{ $errors->first('gender') }}</strong>
                                   </span>
                                @endif
                        </div>
                      </div>
                      <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-lg-4 control-label">Email @if ($errors->has('email'))<span class="require">*</span>@endif</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
                              @if ($errors->has('email'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                        </div>
                      </div>
                      <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="phone" class="col-lg-4 control-label">Phone @if ($errors->has('phone'))<span class="require">*</span>@endif</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                              @if ($errors->has('phone'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('phone') }}</strong>
                                  </span>
                              @endif
                        </div>
                      </div>
                    </fieldset>

                    <fieldset>
                      <legend>Your password</legend>
                      <div class="form-group">
                        <label for="password" class="col-lg-4 control-label">Password @if ($errors->has('password'))<span class="require">*</span>@endif</label>
                        <div class="col-lg-8">
                          <input type="password" name="password" class="form-control" id="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif 
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="password-confirm" class="col-lg-4 control-label">Confirm password @if ($errors->has('password'))<span class="require">*</span>@endif</label>
                        <div class="col-lg-8">
                          <input type="password" class="form-control" name="password_confirmation" id="password-confirm">
                        </div>
                      </div>
                    </fieldset>

                    <fieldset>
                      <legend>Other Information</legend>
                      <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                        <label for="country" class="col-lg-4 control-label">Country @if ($errors->has('country'))<span class="require">*</span>@endif</label>
                        <div class="col-lg-8">
                          <select class="form-control" name="country" id="country" value="{{ old('country') }}">
                            @foreach($countries as $country)
                              <option value="{{$country->country_code}}" {{$country->country_code == 'PH' ? 'selected' : ''}}>{{$country->country_code}} - {{$country->country_name}}</option>
                            @endforeach
                          </select>
                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                      <div class="form-group {{ $errors->has('company') ? ' has-error' : '' }}">
                        <label for="company" class="col-lg-4 control-label">Company @if ($errors->has('company'))<span class="require">*</span>@endif</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="company" id="company" value="{{ old('company') }}">
                                @if ($errors->has('company'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company') }}</strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                    </fieldset>
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
                        <button type="submit" class="btn btn-primary">Create an account</button>
                        <button type="button" class="btn btn-default">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-4 col-sm-4 pull-right">
                  <div class="form-info">
                    <h2><em>Important</em> Information</h2>
                    <p>Create an account to request dataset.</p>

                    <button type="button" class="btn btn-default">More details</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js"></script>
@endsection
