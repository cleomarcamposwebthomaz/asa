@include('includes.form.control', [
    'name' => 'active',
    'label' => 'Manter Ativo',
    'type' => 'checkbox'
])

@include('includes.form.control', [
    'name' => 'image',
    'label' => 'Imagem',
    'type' => 'card_image',
    'url' => !empty($propertyPhoto->image) ? $propertyPhoto->image : false,
    'options' => [
        'required' => empty($propertyPhoto->image) ? true : false,
    ]
])


