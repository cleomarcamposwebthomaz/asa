<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.1/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">

{!! Form::open(array_merge(['files' => true, 'class' => 'dropzone'], $form)) !!}

{{ $slot }}

{!! Form::close() !!}

<script>
    $('.dropzone').dropzone({
        paramName: '{{ !empty($name) ? $name : "image" }}'
    });
</script>
