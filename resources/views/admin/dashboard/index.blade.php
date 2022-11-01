@extends('admin.layout')
@section('title','Dashboard')
@section('content')
    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-page-header title="Dashboard" position="Dashboard"></x-page-header>
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- customar project  start -->

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center m-l-0">
                                <div class="col-auto">
                                    <i class="fas fa-boxes f-36 text-c-yellow"></i>
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-muted m-b-10">Productos</h6>
                                    <h2 class="m-b-0">{{\App\Models\Product::count()}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center m-l-0">
                                <div class="col-auto">
                                    <i class="fas fa-user-cog f-36 text-c-green"></i>
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-muted m-b-10">Servicios</h6>
                                    <h2 class="m-b-0">{{\App\Models\Service::count()}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center m-l-0">
                                <div class="col-auto">
                                    <i class="fas fa-ticket-alt f-36 text-c-blue"></i>
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-muted m-b-10">Banners</h6>
                                    <h2 class="m-b-0">{{\App\Models\Banner::count()}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center m-l-0">
                                <div class="col-auto">
                                    <i class="fas fa-comments f-36 text-c-red"></i>
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-muted m-b-10">Comentarios de Prod.</h6>
                                    <h2 class="m-b-0">{{\App\Models\Comment::count()}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center m-l-0">
                                <div class="col-auto">
                                    <i class="fas fa-mail-bulk f-36 text-c-purple"></i>
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-muted m-b-10">Mensajes de Contacto</h6>
                                    <h2 class="m-b-0">{{\App\Models\Message::count()}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- subscribe start -->


            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- Button trigger modal -->
@endsection
@section('scripts')
    <script>
        $('div.alert').not('.alert-important').delay(2000).fadeOut(4000);
    </script>
@endsection
