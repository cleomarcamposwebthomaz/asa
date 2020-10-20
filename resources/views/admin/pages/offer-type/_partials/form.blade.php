@include('includes.form.control', [
    'name' => 'name',
    'label' => 'Nome',
    'options' => [
        'required' => true,
        'autofocus' => true
    ]
])

@include('includes.form.control', [
    'name' => 'color',
    'type' => 'select',
    'label' => 'Cor da etiqueta',
    'listOptions' => $colors ,
    'options' => [
        'required' => true,
        'autofocus' => true,
    ]
])
