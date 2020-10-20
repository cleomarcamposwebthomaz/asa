@include('includes.form.control', [
    'name' => 'active',
    'label' => 'Manter Ativo',
    'type' => 'checkbox'
])

@include('includes.form.control', [
    'name' => 'title',
    'label' => 'Título',
    'options' => [
        'required' => true,
        'autofocus' => true,
    ]
])
{{-- 
@include('includes.form.control', [
    'name' => 'content',
    'label' => 'Descrição',
    'type' => 'textarea',
    'options' => [
        'rows' => 3
    ]
]) --}}

@include('includes.form.control', [
    'name' => 'content',
    'label' => 'Conteúdo',
    'type' => 'editor'
])

@include('includes.form.control', [
    'name' => 'image',
    'label' => 'Imagem',
    'type' => 'card_image',
    'url' => !empty($post->image) ? $post->image : false,
    'options' => [
        'required' => empty($post->image) ? true : false,
    ]
])

