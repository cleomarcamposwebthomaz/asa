@extends('front.layouts.master')

@section('tags', $property->tags)

@section('title', $property->name)

@section('breadcrumb')
    {{ Breadcrumbs::render('site:property', $property) }}
@endsection

@section('content')
<section id="property-show" class="pb-5">
  <div class="bg-light text-center pt-3 pb-3">
    <h3 class="f-black text-dark">
      {{ $property->name }}
    </h3>
  </div>

  <div class="container">
    @yield('breadcrumb')
  </div>

  <div class="container">

    <div class="row">
      <div class="col-sm-8">

        @include('front.pages.property._partials.photos')

        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-515eeaf54693130e"></script>

        <div class="col-sm-12 bg-light p-3">
         <div class="row">
           <div class="col-sm-6 d-none">

              <div class="mb-2">
                <strong class="text-dark">{{ __('Cidade') }}:</strong>
                <span>{{ $property->city->name }}</span>
              </div>

              <div class="mb-2">
                <strong class="text-dark">{{ __('Bairro') }}:</strong>
                <span>{{ $property->neighborhood }}</span>
              </div>

              <div class="mb-2">
                <strong class="text-dark">{{ __('CEP') }}:</strong>
                <span>{{ $property->cep }}</span>
              </div>

              <div class="mb-2">
                <strong class="text-dark">{{ __('Rua') }}:</strong>
                <span>{{ $property->street }}</span>
              </div>
           </div> <!-- left -->

           <div class="col-sm-6">
              <div class="mb-2">
                <strong class="text-dark">{{ __('Código do Imóvel') }}:</strong>
                <span>{{ $property->id }}</span>
              </div>

              <div class="mb-2">
                <strong class="text-dark">{{ __('Tipo de Oferta') }}:</strong>
                @foreach ($property->offerTypes as $key => $offerType)
                  <span>{{ $offerType->name }}</span>
                  @if (count($property->offerTypes) -1 != $key)
                      ,
                  @endif
                @endforeach
              </div>

              <div class="mb-2">
                <strong class="text-dark">{{ __('Tipo de Imóvel') }}:</strong>
                <span>{{ $property->type->name }}</span>
              </div>

              <div class="mb-2">
                <strong class="text-dark">{{ __('Quartos') }}:</strong>
                <span>{{ $property->bedrooms }}</span>
              </div>

              <div class="mb-2">
                <strong class="text-dark">{{ __('Suítes') }}:</strong>
                <span>{{ $property->suites }}</span>
              </div>

              <div class="mb-2">
                  <strong class="text-dark">{{ __('Total de Dormitórios') }}:</strong>
                  <span>{{ array_sum([$property->bedrooms, $property->suites]) }}</span>
              </div>

              <div class="mb-2">
                <strong class="text-dark">{{ __('Banheiros') }}:</strong>
                <span>{{ $property->bathroom }}</span>
              </div>

              <?php if (!empty($property_size)): ?>
                <div class="mb-2">
                  <strong class="text-dark">{{ __('Tamanho da Propriedade') }}:</strong>
                  <span>{{ $property->property_size }}</span>
                </div>
              <?php endif ?>

            </div> <!-- right -->

         </div>
        </div>

        <?php if (count($property->features) > 0): ?>
          <div class="col-sm-12 bg-light p-3 mt-3">
            <div class="heading text-center">
              <h5 class="text-uppercase f-black text-dark">{{ __('Características') }}</h5>
              <hr />
            </div>
            <ul class="d-flex features">
              @foreach ($property->features as $feature)
                <li><span>{{ $feature->name }}</span></li>
              @endforeach
            </ul>
          </div>
        <?php endif ?>

        <?php if (!empty($property->description)): ?>
        <div class="col-sm-12 bg-light p-3 mt-3">
          <div class="heading text-center">
            <h5 class="text-uppercase f-black text-dark">{{ __('Detalhes') }}</h5>
            <hr />
            <div class="description text-justify p-2">
             {!! $property->description !!}
            </div>
          </div>
        </div>
        <?php endif ?>

        @if (!empty($property->video_embed))
        <div class="col-sm-12 bg-light p-3 mt-3">
          <div class="heading text-center">
            <h5 class="text-uppercase f-black text-dark">{{ __('Vídeo') }}</h5>
            <hr />
            <div class="description text-justify p-2">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="{{ $property->video_embed }}" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
        @endif

      </div> <!-- left -->

      <div class="col-sm-4">
        <div class="card col-sm-12 border-0 property-sticky">

          <ul class="p-0 list-group mb-3 border-0 rounded-0">
            <li class="list-group-item bg-primary text-white">
              <h4 class="f-black mb-0">{{ $property->price }}</h4>
            </li>

            @if (!empty($property->broker) && $property->broker->show_phone)
              <li class="list-group-item border-left-0 border-right-0 bg-light border-bottom">
                <i class="fas fa-phone-volume"></i>
                <span class="text-dark">{{ $property->broker->phone }}</span>
              </li>
            @endif

            @if (!empty($property->broker) && $property->broker->show_whatsapp)
              <li class="list-group-item border-left-0 border-right-0 bg-light border-bottom">
                <i class="fab fa-whatsapp"></i>
                <span class="text-dark">{{ $property->broker->whatsapp }}</span>
              </li>
            @endif

            @if (!empty($property->broker))
            <li class="list-group-item border-0 bg-light">
              <i class="fas fa-envelope"></i>
              <a href="mailto:{{ $property->broker->email }}">
                <span class="text-dark">{{ $property->broker->email }}</span>
              </a>
            </li>
            @endif
          </ul>

          <div class="bg-light pt-3 pb-3 col-sm-12 form-container">
            <h5 class="text-primary f-black">{{ __('Tem interesse nesse imóvel?') }}</h5>
            @include('front.pages.property._partials.brokerform')
          </div>

          <a class="addthis_button btn btn-primary btn-block mb-4 mt-3" href="{{ Request::url() }}">
            <i class="fas fa-share-alt"></i>
            {{ $appSetting['property_share_button_title']['value'] }}
          </a>
        </div>

      </div> <!-- right -->
    </div>

  </div>
</section>

@endsection
