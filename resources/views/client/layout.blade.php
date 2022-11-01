<!DOCTYPE html>
<html class="wow-animation" lang="es">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="keywords" content="FomiArt">
    <!-- <link rel="icon" href="{{asset('assets-client/images/favicon.ico')}}" type="image/x-icon"> -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css">
{{--    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=PT+Sans:400,700%7CAmatic+SC:400,700">--}}
<link rel="stylesheet" href="{{asset('assets-client/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets-client/css/style.css')}}">
    <style>
        .floating{
            position:fixed;
            width:55px;
            height:55px;
            bottom:100px;
            right:40px;
            background-color:#25d366;
            color:#FFF;
            border-radius:50px;
            text-align:center;
            font-size:30px;
            box-shadow: 2px 2px 3px #999;
            z-index:100;
            line-height: 55px;
        }
        .floating:hover{
            background-color: #188C44;
            color:#FFF;
        }

        .float-button{
            margin-top:16px;
        }
    </style>
    @livewireStyles
    @yield('styles')
</head>
<body>
<style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
<div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="{{asset('assets-client/images/ie8-panel/warning_bar_0000_us.jpg')}}" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
<div class="page text-center">
    @include('client/init/header')
    @yield('content')
    @if($info->wtp != '')
    <a href="https://api.whatsapp.com/send?phone={{$info->wtp}}&text=%21%20." class="floating" target="_blank">
        <i class="fa fa-whatsapp float-button"></i>
    </a>
    @endif
    <!-- Page Footer-->
   @include('client/init/footer')
</div>
<!-- Global Mailform Output-->
<div class="snackbars" id="form-output-global"></div>
<!-- Java script -->
<script src="{{asset('assets-client/js/core.min.js')}}"></script>
<script src="{{asset('assets-client/js/script.js')}}"></script>
<script src="{{asset('assets-client/js/select2.full.min.js')}}"></script>
@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<x-livewire-alert::scripts/>
@yield('scripts')
</body>
</html>
