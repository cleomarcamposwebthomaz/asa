<div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 pb-5 property-item">
  <div class="card border-0 shadow">

    <div class="labels text-right">
      @foreach ($property->offerTypes as $offerType)
        <span class="rounded-0 shadow badge badge-{{ $offerType->color }}">{{ $offerType->name }}</span>
      @endforeach
    </div>

    <div class="owl-carousel owl-theme property-images">
      @foreach ($property->photos as $photo)
        <img src="{{ thumb($photo->image, ['w' => 400, 'h' => 400, 'q' => 100, 'zc' => '1']) }}" alt="" class="img-fluid">
      @endforeach
    </div>

    <div class="col-sm-12 pt-1 pb-2">
      <a href="{{ route('property.show', ['id' => $property->id, 'slug' => $property->slug]) }}">
        <h3 class="card-title text-dark f-black">{{ $property->name }}</h3>
      </a>
      <div>
        <i class="fas fa-map-marker-alt"></i>
        {{ $property->city->name }} {{ $property->city->state->uf }}
      </div>
      <h3 class="price text-primary mt-3 mb-0">{{ $property->price }}</h3>
    </div>

    <div class="bottom border-top owl-carousel owl-theme owl-property-parts mt-2">
      <div class="item d-flex flex-column text-center pt-2 pl-2 pr-2 pb-2 border-right">
        <!-- <i class="fas fa-car-alt"></i> -->
        <div class="text-center">
          <img src="<?= asset('img/quartos.png') ?>" style="max-width: 20px; display: initial;">
        </div>
        <span>{{ __('Dormitórios') }} ({{ array_sum([$property->bedrooms, $property->suites]) }})</span>


      </div>
      <div class="item d-flex flex-column text-center pt-2 pl-2 pr-2 pb-2 border-right">
        <!-- <i class="fas fa-car-alt"></i> -->
        <div class="text-center">
          <img src="<?= asset('img/vagas.png') ?>" style="max-width: 20px; display: initial;">
        </div>
        <span>{{ __('Vagas') }} ({{ $property->garages }})</span>
      </div>
      <div class="item d-flex flex-column text-center pt-2 pl-2 pr-2 pb-2 border-right">
        <!-- <i class="fas fa-car-alt"></i> -->
        <div class="text-center">
          <img src="<?= asset('img/area.png') ?>" style="max-width: 20px; display: initial;">
        </div>
        <span>{{ __('Área Total') }} {{ $property->property_size }}</span>
      </div>
      <div class="item d-flex flex-column text-center pt-2 pl-2 pr-2 pb-2 border-right">
        <!-- <i class="fas fa-car-alt"></i> -->
        <div class="text-center">
          <img src="<?= asset('img/suites.png') ?>" style="max-width: 20px; display: initial;">
        </div>
        <span>{{ __('Suites') }} ({{ $property->suites }})</span>
      </div>
    </div>

  </div>
</div>
