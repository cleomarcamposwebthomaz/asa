<div class="card pt-2" id="filter">

  <div class="d-block d-sm-none">
    <div class="pl-2 header d-flex justify-content-between align-items-center mb-3 border-bottom close-modal-filter">
      <h6 class="text-danger text-700">Econtre seu Imóvel</h6>
      <button class="btn btn-show-search">
          <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  
  {!! Form::open(['method' => 'get', 
    'url' => empty($category) ? route('property') : 
      route('property.category', [
        'id' => $category->id,
        'slug' => $category->slug,
      ])
    ]) !!}
  <div class="col-sm-12">

    <label for="state" class="d-flex justify-content-between align-items-center label-state">
      {{ __('Buscar') }}
      <i class="fas fa-times" style="display: none;"></i>  
    </label>

    @include('includes.form.control', [
      'name' => 'search',
      'value' => Request::get('search'),
      'options' => [
        'placeholder' => __('Buscar'),
      ]
    ]) 

    <label for="state" class="d-flex justify-content-between align-items-center label-state">
      {{ __('UF') }}
      <i class="fas fa-times" style="display: none;"></i>  
    </label>
    @include('includes.form.control', [
      'name' => 'state',
      'type' => 'select',
      'listOptions' => $states,
      'value' => Request::get('state'),
      'options' => [
          'id' => 'filter_state',
          'data-select' => 'selectpicker',
          'data-title' => __('--'),
          'data-live-search' => "true",
      ]
    ])

    <label for="city" class="d-flex justify-content-between align-items-center label-city">
      {{ __('Cidade') }}
      <i class="fas fa-times" style="display: none;"></i>  
    </label>
    @include('includes.form.control', [
      'name' => 'city',
      'type' => 'select',
      'listOptions' => $cities,
      'value' => Request::get('city'),
      'options' => [
          'id' => 'filter_city',
          'multiple' => false,
          'data-select' => 'selectpicker',
          'data-title' => __('--'),
          'data-live-search' => "true",
      ]
    ])

    @if (empty($category))
      <label for="categories" class="d-flex justify-content-between align-items-center label-categories">
        {{ __('Categorias') }}
        <i class="fas fa-times" style="display: none;"></i>  
      </label>
      @include('includes.form.control', [
          'name' => 'categories[]',
          'type' => 'select',
          'value' => Request::get('categories'),
          'listOptions' => $categories,
          'options' => [
              'id' => 'filter_categories',
              'multiple' => true,
              'data-select' => 'selectpicker',
              'data-title' => __('--'),
              'data-live-search' => "true",
          ]
      ])        
    @endif
    
    <label for="property_types" class="d-flex justify-content-between align-items-center label-city">
      {{ __('Tipo de Imóvel') }}
      <i class="fas fa-times" style="display: none;"></i>  
    </label>
    @include('includes.form.control', [
        'name' => 'property_types[]',
        'type' => 'select',
        'value' => Request::get('property_types'),
        'listOptions' => $propertyTypes,
        'options' => [
            'id' => 'filter_property_types',
            'multiple' => true,
            'data-select' => 'selectpicker',
            'data-title' => __('--'),
            'data-live-search' => "true",
        ]
    ])

    <label for="offer_types" class="d-flex justify-content-between align-items-center label-city">
      {{ __('Tipo de Oferta') }}
      <i class="fas fa-times" style="display: none;"></i>  
    </label>
    @include('includes.form.control', [
        'name' => 'offer_types[]',
        'type' => 'select',
        'value' => Request::get('offer_types'),
        'listOptions' => $offerTypes,
        'options' => [
            'id' => 'filter_offer_types',
            'multiple' => true,
            'data-select' => 'selectpicker',
            'data-title' => __('--'),
            'data-live-search' => "true",
        ]
    ])


    <label for="features" class="d-flex justify-content-between align-items-center label-city">
      {{ __('Características') }}
      <i class="fas fa-times" style="display: none;"></i>  
    </label>
    @include('includes.form.control', [
      'name' => 'features[]',
      'type' => 'select',
      'value' => Request::get('features'),
      'listOptions' => $features,
      'options' => [
          'id' => 'filter_features',
          'multiple' => true,
          'data-select' => 'selectpicker',
          'data-title' => __('--'),
          'data-live-search' => "true",
      ]
    ])

    <div class="row">
      <div class="col-sm-12 text-center">
        <label for="">{{ __('Preço') }}</label>
      </div>
      <div class="col-lg-6 pr-lg-1">
        @include('includes.form.control', [
          'name' => 'price[]',
          'value' => Request::get('price')[0],
          'options' => [
            'data-usemask' => 'price',
            'placeholder' => __('De'),
          ]
        ])        
      </div>
      <div class="col-lg-6 pl-lg-1">
        @include('includes.form.control', [
          'name' => 'price[]',
          'value' => Request::get('price')[1],
          'options' => [
            'data-usemask' => 'price',
            'placeholder' => __('Até'),
          ]
        ])        
      </div>
    </div>
  </div>

  <div class="col-sm-12 pt-2 pb-3 text-center">
    <button type="submit" class="btn btn-primary btn-block">
      <i class="fas fa-search"></i>
      {{ __('Buscar') }}
    </button>
  </div>

  {!! Form::close() !!}

</div>  <!-- card -->


