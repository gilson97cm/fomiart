<div class="parallax-container section">
    <div id="carouselExampleIndicators"  class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php $count = 0 ?>
            @foreach($bannersList as $data)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{$count}}"
                    class="{{$count <= 0 ? 'active' : ''}}"></li>
                <?php $count = $count + 1 ?>
            @endforeach
        </ol>
        <div class="carousel-inner">
            <?php $count = 0 ?>
            @foreach($bannersList as $data)
                <div class="carousel-item {{$count <= 0 ? 'active' : ''}}">
                    <img class="d-block w-100" src="{{asset($data->urlImage)}}" alt="banner slide">
                </div>
                <?php $count = $count + 1 ?>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

