<div class="row">
  <div class="col-sm-6">
      @include('includes.form.control', [
        'name' => 'categories[]',
        'type' => 'select',
        'label' => __('Categorias relacionadas'),
        'options' => [
          'required' => true,
          'multiple' => true,
          'data-select' => 'selectpicker',
          'data-live-search' => "true",
          'data-title' => 'Categorias relacionadas',
        ],
        'listOptions' => $categories
      ])
  </div>
  <div class="col-sm-6">
      @include('includes.form.control', [
        'name' => 'enterprise_id',
        'type' => 'select',
        'label' => __('Pertence a um empreendimento?'),
        'options' => [
          'required' => false,
          'multiple' => false,
          'data-select' => 'selectpicker',
          'data-live-search' => "true",
          'data-title' => '--',
        ],
        'listOptions' => $enterprises
      ])
  </div>
</div>

<div class="row">
  <div class="col-sm-6">
    @include('includes.form.control', [
      'name' => 'property_type_id',
      'type' => 'select',
      'label' => __('Tipo de Imóvel'),
      'placeholder' => 'Tipo de Imóvel',
      'options' => [
        'required' => true,
        'data-select' => 'selectpicker',
        'data-live-search' => "true",
      ],
      'listOptions' => $propertyTypes
    ])    
  </div>
  <div class="col-sm-6">
    @include('includes.form.control', [
      'name' => 'offerTypes[]',
      'type' => 'select',
      'label' => __('Tipo de Oferta'),
      'placeholder' => 'Tipo de Oferta',
      'options' => [
        'required' => true,
        'multiple' => true,
        'data-select' => 'selectpicker',
        'data-live-search' => "true",
        'data-title' => __('Selecione os tipo de ofertas')
      ],
      'listOptions' => $offerTypes
    ])
  </div>
</div>

@include('includes.form.control', [
  'name' => 'features[]',
  'type' => 'select',
  'label' => !empty($property->id) ? 
                              __('Características do Imóvel') : 
                              __('Selecione as características do Imóvel'),
  'options' => [
      'required' => true,
      'multiple' => true,
      'data-select' => 'selectpicker',
      'data-live-search' => "true",
      'title' => !empty($property->id) ? 
                              __('Características do Imóvel') : 
                              __('Selecione as características do Imóvel'),
  ],
  'listOptions' => $features
])

<div class="row">
  <div class="col-sm-3">
    @include('includes.form.control', [
      'name' => 'garages',
      'label' => __('Vagas'),
      'options' => [
        'type' => 'number',
        'placeholder' => 'ex: 2',
        'required' => true,
      ]
    ])
  </div>
  <div class="col-sm-3">
    @include('includes.form.control', [
      'name' => 'bathroom',
      'label' => __('Banheiros'),
      'options' => [
        'type' => 'number',
        'placeholder' => 'ex: 2',
        'required' => true,
      ]
    ])
  </div>
  <div class="col-sm-3">
    @include('includes.form.control', [
      'name' => 'bedrooms',
      'label' => __('Quartos'),
      'options' => [
        'type' => 'number',
        'placeholder' => 'ex: 4',
        'required' => true,
      ]
    ])
  </div>
  <div class="col-sm-3">
    @include('includes.form.control', [
      'name' => 'suites',
      'label' => __('Suítes'),
      'options' => [
        'type' => 'number',
        'placeholder' => 'ex: 1',
        'required' => true
      ]
    ])
  </div>
  <div class="col-sm-12">
    @include('includes.form.control', [
      'name' => 'property_size',
      'label' => __('Tamanho da propriedade'),
      'options' => [
        'type' => 'number',
        'placeholder' => 'ex: 200',
      ]
    ])
  </div>
  {{-- <div class="col-sm-6">
    @include('includes.form.control', [
      'name' => 'year',
      'label' => __('Ano'),
      'options' => [
        'type' => 'number',
        'placeholder' => 'ex: '. date('Y')
      ]
    ])
  </div> --}}
</div>
