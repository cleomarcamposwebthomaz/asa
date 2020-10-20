<div class="owl-carousel owl-theme property-show-images">
  @foreach ($property->photos as $photo)
    <a data-fancybox="gallery" href="/storage/{{ $photo->image }}">
      <img src="{{ thumb($photo->image, ['w' => 600, 'h' => 600, 'q' => 100, 'zc' => '2']) }}" alt="" class="img-fluid shadow">
    </a>
  @endforeach
</div>
