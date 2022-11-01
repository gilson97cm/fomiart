<!-- Favicon icon -->
<!-- <link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon"> -->
<link rel="stylesheet" href="{{asset('assets/css/plugins/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/plugins/select2.min.css')}}">
<!-- vendor css -->
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/plugins/jquery.minicolors.css')}}">

<!--lightbox css -->
<link rel="stylesheet" href="{{asset('assets/css/plugins/lightbox.min.css')}}">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">


<!-- fileupload-custom css -->
{{--<link rel="stylesheet" type="text/css" href="{{asset('plugins/dropzone/dist/dropzone.css')}}">--}}
@livewireStyles
@yield('styles')
