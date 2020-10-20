@include('includes.form.control', [
    'name' => 'active',
    'label' => 'Manter Ativo',
    'type' => 'checkbox'
])

@include('includes.form.control', [
    'name' => 'banner_type_id',
    'label' => 'Tipo de Banner',
    'type' => 'select',
    'listOptions' => $bannerTypes,
    'options' => [
        'required' => true,
        'data-select' => 'selectpicker'
    ]
])

@include('includes.form.control', [
    'name' => 'name',
    'label' => 'Nome',
    'options' => [
        'required' => true,
        'autofocus' => true,
    ]
])

@include('includes.form.control', [
    'name' => 'image',
    'label' => 'Imagem',
    'type' => 'card_image',
    'url' => !empty($banner->image) ? $banner->image : false,
    'options' => [
        'required' => empty($banner->image) ? true : false,
    ]
])

{{-- @include('includes.form.control', [
    'name' => 'image_mobile',
    'label' => 'Imagem Mobile',
    'type' => 'card_image',
    'url' => !empty($banner->image_mobile) ? $banner->image_mobile : false
])
 --}}
