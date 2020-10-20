<div class="row">
  <div class="col-lg-2 col-md-3 col-sm-6">
    @include('includes.form.control', [
      'name' => 'active',
      'label' => __('Ativo Sempre'),
      'type' => 'checkbox'
    ])
  </div>
  <div class="col-lg-2 col-md-3 col-sm-6">
    @include('includes.form.control', [
      'name' => 'fatured',
      'label' => __('Destaque'),
      'type' => 'checkbox'
    ])
  </div>
</div>

@include('includes.form.control', [
  'name' => 'broker_id',
  'type' => 'select',
  'label' => __('Corretor'),
  'placeholder' => 'Corretor',
  'options' => [
      'required' => true,
      'data-role' => 'select2',
  ],
  'listOptions' => $brokers
])
@include('includes.form.control', [
  'name' => 'name',
  'label' => __('Título'),
  'options' => [
      'required' => true,
      'autofocus' => true
  ]
])

<div class="row">
  <div class="col-sm-12">
    @include('includes.form.control', [
      'name' => 'price',
      'label' => __('Preço do Imóvel'),
      'options' => [
          'required' => true,
          'data-usemask' => 'price'
      ]
    ])
  </div>
  <div class="col-sm-6 d-none">
    @include('includes.form.control', [
      'name' => 'price_promotional',
      'label' => __('Preço Promocional'),
      'options' => [
          'data-usemask' => 'price'
      ]
    ])
  </div>
</div>

@include('includes.form.control', [
  'name' => 'video_url',
  'label' => __('Vídeo'),
  'options' => [
    'placeholder' => 'Ex: https://www.youtube.com/',
    'helper' => __('Apenas vídeos do youtube são aceitos')
  ]
])

@include('includes.form.control', [
  'name' => 'description',
  'label' => __('Descrição'),
  'type' => 'editor',
  'required' => false,
])

@include('includes.form.control', [
  'name' => 'internal_observation',
  'label' => __('Observação Interna'),
  'type' => 'textarea',
  'required' => false,
  'options' => [
    'rows' => 2
  ]
])

@include('includes.form.control', [
  'name' => 'tags',
  'label' => __('Tags'),
  'options' => [
      'required' => false,
      'data-role' => 'tagsinput'
  ]
])
