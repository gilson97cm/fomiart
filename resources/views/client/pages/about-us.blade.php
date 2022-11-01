@extends('client.layout')
@section('title','FomiArt - Acerca de Nostros')
@section('content')
    <!-- Breadcrumbs-->
    <div class="parallax-container section" data-parallax-img="{{asset('assets-client/images/bg-01-1920x718.jpg')}}">
        <div class="parallax-content section-34 section-md-66 text-lg-left context-dark bg-overlay-info">
            <div class="container">
                <div class="d-none d-md-block d-lg-inline-block">
                    <h1 class="font-weight-bold"><span class="big">Acerca de Nosotros</span></h1>
                </div>
                <div class="pull-lg-right offset-md-top-10 offset-lg-top-41">
                    <ul class="p list-inline list-inline-dashed">
                        <li class="list-inline-item text-safety-orange"><a href="{{route('home')}}">Inicio</a></li>
                        <li class="list-inline-item">Acerca de Nosotros</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @livewire('client.about-us')
    <!-- First Lesson - Free-->
    <div class="parallax-container section" data-parallax-img="{{asset('assets-client/images/bg-02-1920x748.jpg')}}">
        <div class="parallax-content section-66 context-dark">
            <div class="container">
                <h1 class="font-weight-bold">Comparte tus sugerencias</h1>
                <div class="row justify-content-sm-center offset-top-20">
                    <div class="col-sm-10 col-sm-8">
                        <div>
                            <p>Nuestro equipo estará encantado de saber de usted acerca de cualquier posible
                                mejoras en nuestros productos y servicios.</p>
                        </div>
                        <div class="offset-top-30"><a class="btn btn-icon btn-icon-left btn-default" href="{{route('contact')}}"><span class="novi-icon icon mdi-email-outline mdi"></span><span>Envíanos una carta</span></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
