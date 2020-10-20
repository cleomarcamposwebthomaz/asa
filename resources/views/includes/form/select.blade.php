{!!
  Form::select($name, $listOptions,
      !empty($value) ? $value : null,
      array_merge(['class' => $defaultClass. ' select2'], !empty($options) ? $options : [])
  )
!!}