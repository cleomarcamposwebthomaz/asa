{!!
    Form::textarea(
        $name,
        !empty($value) ? $value : null,
        array_merge(['class' => $defaultClass], !empty($options) ? $options : [])
    )
!!}
