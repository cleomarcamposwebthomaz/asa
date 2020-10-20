<div class="custom-control custom-switch">
    {!!
        Form::checkbox(
            $name,
            !empty($value) ? $value : 1,
            null,
            array_merge(['class' => 'custom-control-input'], !empty($options) ? $options : [])
        )
    !!}
    <label class="custom-control-label" for="{{ $name }}"></label>
</div>
