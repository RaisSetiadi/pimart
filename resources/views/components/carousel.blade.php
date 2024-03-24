<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($carousels as $key => $carousel)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="2000">
            <img src="{{ asset('/storage/carousel/' . $carousel->image) }}" class="d-block w-100" alt="...">
        </div>
        @endforeach
    </div>
</div>