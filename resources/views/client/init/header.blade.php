<header class="section page-head">
    <div class="rd-navbar-wrap">
        <nav class="rd-navbar rd-navbar-top-panel novi-background rd-navbar-light" data-lg-stick-up-offset="79px"
            data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-static" data-lg-auto-height="true"
            data-md-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-stick-up="true">
            <div class="rd-navbar-inner">
                <div class="rd-navbar-top-panel">
                    <div class="container">
                        <div class="left-side">
                            <address class="contact-info text-left"><span class="p"><span
                                        class="novi-icon icon mdi mdi-phone text-primary text-middle"></span><a
                                        class="text-middle"
                                        href="tel:{{ $info->phone }}">{{ $info->phone }}</a></span><span
                                    class="p"><span
                                        class="novi-icon icon mdi mdi-map-marker-radius text-primary text-middle"></span><a
                                        class="text-middle"
                                        href="{{ route('contact') }}">{{ $info->address }}</a></span></address>
                        </div>

                        <div class="right-side offset-top-4 offset-xl-top-0 text-center">
                            <div class="contact-info text-left d-inline-block"><span class="p"><span
                                        class="novi-icon icon mdi mdi-clock text-primary text-middle"></span><span
                                        class="text-middle">Lun–Sáb: 7:00am–8:00pm</span></span></div>
                            <ul class="list-inline list-inline-xs d-inline-block inset-xl-left-80 text-middle">
                                <li class="list-inline-item" {{ $info->fb == '' ? 'hidden' : '' }}><a
                                        href="{{ $info->fb }}" target="_blank"><span
                                            class="novi-icon icon icon-xxs fa-facebook"></span></a></li>
                                <li class="list-inline-item" {{ $info->tw == '' ? 'hidden' : '' }}><a
                                        href="{{ $info->tw }}" target="_blank"><span
                                            class="novi-icon icon icon-xxs fa-twitter"></span></a></li>
                                <li class="list-inline-item" {{ $info->ig == '' ? 'hidden' : '' }}><a
                                        href="{{ $info->ig }}" target="_blank"><span
                                            class="novi-icon icon icon-xxs fa-instagram"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container section-relative d-flex justify-content-between">
                    <div class="rd-navbar-panel">
                        <button class="rd-navbar-toggle"
                            data-rd-navbar-toggle=".rd-navbar, .rd-navbar-nav-wrap"><span></span></button>
                        <button class="rd-navbar-top-panel-toggle"
                            data-rd-navbar-toggle=".rd-navbar, .rd-navbar-top-panel"><span></span></button>
                        <div class="rd-navbar-brand"><a class="d-none d-xl-block" href="{{ route('home') }}">
                                <img width='135' height='55' src='{{ asset($info->urlLogo) }}'
                                    alt='' /></a>
                            <a class="d-inline-block d-xl-none" href="{{ route('home') }}">
                                <img width='215' height='33' src='{{ asset($info->urlLogo) }}'
                                    alt='' /></a>
                        </div>
                    </div>
                    <div class="rd-navbar-menu-wrap">
                        <div class="rd-navbar-nav-wrap">
                            <div class="rd-navbar-mobile-scroll">
                                <ul class="rd-navbar-nav">
                                    <li class="{{ request()->is('/') ? 'active' : '' }}"><a
                                            href="{{ route('home') }}"><span>Inicio</span></a>
                                    </li>
                                    <li class="{{ request()->is('products') ? 'active' : '' }}"><a
                                            href="{{ route('productsHome') }}"><span>Productos</span></a>
                                    </li>
                                    <li class="{{ request()->is('services') ? 'active' : '' }}"><a
                                            href="{{ route('servicesHome') }}"><span>Servicios</span></a>
                                    </li>
                                    <li class="{{ request()->is('about-us') ? 'active' : '' }}"><a
                                            href="{{ route('aboutUsHome') }}"><span>Acerca de Nosotros</span></a>
                                    </li>
                                    <li class="{{ request()->is('gallery') ? 'active' : '' }}"><a
                                            href="{{ route('galleryHome') }}"><span>Galería</span></a>
                                    </li>
                                    <li class="{{ request()->is('contact-us') ? 'active' : '' }}"><a
                                            href="{{ route('contact') }}"><span>Contactos</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
