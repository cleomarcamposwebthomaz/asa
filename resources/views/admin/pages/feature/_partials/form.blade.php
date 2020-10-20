@include('includes.form.control', [
    'name' => 'active',
    'label' => 'Exibir no Site',
    'type' => 'checkbox'
])

@include('includes.form.control', [
    'name' => 'name',
    'label' => 'Nome',
    'options' => [
        'required' => true,
        'autofocus' => true
    ]
])
