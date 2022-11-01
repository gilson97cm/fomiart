<!DOCTYPE html>
<html lang="es">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content=""/>
    <meta name="keywords" content="">
    <meta name="author" content="CodeMort"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.init.styles')
</head>
<body class="">
@include('admin.init.loader')
@include('admin.init.sidebar')
@include('admin.init.header')

@yield('content')

@include('admin.init.scripts')
</body>
</html>
