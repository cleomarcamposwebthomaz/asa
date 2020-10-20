@php
    if (empty($property)) return;
@endphp

<div class="text-right pb-3">
  <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modal-lg">
    <i class="fas fa-plus"></i> Enviar Fotos
  </button>
</div>

<table class="table table-hover text-nowrap">
  <thead>
      <tr>
          {{-- <th>{{ __('ID') }}</th> --}}
          <th>{{ __('Imagem') }}</th>
          <th>{{ __('Status') }}</th>
          <th>{{ __('Mover') }}</th>
          <th></th>
      </tr>
  </thead>
  <tbody id="photos-list">
      @foreach ($property->photos as $image)
      <tr id="item-{{ $image->id }}" data-element="{{ $image->id }}">
          {{-- <td>{{ $image->id }}</td> --}}
          <td>
            <a data-fancybox="gallery" href="/storage/{{ $image->image }}">
              <img src="{{ thumb($image->image, ['w' => 50]) }}" alt="">
            </a>
          <td>
            {!! $image->active ?
                '<span class="badge badge-success">Ativo</span>' :
                '<span class="badge badge-danger">Inativo</span>'
            !!}
          </td>
          <td title="{{ __('Arraste para mover esse item') }}" class="sort text-center">
            <i class="fas fa-arrows-alt"></i>
          </td>
          <td>
              <a class="btn btn-sm btn-default" href="{{ route('admin.property.photo.edit', [
                'photo' => $image->id,
                'property' => $image->property_id
              ]) }}">
                  <i class="fas fa-edit"></i>
              </a>

              <button 
                class="btn btn-sm btn-danger btn-table-delete deleteRegisterAjax" 
                type="button"
                data-target="{{ $image->id }}"
                data-url="{{ route('admin.property.photo.destroy', [
                  'photo' => $image->id, 
                  'property' => $image->property_id
                ]) }}"                
              >
                <i class="fas fa-trash"></i>
            </button>
          </td>
      </tr>
      @endforeach
  </tbody>
</table>

<script>
  $(function() {
    $("#photos-list").sortable({ 
      axis: "y",
      update: function(event, ui) {
        _token = $('meta[name="csrf-token"]').attr('content');

        var data = $(this).sortable('serialize');
        data += '&_token=' + _token;
        $.post(`/admin/property/{{ $property->id }}/photo/reorder`, data)
      }
    });
    $("#photos-list").sortable('disable');

    $("#photos-list .sort i").css({ cursor: 'pointer', fontSize: 22 })

    $('#photos-list .sort i').on('mouseenter', function() {
        $( "#photos-list").sortable('enable');
    });

    $('#photos-list .sort i').on('mouseout', function() {
      $("#photos-list").sortable('disable');
    });
  });
</script>