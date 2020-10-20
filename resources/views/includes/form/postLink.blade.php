@php
    $id = 'form-' . uniqid();
@endphp

<button class="btn btn-sm btn-danger btn-table-delete" data-button="{{ $id }}">
    <i class="fas fa-trash"></i>
</button>

{!! Form::open(['url' => $url, 'id' => $id, 'class' => 'd-none', 'method' => 'delete']) !!}
<button type="submit" />
{!! Form::close() !!}

@push('scripts')
<script>
    $(`button[data-button="{{ $id }}"]`).click(function() {
        if (confirm('Tem certeza que deseja deletar esse registro?')) {
            $(`#${$(this).data('button')}`).submit();
        }
    });
</script>
@endpush
