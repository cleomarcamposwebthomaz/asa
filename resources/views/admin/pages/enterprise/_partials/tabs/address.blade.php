@include('includes.form.control', [
  'name' => 'cep',
  'label' => 'CEP',
  'options' => [
    'required' => true,
    'data-usemask' => 'cep',
  ]
])

<div class="row">
  <div class="col-sm-4">
    @include('includes.form.control', [
      'name' => 'state_id',
      'type' => 'select',
      'label' => 'UF',
      'listOptions' => $states,
      'options' => [
        'required' => true,
        'data-select' => 'selectpicker',
        'data-live-search' => "true",
      ]
    ])    
  </div>

  <div class="col-sm-8">
    @include('includes.form.control', [
      'name' => 'city_id',
      'type' => 'select',
      'label' => 'Cidade',
      'listOptions' => $cities,
      'options' => [
        'required' => true,
        'data-select' => 'selectpicker',
        'data-title' => 'Seleciona a cidade',
        'data-live-search' => "true",
      ]
    ])    
  </div>
</div>

<div class="row">
  <div class="col-sm-8">
    @include('includes.form.control', [
      'name' => 'street',
      'label' => 'Rua',
      'options' => [
        'required' => true,
        'data-select' => 'selectpicker',
      ]
    ])
  </div>
  <div class="col-sm-4">
    @include('includes.form.control', [
      'name' => 'number',
      'label' => 'Número',
      'options' => [
        'required' => true,
      ]
    ])
  </div>
</div>

@include('includes.form.control', [
  'name' => 'neighborhood',
  'label' => 'Bairro',
  'options' => [
    'required' => true,
  ]
])

@include('includes.form.control', [
  'name' => 'complement',
  'label' => 'Complemento',
  'type' => 'textarea'
])

@push('scripts')
<script>
  $('input[name="cep"]').on('blur', function() {
    const cep = $(this).val().replace(/([^\d])+/gim, '');

    if (cep.length < 8) return;
  
    $.getJSON(`https://viacep.com.br/ws/${cep}/json/`, function(result) {

      if (!result.error) {
        $('select[name="state_id"]').find('option').each(function() {
          if ($(this).text() === result.uf) {
            $('select[name="state_id"]').find(`option[value="${$(this).val()}"]`).attr('selected', true);
            $('select[name="state_id"]').selectpicker('refresh');
            getCities($(this).val(), result.localidade);
          }
        });

        $('input[name="street"]').val(result.logradouro);
        $('input[name="neighborhood"]').val(result.bairro);
        $('textarea[name="complement"]').val(result.complemento);
      }
    });
  });

  function getCities(state_id, city_name = null) {
    $.ajax({
      url: `{{ route("admin.city.index") }}?&json=1&state_id=${state_id}`,
      success: function(result) {
        $('select[name="city_id"]').selectpicker('destroy');

        $('select[name="city_id"]').empty();
        result.forEach((city) => {
          let option = `<option value="${city.id}">${city.name}</option>`;
          $('select[name="city_id"]').append(option);
          if (city.name === city_name) {
            $('select[name="city_id"]').find(`option[value="${city.id}"]`).attr('selected', true);
          }
        });

        $('select[name="city_id"]').selectpicker('refresh');
      },
      beforeSend: function() {
        $('select[name="city_id"]').html(`<option value="0">Aguarde...</option>`);
      },
      complete: function() {
      }
    });    
  }

  $('select[name="state_id"]').on('change', function() {
    const state_id = $(this).val();
    getCities(state_id);
  });
</script>

@if (empty($enterprise->id))
<script>
  if ($('select[name="state_id"]').val()) {
    getCities($('select[name="state_id"]').val());
  }
</script>
@endif
@endpush