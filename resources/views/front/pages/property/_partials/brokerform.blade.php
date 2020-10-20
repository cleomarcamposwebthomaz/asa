{!! Form::open(['url' => route('property.store', ['id' => $property->id])]) !!}

@include('includes.flash-message')

@include('includes.form.control', [
  'name' => 'name',
  'options' => [
    'required' => true,
    'placeholder' => __('Nome')
  ]
])

@include('includes.form.control', [
  'name' => 'phone',
  'options' => [
    'required' => true,
    'placeholder' => __('Telefone/Celular'),
    'data-usemask' => 'phone'
  ]
])

@include('includes.form.control', [
  'name' => 'email',
  'options' => [
    'required' => true,
    'placeholder' => __('E-mail')
  ]
])

@include('includes.form.control', [
  'name' => 'message',
  'type' => 'textarea',
  'value' => __(sprintf('Olá, tenho interesse nesse imóvel %s', $property->name)),
  'options' => [
    'required' => true,
    'placeholder' => __('Mensagem'),
    'rows' => 4
  ]
])

<button class="btn btn-primary rounded-0 shadow">
  {{ __('Enviar') }} 
  <i class="fas fa-arrow-right"></i>
</button>

{!! Form::close() !!}