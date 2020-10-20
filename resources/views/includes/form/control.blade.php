@php
    $defaultClass = 'form-control';

    if (!empty($errors->get($name)[0])) {
        $defaultClass = 'form-control is-invalid';
    }

@endphp

{{-- <div class="form-group row"> --}}
<div class="form-group">
    @if (!empty($label))
       @include('includes.form.label')
    @endif
    
    <div>
    {{-- <div class="{{ !empty($label && empty($row)) ? 'col-sm-10' : 'col-sm-12' }}"> --}}
        @switch(!empty($type) ? $type : 'default')
            @case('editor')
                @include('includes.form.editor')
            @break

            @case('textarea')
                @include('includes.form.textarea')
            @break

            @case('checkbox')
                @include('includes.form.checkbox')
            @break

            @case('card_image')
                @include('includes.form.card_image')
            @break

            @case('select')
                @include('includes.form.select')
            @break

            @case('hidden')
                @include('includes.form.hidden')
            @break

            @default
                @include('includes.form.input')
        @endswitch

        @error($name)
            <p class="help-block text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>
