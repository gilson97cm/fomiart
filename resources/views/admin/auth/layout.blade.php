<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from ableproadmin.com/bootstrap/default/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Oct 2020 08:08:57 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>

    <title>@yield('title')</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="CodeMort" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <style>
        .bg{
            {{--background-image: url({{asset('assets/images/walll.jpg')}});--}}
            /*margin-top: -100px;*/
            /*background-color: rgba(255,255,255,0.1);*/
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }

        .btn-primary {
            color: #fff;
            background-color: #FF7550;
            border-color: #FF7550;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #FF5B3B;
            border-color: #FF5B3B;
        }

        .btn-primary:focus, .btn-primary.focus {
            color: #fff;
            background-color: #FF5B3B;
            border-color: #FF5B3B;
            box-shadow: 0 0 0 0rem rgba(171, 79, 53, 0.5);
        }

        .card-bg{
            background: rgba(255,255,255,0.7);
        }
        .btn-primary{
            background: #FF6E40;
            border-color: #FF6E40;
        }
        .btn-primary:hover{
            background: rgba(255, 110, 64,0.9);
            border-color: rgba(255, 110, 64,0.9);
        }
    </style>

    @livewireStyles


</head>
<body>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper bg">
    <div class="auth-content">
        @yield('content')
    </div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="{{asset('assets/js/vendor-all.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/ripple.js')}}"></script>
<script src="{{asset('assets/js/pcoded.min.js')}}"></script>

@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<x-livewire-alert::scripts/>


</body>


<!-- Mirrored from ableproadmin.com/bootstrap/default/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Oct 2020 08:08:58 GMT -->
</html>
