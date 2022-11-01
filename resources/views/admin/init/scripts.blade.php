<!-- Required Js -->
<script src="{{asset('assets/js/vendor-all.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/ripple.js')}}"></script>
<script src="{{asset('assets/js/pcoded.min.js')}}"></script>
<script src="{{asset('assets/js/menu-setting.js')}}"></script>

<!-- select2 Js -->
<script src="{{asset('assets/js/plugins/select2.full.min.js')}}"></script>
<!-- custom-chart js -->
{{--<script src="{{asset('assets/js/plugins/apexcharts.min.js')}}" type="text/javascript"></script>--}}
<script src="{{asset('assets/js/pages/dashboard-main.js')}}"></script>

<!-- datatable Js -->
<script src="{{asset('assets/js/plugins/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset('assets/js/pages/data-styling-custom.js')}}" type="text/javascript"></script>}
<script src="{{asset('assets/js/plugins/jquery.minicolors.min.js')}}"></script>

<!-- ekko-lightbox Js -->
<script src="{{asset('assets/js/plugins/lightbox.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
<!-- file-upload Js -->
{{--<script src="{{asset('plugins/dropzone/dist/dropzone.js')}}"></script>--}}
<!-- notification Js -->
<script src="{{asset('assets/js/plugins/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/ckeditor.js')}}"></script>



@yield('ck')


@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<x-livewire-alert::scripts/>
@yield('scripts')

<script>
    window.livewire.on('store', () => {
        $('#productModal').modal('hide');
        $('#serviceModal').modal('hide');
        $('#commentModal').modal('hide');
        $('#messageModal').modal('hide');
    });
</script>
