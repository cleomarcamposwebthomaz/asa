@include('includes.form.control', [
    'name' => 'active',
    'label' => 'Manter Ativo',
    'type' => 'checkbox',
])

@include('includes.form.control', [
    'name' => 'name',
    'label' => 'Nome',
    'options' => [
        'autofocus' => true,
    ]
])
