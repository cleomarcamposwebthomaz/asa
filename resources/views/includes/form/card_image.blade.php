{!!
    Form::file(
        $name,
        array_merge(['class' => $defaultClass], !empty($options) ? $options : []
    )
) !!}

@if (!empty($url))
    <div class="card mt-4" style="max-width: 200px">
        <div class="card-body">
            <img src="/storage/{{ $url }}" alt="{{ $url }}" class="img-fluid">
        </div>
    </div>
@endif
