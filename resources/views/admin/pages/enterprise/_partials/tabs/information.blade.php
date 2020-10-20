<div class="row">
    <div class="col-sm-6">
        @include('includes.form.control', [
            'name' => 'active',
            'label' => 'Ativo',
            'type' => 'select',
            'value' => !empty(Request::get('active')) ? Request::get('active') : '',
            'listOptions' => [
                1 => __('Sim'),
                0 => __('Não')
            ],
            'options' => [
                'class' => 'form-control',
                'data-select' => 'selectpicker',
                'data-live-search' => "true",
            ]
        ])                
    </div>
    <div class="col-sm-6">
        @include('includes.form.control', [
            'name' => 'published',
            'label' => 'Exibir no Site',
            'type' => 'select',
            'value' => !empty(Request::get('published')) ? Request::get('published') : '',
            'listOptions' => [
                1 => __('Sim'),
                0 => __('Não')
            ],
            'options' => [
                'class' => 'form-control',
                'data-select' => 'selectpicker',
                'data-live-search' => "true",
            ]
        ])                
    </div>
</div>

@include('includes.form.control', [
    'name' => 'name',
    'label' => 'Nome',
    'placeholder' => 'Nome',
    'options' => [
        'required' => true,
        'autofocus' => true
    ]
])

@include('includes.form.control', [
    'name' => 'description',
    'label' => 'Descrição',
    'type' => 'editor',
    'options' => [
        'required' => false,
    ]
])
