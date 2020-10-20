@include('includes.form.control', [
    'name' => 'active',
    'label' => 'Manter Ativo',
    'type' => 'checkbox'
])

@include('includes.form.control', [
    'name' => 'name',
    'label' => 'Nome',
    'options' => [
        'required' => true,
    ]
])

@include('includes.form.control', [
    'name' => 'description',
    'type' => 'textarea',
    'label' => 'Descrição'
])