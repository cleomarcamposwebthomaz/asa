@include('includes.form.control', [
    'name' => 'name',
    'label' => 'Nome'
])

@include('includes.form.control', [
    'name' => 'label',
    'label' => 'Label'
])

@include('includes.form.control', [
    'name' => 'public_name',
    'label' => 'Nome Público'
])

@include('includes.form.control', [
    'name' => 'value',
    'label' => 'Valor',
    'type' => 'textarea',
    'options' => [
        'rows' => 4
    ]
])
