@include('includes.form.control', [
    'name' => 'active',
    'label' => 'Manter Ativo',
    'type' => 'checkbox'
])

@include('includes.form.control', [
    'name' => 'show_menu',
    'label' => 'Mostrar no menu do Site',
    'type' => 'checkbox'
])

@include('includes.form.control', [
    'name' => 'parent_id',
    'label' => 'Categoria PAI',
    'type' => 'select',
    'value' => !empty(Request::get('parent_id')) ? Request::get('parent_id') : '',
    'listOptions' => $categories,
    'options' => [
        'class' => 'form-control',
        'data-select' => 'selectpicker',
        'data-live-search' => "true",
    ]
])

@include('includes.form.control', [
    'name' => 'name',
    'label' => 'Nome',
    'placeholder' => 'Nome da Categoria',
    'options' => [
        'autofocus' => true,
    ]
])

{{-- @include('includes.form.control', [
    'name' => 'description',
    'label' => 'Descrição',
    'type' => 'textarea'
])

 --}}