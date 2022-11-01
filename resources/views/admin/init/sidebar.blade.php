<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar menu-light ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div ">

            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="{{asset($user->urlImage)}}" alt="User-Profile-Image"
                         style="width: 50px; height: 50px;">
                    <div class="user-details">
                        <div id="more-details">{{$user->name}}&nbsp;{{$user->lastname}}<i class="fa fa-caret-down"></i>
                        </div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="{{route('profile')}}" data-toggle="tooltip"
                                                        title="Ver Perfil"><i class="feather icon-user"></i></a></li>
                        <li class="list-inline-item">
                            <a href="{{route('logout')}}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               data-toggle="tooltip" title="Cerrar Sesión" class="text-danger">
                                <i class="feather icon-power"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Menú</label>
                </li>

                <li class="nav-item ">
                    <a href="{{route('dashboard')}}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="fa fa-home"></i>
                        </span>
                        <span class="pcoded-mtext">Inicio</span>
                    </a>
                </li>

               <li class="nav-item pcoded-hasmenu">
                        <a href="javascript: void(0);" class="nav-link ">
                    <span class="pcoded-micon">
                        <i class="fa fa-boxes"></i>
                    </span>
                            <span class="pcoded-mtext">Productos</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{route('productsCategory')}}">Categoría de Productos</a></li>
                            <li><a href="{{route('products')}}">Productos</a></li>
                            <li><a href="{{route('comments')}}">Comentarios</a></li>
                        </ul>
                    </li>

                    <li class="nav-item ">
                        <a href="{{route('services')}}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="fa fa-user-cog"></i>
                        </span>
                            <span class="pcoded-mtext">Servicios</span>
                        </a>
                    </li>
                <li class="nav-item ">
                    <a href="{{route('banners')}}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="fa fa-ticket-alt"></i>
                        </span>
                        <span class="pcoded-mtext">Banners</span>
                    </a>
                </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="fa fa-file-alt"></i></span><span class="pcoded-mtext">Páginas</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{route('about-us')}}">Acerca de Nosotros</a></li>
                            <li><a href="{{route('mission-vision')}}">Misión y Visión</a></li>
                            <li><a href="{{route('information')}}">Información General</a></li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('gallery')}}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="fa fa-images"></i>
                        </span>
                            <span class="pcoded-mtext">Galería</span>
                        </a>
                    </li>
                <li class="nav-item ">
                    <a href="{{route('messages')}}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="fa fa-mail-bulk"></i>
                        </span>
                        <span class="pcoded-mtext">Mensajes</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->
