@include('includes.form.control', [
    'name' => 'name',
    'label' => 'Nome',
    'options' => [
        'required' => true,
    ]
])

@include('includes.form.control', [
    'name' => 'email',
    'label' => 'E-mail',
    'options' => [
        'required' => true,
    ]
])

@include('includes.form.control', [
    'name' => 'password',
    'label' => 'Senha',
    'options' => [
        'label' => 'Senha',
        'placeholder' => !empty($user->id) ? '' : 'Deixe em branco para manter a mesma',
        'required' => empty($user->id) ? true : false,
    ]
])
