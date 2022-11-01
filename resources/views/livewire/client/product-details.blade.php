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

            #profileImage {
                width: 50px;
                height: 50px;
                border-radius: 50%;
                font-size: 25px;
                color: #fff;
                text-align: center;
                line-height: 50px;
                font-family: "Amatic SC", cursive;
            }

        </style>
    @endsection
    <!-- Breadcrumbs-->
    <div wire:ignore class="parallax-container section" data-parallax-img="{{asset('assets-client/images/bg-01-1920x718.jpg')}}">
        <div class="parallax-content section-34 section-md-66 text-lg-left context-dark bg-overlay-info">
            <div class="container section-34 section-md-66 text-lg-left">
                <div class="d-none d-md-block d-lg-inline-block">
                    <h1 class="font-weight-bold"><span class="big">{{$product->name}}</span></h1>
                </div>
                <div class="pull-lg-right offset-md-top-10 offset-lg-top-41">
                    <ul class="p list-inline list-inline-dashed">
                        <li class="list-inline-item text-safety-orange"><a href="{{route('home')}}">Inicio</a></li>
                        <li class="list-inline-item text-safety-orange"><a href="{{route('productsHome')}}">Productos</a></li>
                        <li class="list-inline-item">{{$product->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Welcome to Intense-->
    <section class="section novi-background section-lg-bottom-0 section-66">
        <div class="container">
            <div class="row justify-content-sm-center align-items-lg-center">
                <div class="col-sm-10 col-lg-6 text-lg-left">
                    <h1 class="font-weight-bold text-primary">{{$product->name}} - ${{$product->price}}</h1>
                    <div class="offset-top-30 offset-lg-top-50">
                        <p class="text-justify">{{$product->longDescription}}</p>
                    </div>
                    <hr>
                    <h5 class="font-weight-normal text-primary"><span class="text-safety-orange">Código:</span> {{$product->code}}</h5>
                    <div class="offset-top-10 offset-lg-top-10">
                        <p class="text-justify text-muted">Código del producto, utilícelo para preguntar por este producto.</p>
                    </div>

                </div>
                <div class="col-sm-10 col-lg-6">
                    <img class="img-fluid d-none d-lg-inline-block offset-top-10"
                         src="{{asset($product->urlImage)}}" width="573" height="517" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Choose your Plan-->
    <section class="section novi-background section-98 section-md-110">
        <div class="container">
            <h1 class="font-weight-bold text-primary">Comentarios</h1>
            <svg height="13" viewbox="0 0 71 13" width="71" xmlns="http://www.w3.org/2000/svg" version="1.1">
                <path class="bg-primary" d="M 65.591797,0.39453125 C 64.632414,0.55512546 63.656631,1.037019 62.839844,1.9121094 l 2.009765,1.875 c 0.987119,-1.0575807 1.464926,-0.9055776 2.074219,-0.5703125 0.609293,0.335265 1.125342,1.2616345 1.144531,1.6152343 C 68.111503,5.6270437 67.786283,6.2015228 66.951172,6.875 66.116061,7.5484772 64.791442,8.161997 63.316406,8.6230469 60.366335,9.5451467 56.822431,9.9000923 55.357422,9.9453125 49.487597,10.126495 41.515727,8.2106051 34.380859,5.9648438 30.873861,4.8609863 26.209294,2.9728751 21.335938,1.7480469 16.462581,0.52321864 11.317182,-0.07967759 6.7734375,1.6503906 l -0.025391,0.00977 -0.025391,0.00977 C 4.3944177,2.6636873 2.6199428,4.0438286 1.515625,5.5957031 0.41130724,7.1475776 -0.0588551,9.0257429 0.7265625,10.642578 c 0.735964,1.515031 2.2978692,2.250647 3.6972656,2.234375 1.3993964,-0.01627 2.7415813,-0.606444 3.6738281,-1.679687 L 6.0214844,9.3945312 C 5.6678168,9.8016889 4.967102,10.122226 4.3925781,10.128906 3.8180543,10.135587 3.4724885,10.00395 3.1992188,9.4414062 2.9754025,8.9806654 3.024638,8.2170231 3.7558594,7.1894531 4.4839472,6.1662866 5.8567444,5.037042 7.78125,4.2109375 c 3.674744,-1.3881932 8.271853,-0.9562457 12.884766,0.203125 4.624565,1.1622992 9.200779,3.012418 12.890625,4.1738281 7.258822,2.2847774 15.360414,4.3068544 21.884765,4.1054684 1.739141,-0.05368 5.355814,-0.40149 8.695313,-1.445312 1.669749,-0.521911 3.270286,-1.207639 4.541015,-2.232422 C 69.948464,7.990842 70.909328,6.4678364 70.8125,4.6835938 70.724917,3.0697107 69.754257,1.63739 68.248047,0.80859375 67.494942,0.39419565 66.55118,0.23393704 65.591797,0.39453125 Z"></path>
            </svg>
        </div>
        <div class="container-fluid offset-top-66">
            <div class="row justify-content-sm-center offset-top-66">
                <?php $count = 0; ?>
                @foreach($product->comments->where('status',1) as $data)
                    <div class="col-sm-10 col-md-9 col-lg-9 {{$count > 0 ? 'col-lg-9 offset-top-10' : ''}}">
                        <!-- Boxed Testimonials-->
                        <blockquote class="quote quote-classic quote-classic-boxed">
                            <div class="quote-body bg-white text-darker p-4">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <div id="profileImage" class="rounded-circle quote-img" style="background: {{$data->bgProfile}}"> {{$data->profile}} </div>
                                        <div>
                                            <h6 class="quote-author text-capitalize font-weight-bold font-default">
                                                <cite class="text-normal">{{$data->name}} {{$data->lastname}}</cite>
                                            </h6>
                                            <p class="quote-desc">
                                                {{$data->email}}
                                                <br>
                                                <span><i class="fa {{$data->rating >= 1 ?'fa-star': 'fa-star-o'}}"></i></span>
                                                <span><i class="fa {{$data->rating >= 2 ?'fa-star': 'fa-star-o'}}"></i></span>
                                                <span><i class="fa {{$data->rating >= 3 ?'fa-star': 'fa-star-o'}}"></i></span>
                                                <span><i class="fa {{$data->rating >= 4 ?'fa-star': 'fa-star-o'}}"></i></span>
                                                <span><i class="fa {{$data->rating >= 5 ?'fa-star': 'fa-star-o'}}"></i></span>
                                            </p>

                                        </div>
                                    </div>
                                <p><q>{{$data->message}}</q></p>
                            </div>
                        </blockquote>
                    </div>
                @endforeach

                <div class="col-sm-10 col-md-9 col-lg-9 offset-top-10">
                    <div class="card">
                        <div class="card-body shadow text-left">
                            <div class="row">
                                <div class="col-xl-6">

                                    <div class="form-group">
                                        <label wire:ignore class="form-label form-label-outside" for="contact-us-name">Nombre*:</label>
                                        <input class="form-control" id="contact-us-name"
                                               type="text" name="nameComment" wire:model="nameComment">
                                        @error('nameComment')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">

                                    <div class="form-group">
                                        <label wire:ignore class="form-label form-label-outside" for="contact-us-name">Apellido*:</label>
                                        <input class="form-control" id="contact-us-name"
                                               type="text" name="lastnameComment" wire:model="lastnameComment">
                                        @error('lastnameComment')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-xl-6 offset-top-20 offset-xl-top-20">
                                    <div class="form-group">
                                        <label wire:ignore class="form-label form-label-outside" for="contact-us-email">Correo*:</label>
                                        <input class="form-control" id="contact-us-email" type="email"
                                               name="emailComment" wire:model="emailComment">
                                        @error('emailComment')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-xl-6 offset-top-20 offset-xl-top-20">
                                    <div class="form-group">
                                        <label wire:ignore for="rating">Calificación:</label>
                                        <div class="rating" id="rating">
                                            <input type="radio" wire:model="rating" name="rating" value="5" id="5"><label for="5">☆</label>
                                            <input type="radio" wire:model="rating" name="rating" value="4" id="4"><label for="4">☆</label>
                                            <input type="radio" wire:model="rating" name="rating" value="3" id="3"><label for="3">☆</label>
                                            <input type="radio" wire:model="rating" name="rating" value="2" id="2"><label for="2">☆</label>
                                            <input type="radio" wire:model="rating" name="rating" value="1" id="1"><label for="1">☆</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xl-12 offset-top-0">
                                    <div class="form-group">
                                        <label wire:ignore class="form-label form-label-outside" for="contact-us-message">Comentario*:</label>
                                        <textarea class="form-control" id="contact-us-message"
                                                  wire:model="messageComment" name="messageComment"></textarea>
                                        @error('messageComment')<span class="text-danger">{{ $message }}</span>@enderror

                                    </div>
                                </div>
                            </div>
                            <div class="group-sm text-center text-xl-left offset-top-30">
                                <button class="btn btn-primary" type="button" wire:click="comment()">Enviar</button>
                                <button class="btn btn-default" type="button" wire:click="resetInputFields()">Cancelar</button>
                            </div>
                        </div>
                    </div>
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
