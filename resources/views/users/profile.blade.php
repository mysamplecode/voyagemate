@extends('template')

@section('main')
  <div class="container margin-top30">
    <div class="col-md-3">
      <div class="panel panel-default">
          <div class="panel-footer">
            <div class="panel">
              @include('common.sidenav')
            </div>
          </div>
      </div>
    </div>
    
    <form id='profile_update' method='post' action="{{url('users/profile')}}">
      <div class="col-md-9">
        <div class="panel panel-default">
          <div class="panel-body h5">
           {{trans('messages.users_profile.user_profile')}} 
          </div>
          <div class="panel-footer">
            <div class="panel">
              <div class="panel-body">
                <div class="row">
                  <label class="text-right col-sm-3" for="user_first_name">
                    {{trans('messages.users_profile.first_name')}}
                  </label>
                  <div class="col-sm-9">
                    <input class='form-control' type='text' name='first_name' value="{{Auth::guard('users')->user()->first_name}}" id='first_name' size='30' required>
                    @if ($errors->has('first_name')) <p class="error-tag">{{ $errors->first('first_name') }}</p> @endif
                  </div>
                </div>

                <div class="row row-condensed space-4">
                  <label class="text-right col-sm-3" for="user_last_name">
                   {{trans('messages.users_profile.last_name')}} 
                  </label>
                  <div class="col-sm-9">
                    <input class='form-control' type='text' name='last_name' value="{{Auth::guard('users')->user()->last_name}}" id='last_name' size='30' required>
                    @if ($errors->has('last_name')) <p class="error-tag">{{ $errors->first('last_name') }}</p> @endif
                  </div>
                </div>

                <div class="row row-condensed space-4">
                  <label class="text-right col-sm-3" for="user_gender">
                    {{trans('messages.users_profile.i_am')}} <i class="icon icon-lock icon-ebisu" data-behavior="tooltip" aria-label="Private"></i>
                  </label>
                  <div class="col-sm-9">
                    <div class="select">
                      <select class='form-control' name='details[gender]'>
                        <option value=''>{{trans('messages.users_profile.gender')}}</option>
                        <option value='Male' {{@$details['gender'] == 'Male'?'selected':''}}>{{trans('messages.users_profile.male')}}</option>
                        <option value='Female' {{@$details['gender'] == 'Female'?'selected':''}}>{{trans('messages.users_profile.female')}}</option>
                        <option value='Other' {{@$details['gender'] == 'Other'?'selected':''}}>{{trans('messages.users_profile.other')}}</option>
                      </select>
                    </div>
                    @if ($errors->has('gender')) <p class="error-tag">{{ $errors->first('gender') }}</p> @endif
                  </div>
                </div>

                <div class="row row-condensed space-4">
                  <label class="text-right col-sm-3" for="user_birthdate">
                    {{trans('messages.users_profile.birth_date')}} <i class="icon icon-lock icon-ebisu" data-behavior="tooltip" aria-label="Private"></i>
                  </label>
                  <div class="col-sm-9">
                    <div class="row">
                      <div class="select col-sm-4">
                        <select name='birthday_month' class='form-control' id='user_birthday_month'>
                          <option value=''>{{trans('messages.sign_up.month')}}</option>
                          @for($m=1; $m<=12; ++$m)
                            <option value="{{$m}}" {{$m == @$date_of_birth[1]? 'selected':''}}>{{date('F', mktime(0, 0, 0, $m, 1))}}</option>
                          @endfor
                        </select>
                      </div>
                      <div class="select col-sm-4">
                        <select name='birthday_day' class='form-control' id='user_birthday_day'>
                          <option value=''>{{trans('messages.sign_up.day')}}</option>
                          @for($m=1; $m<=31; ++$m)
                            <option value="{{$m}}" {{$m == @$date_of_birth[2]? 'selected':''}}>{{$m}}</option>
                          @endfor
                        </select>
                      </div>
                      <div class="select col-sm-4">
                        <select name='birthday_year' class='form-control' id='user_birthday_year'>
                          <option value=''>{{trans('messages.sign_up.year')}}</option>
                          @for($m=date('Y'); $m > date('Y')-100; $m--)
                            <option value="{{$m}}" {{$m == @$date_of_birth[0]? 'selected':''}}>{{$m}}</option>
                          @endfor
                        </select>
                      </div>
                    </div>
                    @if ($errors->has('birthday_month') || $errors->has('birthday_day') || $errors->has('birthday_year')) <p class="error-tag">{{ $errors->has('birthday_month') ? $errors->first('birthday_month') : ($errors->has('birthday_day')) ? $errors->first('birthday_day') : ($errors->has('birthday_year')) ? $errors->first('birthday_year') : '' }}</p> @endif
                  </div>
                </div>

                <div class="row row-condensed space-4">
                  <label class="text-right col-sm-3" for="user_email">
                    {{trans('messages.users_profile.email_address')}} <i class="icon icon-lock" data-behavior="tooltip" aria-label="Private"></i>
                  </label>
                  <div class="col-sm-9">
                    <input class='form-control' type='text' name='email' value="{{Auth::user()->email}}" id='email' size='30' required>
                    @if ($errors->has('email')) <p class="error-tag">{{ $errors->first('email') }}</p> @endif
                  </div>
                </div>

                <div class="row row-condensed">
                  <label class="text-right col-sm-3" for="user_live">
                   {{trans('messages.users_profile.where_live')}} 
                  </label>
                  <div class="col-sm-9">
                    <input class='form-control' type='text' name='details[live]' value="{{@$details['live']}}" id='live' size='30' placeholder='e.g. Paris, FR / Brooklyn, NY / Chicago, IL'>
                  </div>
                </div>

                <div class="row row-condensed">
                  <label class="text-right col-sm-3" for="">
                    {{trans('messages.users_profile.describe')}}
                  </label>
                  <div class="col-sm-9">
                    <textarea name='details[about]' class='form-control' id='user_about' cols='40' rows='5'>{{@$details['about']}}</textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>  
        <!--<div class="panel panel-default">
          <div class="panel-body h5">
            Optional
          </div>
          <div class="panel-footer">
            <div class="panel-body">
              <div class="row row-condensed space-4">
                <label class="text-right col-sm-3" for="user_profile_info_university">
                  School
                </label>
                <div class="col-sm-9">
                  <input class='form-control' type='text' name='details[school]' value="{{@$details['school']}}" id='school' size='30' placeholder=''>
                </div>
              </div>
              <div class="row row-condensed space-4">
                <label class="text-right col-sm-3" for="user_profile_info_employer">
                  Work 
                </label>
                <div class="col-sm-9">
                  <input class='form-control' type='text' name='details[work]' value="{{@$details['work']}}" id='school' size='30' placeholder='e.g. Airbnb / Apple / Taco Stand'>
                </div>
              </div>
              <div class="row row-condensed space-4">
                <label class="text-right col-sm-3" for="user_time_zone">
                  Time Zone
                </label>
                <div class="col-sm-9">
                  <div class="select">
                    <select name='details[timezone]' class='form-control' id='timezone'>
                      @foreach($timezone as $key => $value)
                        <option value="{{$key}}"{{@$details['timezone'] == $key?'selected':''}}>{{$value}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="text-muted row-space-top-1">Your home time zone.</div>
                </div>
              </div>
            </div>
          </div>
        </div>-->
        <div class="panel panel-default">
          <button type="submit" class="btn ex-btn btn-large">
            {{trans('messages.users_profile.save')}}
          </button>
        </div>
      </div>
    </form>
    
  </div>
@stop