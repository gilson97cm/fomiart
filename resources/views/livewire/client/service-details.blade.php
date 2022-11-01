<div>
    @section('styles')
        <style>
            .rating {
                display: flex;
                flex-direction: row-reverse;
                justify-content: left;
            }

            .rating > input{ display:none;}

            .rating > label {
                position: relative;
                width: 1em;
                font-size: 2vw;
                color: #FE6400;
                cursor: pointer;
            }
            .rating > label::before{
                content: "\2605";
                position: absolute;
                opacity: 0;
            }
            .rating > label:hover:before,
            .rating > label:hover ~ label:before {
                opacity: 1 !important;
            }

            .rating > input:checked ~ label:before{
                opacity:1;
            }

            .rating:hover > input:checked ~ label:before{ opacity: 0.4; }

            @media only screen and (max-width: 600px) {
                .rating > label {
                    position: relative;
                    width: 1em;
                    font-size: 5vw;
                    color: #FE6400;
                    cursor: pointer;
                }
            }
            .fa-star{
                color: #FE6400;
            }
            .fa-star-o{
                color: #FE6400;
            }

        </style>
    @endsection
<!-- Breadcrumbs-->
    <div wire:ignore class="parallax-container section" data-parallax-img="{{asset('assets-client/images/bg-01-1920x718.jpg')}}">
        <div class="parallax-content section-34 section-md-66 text-lg-left context-dark bg-overlay-info">
            <div class="container section-34 section-md-66 text-lg-left">
                <div class="d-none d-md-block d-lg-inline-block">
                    <h1 class="font-weight-bold"><span class="big">{{$service->name}}</span></h1>
                </div>
                <div class="pull-lg-right offset-md-top-10 offset-lg-top-41">
                    <ul class="p list-inline list-inline-dashed">
                        <li class="list-inline-item text-safety-orange"><a href="{{route('home')}}">Inicio</a></li>
                        <li class="list-inline-item text-safety-orange"><a href="{{route('productsHome')}}">Servicios</a></li>
                        <li class="list-inline-item">{{$service->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Welcome to Intense-->
    <section class="section novi-background section-lg-bottom-0 section-66 mb-5">
        <div class="container">
            <div class="row justify-content-sm-center align-items-lg-center">
                <div class="col-sm-10 col-lg-6 text-lg-left">
                    <h1 class="font-weight-bold text-primary">{{$service->name}}</h1>
                    <div class="offset-top-30 offset-lg-top-50">
                        <p class="text-justify">{{$service->longDescription}}</p>
                    </div>
                </div>
                <div class="col-sm-10 col-lg-6">
                    <img class="img-fluid d-none d-lg-inline-block offset-top-10"
                         src="{{asset($service->urlImage)}}" width="573" height="517" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- First Lesson - Free-->
    <div class="parallax-container section" data-parallax-img="{{asset('assets-client/images/bg-02-1920x748.jpg')}}">
        <div class="parallax-content section-66 context-dark">
            <div class="container">
                <h1 class="font-weight-bold">¿Tengo una pregunta?</h1>
                <div class="row justify-content-sm-center offset-top-20">
                    <div class="col-sm-10 col-sm-8">
                        <div>
                            <p>Si desea hablar sobre los detalles de un determinado producto, escríbenos y con gusto responderemos todas tus preguntas.</p>
                        </div>
                        <div class="offset-top-30"><a class="btn btn-icon btn-icon-left btn-default" href="{{route('contact')}}"><span class="novi-icon icon mdi-email-outline mdi"></span><span>Envíanos una carta</span></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
        </script>
    @endsection
</div>
