@extends('template')

@section('main')
  <div class="container margin-top30">
    <div class="col-md-4 col-center">
      <div class="panel panel-default">
        <div class="panel">
          <div class="panel-body">
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
            
            <div class="col-md-12 cls-or" style="margin-top:10px;">
              <label>{{trans('messages.login.or')}}</label>
            </div>
              <form method="post" action="{{url('authenticate')}}" class='signup-form login-form' accept-charset='UTF-8'>  
                <div class="col-sm-12">
                  @if ($errors->has('email')) <p class="error-tag">{{ $errors->first('email') }}</p> @endif
                  <input type="text" class="form-control" name="email" placeholder = "{{trans('messages.login.email')}}">
                </div>
                <div class="col-sm-12">
                  @if ($errors->has('password')) <p class="error-tag">{{ $errors->first('password') }}</p> @endif
                  <input type="password" class="form-control" name="password" placeholder = "{{trans('messages.login.password')}}">
                </div>
                <div class="col-sm-12">
                  <div class="col-sm-6 txt-left l-pad-none">
                    <input type="checkbox" class='remember_me' id="remember_me2" name="remember_me" value="1">
                     {{trans('messages.login.remember_me')}}
                  </div>
                  <div class="col-sm-6 txt-right r-pad-none">
                    <a href="{{URL::to('/')}}/forgot_password" class="forgot-password pull-right">{{trans('messages.login.forgot_pwd')}}</a>
                  </div>
                </div>
              <div class="col-sm-12 mrg-top-25">
                <input type="submit" class="btn ex-btn btn-block btn-large" value="{{trans('messages.login.login')}}" id='user-login-btn'>
              </div>
            </form>
              <div class="col-sm-12 mrg-top-25">
               {{trans('messages.login.do_not_have_an_account')}} 
                <a href="{{URL::to('/')}}/signup" class="link-to-signup-in-login">
                  {{trans('messages.sign_up.sign_up')}}
                </a>
              </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
@stop