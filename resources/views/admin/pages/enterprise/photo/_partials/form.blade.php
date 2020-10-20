@include('includes.form.control', [
    'name' => 'active',
    'label' => 'Manter Ativo',
    'type' => 'checkbox'
])

@include('includes.form.control', [
    'name' => 'image',
    'label' => 'Imagem',
    'type' => 'card_image',
    'url' => !empty($enterprisePhoto->image) ? $enterprisePhoto->image : false,
    'options' => [
        'required' => empty($enterprisePhoto->image) ? true : false,
    ]
])


