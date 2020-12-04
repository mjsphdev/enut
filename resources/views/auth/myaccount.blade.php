@extends('layouts.main')

@section('content')

<div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{route('public.home')}}">Home</a></li>
            <li class="active">My Account</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-3">
            <ul class="list-group margin-bottom-25 sidebar-menu">
              <li class="list-group-item clearfix active"><a href="{{ route('home') }}"><i class="fa fa-angle-right"></i> My account</a></li>
            </ul>
          </div>
          <!-- END SIDEBAR -->

          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-9">
            <h1>My Account</h1>
            <div class="content-form-page">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
              <div class="row">
                <div class="col-md-7 col-sm-7">
                  <form class="form-horizontal" action="{{ route('update.account') }}" role="form" method="POST" >
                        {{ csrf_field() }}
                    <fieldset>
                      <input type="text" name="id" id="id" value="{{$user->id}}" hidden>
                      <legend>Your personal details</legend>
                      <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="username" class="col-lg-4 control-label">Username @if ($errors->has('username'))<span class="require">*</span>@endif</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="username" id="username" value="{{ $user->username or old('username') }}">
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
                          <input type="text" class="form-control" name="firstname" id="firstname" value="{{ $user->firstname or old('firstname') }}">
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
                          <input type="text" class="form-control" name="lastname" id="lastname" value="{{ $user->lastname or old('lastname') }}">
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
                              <label for="male"><input type="radio" name="gender" id="male" value="Male" {{$user->gender == 'Male' ? 'checked' : ''}}>Male</label>
                            </div>
                            <div class="col-lg-4 checkbox">
                              <label for="female"><input type="radio"  name="gender" id="female" value="Female" {{$user->gender == 'Female' ? 'checked' : ''}}>Female</label>
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
                          <input type="text" class="form-control" name="email" id="email" value="{{ $user->email or old('email') }}">
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
                          <input type="text" class="form-control" name="phone" id="phone" value="{{ $user->phone or old('phone') }}">
                              @if ($errors->has('phone'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('phone') }}</strong>
                                  </span>
                              @endif
                        </div>
                      </div>
                    </fieldset>

                    <fieldset>
                      <legend>Other Information</legend>
                      <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                        <label for="country" class="col-lg-4 control-label">Country @if ($errors->has('country'))<span class="require">*</span>@endif</label>
                        <div class="col-lg-8">
                          <select class="form-control" name="country" id="country" value="{{ $user->country or old('country') }}">
                            @foreach($countries as $country)
                              <option value="{{$country->country_code}}" {{$country->country_code == $user->country ? 'selected' : ''}}>{{$country->country_code}} - {{$country->country_name}}</option>
                            @endforeach
                          </select>
                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="company" class="col-lg-4 control-label">Affiliation</label>
                        <div class="col-lg-8">
                          <select class="form-control" name="affiliation" id="affiliation" value="{{ $user->affiliation or old('affiliation') }}">
                              <option value="">Choose...</option>
                              <option value="government" {{$user->affiliation == "government" ? 'selected' : ''}}>Government</option>
                              <option value="private" {{$user->affiliation == "private" ? 'selected' : ''}}>Private</option>
                              <option value="academe" {{$user->affiliation == "academe" ? 'selected' : ''}}>Academe</option>
                              <option value="ngo" {{$user->affiliation == "ngo" ? 'selected' : ''}}>NGO</option>
                              <option value="industry" {{$user->affiliation == "industry" ? 'selected' : ''}}>industry</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="company" class="col-lg-4 control-label">Office Address</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="address" id="address" value="{{ $user->office_address or old('address') }}">
                        </div>
                      </div>
                      <div class="form-group {{ $errors->has('company') ? ' has-error' : '' }}">
                        <label for="company" class="col-lg-4 control-label">Company @if ($errors->has('company'))<span class="require">*</span>@endif</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="company" id="company" value="{{ $user->company or old('company') }}">
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
                        <button type="submit" class="btn btn-primary">Update account</button>
                        <button type="button" class="btn btn-default">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-4 col-sm-4 pull-right">
                  <div class="form-info">
                    <h2><em>Important</em> Information</h2>
                    <p>You can view or update your account.</p>
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
