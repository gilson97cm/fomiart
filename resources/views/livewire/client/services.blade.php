<div>

    <!-- Programs-->
    <section class="section novi-background section-98 section-lg-124">
        <div class="container">
            <h1 class="text-primary font-weight-bold">Conoce Todos Nuestros servicios</h1>
            <svg height="13" viewbox="0 0 71 13" width="71" xmlns="http://www.w3.org/2000/svg" version="1.1">
                <path class="bg-primary" d="M 65.591797,0.39453125 C 64.632414,0.55512546 63.656631,1.037019 62.839844,1.9121094 l 2.009765,1.875 c 0.987119,-1.0575807 1.464926,-0.9055776 2.074219,-0.5703125 0.609293,0.335265 1.125342,1.2616345 1.144531,1.6152343 C 68.111503,5.6270437 67.786283,6.2015228 66.951172,6.875 66.116061,7.5484772 64.791442,8.161997 63.316406,8.6230469 60.366335,9.5451467 56.822431,9.9000923 55.357422,9.9453125 49.487597,10.126495 41.515727,8.2106051 34.380859,5.9648438 30.873861,4.8609863 26.209294,2.9728751 21.335938,1.7480469 16.462581,0.52321864 11.317182,-0.07967759 6.7734375,1.6503906 l -0.025391,0.00977 -0.025391,0.00977 C 4.3944177,2.6636873 2.6199428,4.0438286 1.515625,5.5957031 0.41130724,7.1475776 -0.0588551,9.0257429 0.7265625,10.642578 c 0.735964,1.515031 2.2978692,2.250647 3.6972656,2.234375 1.3993964,-0.01627 2.7415813,-0.606444 3.6738281,-1.679687 L 6.0214844,9.3945312 C 5.6678168,9.8016889 4.967102,10.122226 4.3925781,10.128906 3.8180543,10.135587 3.4724885,10.00395 3.1992188,9.4414062 2.9754025,8.9806654 3.024638,8.2170231 3.7558594,7.1894531 4.4839472,6.1662866 5.8567444,5.037042 7.78125,4.2109375 c 3.674744,-1.3881932 8.271853,-0.9562457 12.884766,0.203125 4.624565,1.1622992 9.200779,3.012418 12.890625,4.1738281 7.258822,2.2847774 15.360414,4.3068544 21.884765,4.1054684 1.739141,-0.05368 5.355814,-0.40149 8.695313,-1.445312 1.669749,-0.521911 3.270286,-1.207639 4.541015,-2.232422 C 69.948464,7.990842 70.909328,6.4678364 70.8125,4.6835938 70.724917,3.0697107 69.754257,1.63739 68.248047,0.80859375 67.494942,0.39419565 66.55118,0.23393704 65.591797,0.39453125 Z"></path>
            </svg>
            <div class="row justify-content-sm-center">
                <div class="col-sm-10 col-md-8">
                    <p>Revisa aquí los servicios que ofrecemos</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 ">
                    <div class="row justify-content-sm-center offset-top-66">
                        <?php $count = 0 ?>
                        @foreach($servicesList as $data)
                            <div class="col-md-4 mb-4 {{$count > 0 ? 'offset-top-50 offset-md-top-0' : ''}}" >
                                <div class="card shadow-drop" style="border-radius: 20px">
                                    <img class="card-img-top" src="{{$data->urlImage}}" alt="Card image cap" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$data->name}}</h5>
                                        <p class="card-text">{{Illuminate\Support\Str::limit($data->shortDescription,255)}}</p>
                                        <a href="{{route('serviceDetails',$data->id)}}" class="btn btn-sm btn-safety-orange">Leer Más</a>
                                    </div>
                                </div>
                            </div>
                            <?php $count++ ?>
                        @endforeach
                    </div>
                    <div class="mt-2 float-right">
                        {{$servicesList->links()}}
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>
