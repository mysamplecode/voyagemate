<!DOCTYPE html>
<html class="js csstransforms csstransforms3d csstransitions" lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ $favicon }}">
    
    <title>{{ $title or Helpers::meta((!isset($exception)) ? Route::current()->uri() : '', 'title') }} {{ $additional_title or '' }} </title>
    
    <meta property="og:image" content="">
    <meta name="mobile-web-app-capable" content="yes">

    <link href="{{ url('public/front/css/css.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/front/css/glyphicon.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/front/css/awsome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/front/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/front/css/cs-select.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/front/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/front/css/styles.css') }}" rel="stylesheet" type="text/css" />
    <!-- <link href="{{ url('public/front/css/jquery-ui.css') }}" rel="stylesheet" type="text/css" /> -->

    <link href="{{ url('public/front/js/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css" />
 <!--    <link href="{{ url('public/front/js/datepicker/jquery-ui-timepicker-addon.css') }}" rel="stylesheet" type="text/css" /> -->
    <link href="{{ url('public/front/js/ninja/ninja-slider.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/front/css/bootstrap-slider.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/front/css/jquery.sidr.dark.css') }}" rel="stylesheet" type="text/css" />

  </head>
  <body>
