<table class="table">
  <tr>
    <td><strong>{{ __('Imóvel') }}:</strong> {{ $propertyContact->property->name }}</td>
  </tr>
  <tr>
    <td><strong>{{ __('Corretor') }}:</strong> {{ $propertyContact->broker->name }}</td>
  </tr>
  <tr>
    <td><strong>{{ __('Nome') }}:</strong> {{ $propertyContact->name }}</td>
  </tr>
  <tr>
    <td><strong>{{ __('E-mail') }}:</strong> {{ $propertyContact->email }}</td>
  </tr>
  <tr>
    <td><strong>{{ __('Telefone/Celular') }}:</strong> {{ $propertyContact->phone }}</td>
  </tr>
  <tr>
    <td><strong>{{ __('Mensagem') }}:</strong> {{ $propertyContact->message }}</td>
  </tr>
</table>