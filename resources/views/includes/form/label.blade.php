@php
    $inputLabel = $label;
    if (!empty($options['required'])) {
        $inputLabel = $inputLabel . ' <font color="red">*</font>';
    }

    $labelClass = 'col-form-label';

    if (empty($row)) {
        $labelClass = $labelClass;
        // $labelClass = $labelClass .= ' col-sm-2';
    }
@endphp

{!!
    Html::decode(
        Form::label(
            !empty($id) ? $id : $name, $inputLabel,
            array_merge(['class' => $labelClass], !empty($labelOptions) ? $labelOptions : [])
        )
    ) 
!!}



