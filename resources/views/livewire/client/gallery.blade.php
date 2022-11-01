<div>
    <!-- Gallery-->
    <section class="section novi-background section-98 section-md-124">
        <div class="container text-xl-left">
            <div class="isotope-wrap">
                <div class="row">
                    <!-- Isotope Filters-->
                    <div class="col-xl-3">
                        <div class="isotope-filters isotope-filters-vertical">
                            <h4 class="text-uppercase font-weight-bold isotope-filters-title offset-top-34 font-default">Productos</h4>
                            <ul class="list-inline list-inline-sm">
                                <li class="list-inline-item d-lg-none">
                                    <p>Elige tu producto:</p>
                                </li>
                                <li class="list-inline-item section-relative">
                                    <button class="isotope-filters-toggle btn btn-sm btn-default" data-custom-toggle="isotope-1" data-custom-toggle-disable-on-blur="true">Filtrar<span class="caret"></span></button>
                                    <ul class="list-sm-inline isotope-filters-list" id="isotope-1">
                                        <li wire:click="setProductId('')">
                                            <a class="font-weight-bold {{$productId == '' ? 'active' : ''}}" data-isotope-filter="*" data-isotope-group="gallery">Todo</a>
                                        </li>
                                        @foreach($productList as $data)
                                            <li wire:click="setProductId({{$data->id}})">
                                                <a class="font-weight-bold {{$productId == $data->id ? 'active' : ''}}" data-isotope-filter="{{$data->id}}" data-isotope-group="gallery">{{$data->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Isotope Content-->
                    <div wire:ignore class="col-xl-9 offset-xl-top-0 offset-top-34">
                        <div class="isotope" data-isotope-layout="masonry" data-isotope-group="gallery">
                            <div class="row" data-lightgallery="group">
                                @foreach($picturesList as $data)
                                    <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="{{$data->pictureable_id}}">
                                        <a class="thumbnail-classic" data-lightgallery="item" href="{{asset($data->urlImage)}}">
                                            <figure>
                                                <img width="270" height="270" src="{{asset($data->urlImage)}}" alt=""/>
                                            </figure>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
