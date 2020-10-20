<ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="tab-information-tab" data-toggle="pill" href="#tab-information" role="tab">Informações</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="tab-social-tab" data-toggle="pill" href="#tab-social" role="tab">Redes Sociais</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="tab-personalization-tab" data-toggle="pill" href="#tab-personalization" role="tab">Personalizado</a>
    </li>
</ul>

<div class="tab-content" id="custom-content-below-tabContent">
    <div class="tab-pane fade show active pt-3" id="tab-information" role="tabpanel">
        @include('includes.form.control', [
            'name' => 'active',
            'label' => 'Manter Ativo',
            'type' => 'checkbox'
        ])

        @include('includes.form.control', [
            'name' => 'fatured',
            'label' => 'Destaque',
            'type' => 'checkbox'
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

        @include('includes.form.control', [
            'name' => 'phone',
            'label' => 'Telefone',
            'options' => [
                'required' => true,
                'mask' => 'mask-phone'
            ]
        ])

        @include('includes.form.control', [
            'name' => 'address',
            'label' => 'Endereço Completo',
            'type' => 'textarea',
            'options' => [
                'rows' => 2
            ]
        ])

        @include('includes.form.control', [
            'name' => 'about',
            'label' => 'Sobre o Anunciante',
            'type' => 'textarea'
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
