@extends('template')

@section('main')
  <div class="container margin-top30">
    <div class="col-md-4 col-center">
      <div class="panel panel-default">
        <div class="panel">
          <div class="panel-body">
            <div class="row col-center">
              
            <a href="{{ @$facebook_url }}" class="btn btn-facebook">
              <div class="responsive-content"><i class="fa fa-facebook pad-r-3"></i>{{trans('messages.sign_up.sign_up_with_facebook')}}</div>
            </a>
            <!--<div class="clearfix"></div>-->
            <a href="{{URL::to('googleLogin')}}" class="btn btn-google">
              <div class="responsive-content">
                <i class="fa fa-google-plus pad-r-4"></i>
                {{trans('messages.sign_up.sign_up_with_google')}}
              </div>
            </a>
             
              <div class="col-md-12 cls-or">
                <label>{{trans('messages.login.or')}}</label>
              </div>
            </div>
            
            <form method="post" action="{{url('create')}}" class='signup-form login-form' accept-charset='UTF-8'>    
              <div class="row">
                <input type="hidden" name='email_signup' id='form'>
                <div class="col-sm-12">
                  @if ($errors->has('first_name')) <p class="error-tag">{{ $errors->first('first_name') }}</p> @endif
                  <input type="text" class='form-control' name='first_name' id='first_name' placeholder='{{trans('messages.sign_up.first_name')}}'>
                </div>
                <div class="col-sm-12">
                  @if ($errors->has('last_name')) <p class="error-tag">{{ $errors->first('last_name') }}</p> @endif
                  <input type="text" class='form-control' name='last_name' id='last_name' placeholder='{{trans('messages.sign_up.last_name')}}'>
                </div>
                <div class="col-sm-12">
                  @if ($errors->has('email')) <p class="error-tag">{{ $errors->first('email') }}</p> @endif
                  <input type="text" class='form-control' name='email' id='email' placeholder='{{trans('messages.login.email')}}'>
                </div>
                <div class="col-sm-12">
                  @if ($errors->has('password')) <p class="error-tag">{{ $errors->first('password') }}</p> @endif
                  <input type="password" class='form-control' name='password' id='password' placeholder='{{trans('messages.login.password')}}'>
                </div>
                <div class="col-sm-12">
                  <label class="l-pad-none">{{trans('messages.sign_up.birth_day')}}</label>
                </div>
                <div class="col-sm-12">
                  @if ($errors->has('birthday_month') || $errors->has('birthday_day') || $errors->has('birthday_year')) <p class="error-tag">{{ $errors->has('birthday_month') ? $errors->first('birthday_month') : ($errors->has('birthday_day')) ? $errors->first('birthday_day') : ($errors->has('birthday_year')) ? $errors->first('birthday_year') : '' }}</p> @endif
                </div>
                <div class="col-sm-12">
                  <div class="col-sm-4 l-pad-none r-pad-none">
                    <select name='birthday_month' class='form-control' id='user_birthday_month'>
                      <option value=''>{{trans('messages.sign_up.month')}}</option>
                      @for($m=1; $m<=12; ++$m)
                        <option value="{{$m}}">{{date('F', mktime(0, 0, 0, $m, 1))}}</option>
                      @endfor
                    </select>
                  </div>
                  <div class="col-sm-4 l-pad-none r-pad-none">
                    <select name='birthday_day' class='form-control' id='user_birthday_day'>
                      <option value=''>{{trans('messages.sign_up.day')}}</option>
                      @for($m=1; $m<=31; ++$m)
                        <option value="{{$m}}">{{$m}}</option>
                      @endfor
                    </select>
                  </div>
                  <div class="col-sm-4 l-pad-none r-pad-none">
                    <select name='birthday_year' class='form-control' id='user_birthday_year'>
                      <option value=''>{{trans('messages.sign_up.year')}}</option>
                      @for($m=date('Y'); $m > date('Y')-100; $m--)
                        <option value="{{$m}}">{{$m}}</option>
                      @endfor
                    </select>
                  </div>
                </div>
                
                <div class="col-sm-12 pad-t-5">
                  <input type='submit' value='{{trans('messages.sign_up.sign_up')}}' class='btn ex-btn btn-block btn-large'>
                </div>
              </div>
            </form>

            <div class="col-sm-12 mrg-top-25">
              {{trans('messages.sign_up.already')}} {{ $site_name }} {{trans('messages.sign_up.member')}}?
              <a href="{{URL::to('/')}}/login?" class="modal-link link-to-login-in-signup" data-modal-href="/login_modal?" data-modal-type="login">
                {{trans('messages.sign_up.login')}}
            </div>  
          </div>
        </div>
      </div>
    </div>
  </div>
@stop