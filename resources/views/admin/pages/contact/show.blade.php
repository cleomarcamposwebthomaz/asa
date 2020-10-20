<table class="table">
  <tr>
    <td><strong>{{ __('Nome') }}:</strong> {{ $contact->name }}</td>
  </tr>
  <tr>
    <td><strong>{{ __('Assunto') }}:</strong> {{ $contact->subject }}</td>
  </tr>
  <tr>
    <td><strong>{{ __('E-mail') }}:</strong> {{ $contact->email }}</td>
  </tr>
  <tr>
    <td><strong>{{ __('Telefone/Celular') }}:</strong> {{ $contact->phone }}</td>
  </tr>
  <tr>
    <td><strong>{{ __('Mensagem') }}:</strong> {{ $contact->message }}</td>
  </tr>
</table>