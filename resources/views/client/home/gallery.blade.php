<!-- Gallery-->
<section class="section novi-background">
    <div class="row no-gutters" data-lightgallery="group" data-lg-thumbnail="false">
       @foreach($picturesList as $data)
        <div class="col-sm-6 col-lg">
            <figure class="thumbnail-rayen">
                <img width="384" height="256" src="{{asset($data->urlImage)}}" alt=""/>
                <figcaption>
                    <a data-lightgallery="item" href="{{$data->urlImage}}">
                        <span class="novi-icon icon icon-md fa-search-plus"></span>
                    </a>
                </figcaption>
            </figure>
        </div>
        @endforeach
    </div>
</section>
