<!-- Default footer-->
<footer class="section novi-background section-relative section-top-66 section-bottom-34 page-footer">
    <div class="container">
        <div class="row justify-content-center grid-group-md text-lg-left">
            <div class="col-lg-3">
                <!-- Footer brand-->
                <div class="footer-brand"><a href="{{route('home')}}"><img width='135' height='55' src='{{asset($info->urlLogo)}}' alt=''/></a></div>
                <ul class="list-inline list-inline-xxs d-inline-block offset-top-34 post-meta text-dark list-inline-primary">
                    <li class="list-inline-item" {{$info->fb == '' ? 'hidden' : ''}}><a href="{{$info->fb}}" target="_blank"><span class="novi-icon icon icon-xxs fa-facebook"></span></a></li>
                    <li class="list-inline-item" {{$info->tw == '' ? 'hidden' : ''}}><a href="{{$info->tw}}" target="_blank"><span class="novi-icon icon icon-xxs fa-twitter"></span></a></li>
                    <li class="list-inline-item" {{$info->ig == '' ? 'hidden' : ''}}><a href="{{$info->ig}}" target="_blank"><span class="novi-icon icon icon-xxs fa-instagram"></span></a></li>
                </ul>
            </div>
            <div class="col-lg-5">
                <h6 class="text-uppercase text-spacing-60 font-default">FomiArt</h6>
                <p>{{Illuminate\Support\Str::limit($pagesData->abstract,300)}}</p>

            </div>
            <div class="col-lg-4 col-xl-3 offset-xxl-1">
                <ul class="list list-unstyled address contact-info text-left">
                    <li>
                        <div class="unit unit-spacing-xxs flex-row">
                            <div class="unit-left"><span class="novi-icon icon icon-xxs mdi mdi-cellphone text-primary text-middle"></span></div>
                            <div class="unit-body"><a class="text-middle" href="tel:{{$info->cellphone}}">{{$info->cellphone}}</a></div>
                        </div>
                    </li>
                    <li>
                        <div class="unit unit-spacing-xxs flex-row">
                            <div class="unit-left"><span class="novi-icon icon icon-xxs mdi mdi-phone text-primary text-middle"></span></div>
                            <div class="unit-body"><a class="text-middle" href="tel:{{$info->phone}}">{{$info->phone}}</a></div>
                        </div>
                    </li>
                    <li>
                        <div class="unit unit-spacing-xxs flex-row">
                            <div class="unit-left"><span class="novi-icon icon icon-xxs mdi mdi-map-marker-radius text-primary text-middle"></span></div>
                            <div class="unit-body"><a class="text-middle" href="{{route('contact')}}">{{$info->address}}</a></div>
                        </div>
                    </li>
                    <li>
                        <div class="unit unit-spacing-xxs flex-row">
                            <div class="unit-left"><span class="novi-icon icon icon-xxs mdi mdi-clock text-primary text-middle"></span></div>
                            <div class="unit-body"><span class="text-middle">Lun–Sáb: 7:00am–8:00pm</span></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container offset-top-50">
        <p class="small text-darker">FomiArt &copy; <span id="copyright-year"></span>.
        </p>
    </div>
</footer>
