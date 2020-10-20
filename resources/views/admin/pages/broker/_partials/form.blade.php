<ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="tab-information-tab" data-toggle="pill" href="#tab-information" role="tab">Informações</a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link" id="tab-social-tab" data-toggle="pill" href="#tab-social" role="tab">Redes Sociais</a>
    </li> --}}
</ul>

<div class="tab-content" id="custom-content-below-tabContent">
    <div class="tab-pane fade show active pt-3" id="tab-information" role="tabpanel">
        @include('includes.form.control', [
            'name' => 'active',
            'label' => 'Exibir no Site',
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
            'name' => 'email',
            'label' => 'E-mail',
            'options' => [
                'required' => true
            ]
        ])

        <div class="row">
            <div class="col-sm-6">
                @include('includes.form.control', [
                    'name' => 'phone',
                    'label' => 'Telefone',
                    'options' => [
                        'required' => false,
                        'data-usemask' => 'phone',
                    ]
                ])
            </div>
            <div class="col-sm-6">
                @include('includes.form.control', [
                    'name' => 'show_phone',
                    'label' => 'Mostrar Telefone',
                    'type' => 'select',
                    'listOptions' => [
                        __('Não'),
                        __('Sim'),
                    ],
                    'options' => [
                        'data-select' => 'selectpicker'
                    ]
                ])                
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                @include('includes.form.control', [
                    'name' => 'whatsapp',
                    'label' => 'WhatsApp',
                    'options' => [
                        'required' => true,
                        'data-usemask' => 'phone',
                    ]
                ])                
            </div>
            <div class="col-sm-6">
                @include('includes.form.control', [
                    'name' => 'show_whatsapp',
                    'label' => 'Mostrar WhatsApp',
                    'type' => 'select',
                    'listOptions' => [
                        __('Não'),
                        __('Sim'),
                    ],
                    'options' => [
                        'data-select' => 'selectpicker'
                    ]
                ])                
            </div>            
        </div>

        @include('includes.form.control', [
            'name' => 'address',
            'label' => 'Endereço Completo',
            'type' => 'textarea',
            'options' => [
                'rows' => 2
            ]
        ])
{{-- 
        @include('includes.form.control', [
            'name' => 'about',
            'label' => 'Sobre',
            'type' => 'textarea',
            'options' => [
                'rows' => 4
            ]
        ]) --}}

        @include('includes.form.control', [
            'name' => 'image',
            'label' => 'Imagem',
            'type' => 'card_image',
            'url' => !empty($broker->image) ? $broker->image : false,
            'options' => [
                'required' => empty($broker->image) ? true : false,
            ]
        ])        
    </div>

    <div class="tab-pane fade pt-3" id="tab-social" role="tabpanel">
        @include('admin.pages.advertiser._partials.tabs.social')
    </div>

    <div class="tab-pane fade pt-3" id="tab-personalization" role="tabpanel">
        @include('includes.form.control', [
            'name' => 'html',
            'label' => 'Código <HTML> Personalizado',
            'type' => 'textarea'
        ])
    </div>
</div>
