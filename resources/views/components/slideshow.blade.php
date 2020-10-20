<div id="homeSlider">
    <div class="owl-carousel owl-theme owl-slideshows">
        @foreach ($banners as $banner)
            {{-- <img src="/storage/{{ $banner->image }}" alt=""> --}}
            <div class="item" style="background-image: url(/storage/{{ $banner->image }})">
            </div>
        @endforeach
    </div>
</div>
