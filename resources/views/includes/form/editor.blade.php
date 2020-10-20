{!!
    Form::textarea($name,
        !empty($value) ? $value : null,
        array_merge(['class' => $defaultClass . ' text-editor'], !empty($options) ? $options : [])
    )
!!}
