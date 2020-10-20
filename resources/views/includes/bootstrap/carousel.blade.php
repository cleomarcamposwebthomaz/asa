<div id="{{ $id }}" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">

    @foreach ($images as $key => $image)
        <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
            <img src="/storage/{{ $image->image }}" class="d-none d-sm-block w-100" alt="...">
            <img src="/storage/{{ $image->image_mobile }}" class="d-block d-sm-none w-100" alt="...">
        </div>
    @endforeach

    </div>
    <a class="carousel-control-prev" href="#{{ $id }}" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#{{ $id }}" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
