<div id="carouselExample" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach ($images as $key => $image)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img src="{{ $image }}" class="d-block w-100" alt="Image {{ $key }}">
            </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
