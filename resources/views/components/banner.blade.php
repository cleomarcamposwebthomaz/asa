<div class="owl-carousel owl-theme owl-banner">
    @foreach ($banners as $banner)
        <img src="/storage/{{ $banner->image }}" alt="">
    @endforeach
</div>