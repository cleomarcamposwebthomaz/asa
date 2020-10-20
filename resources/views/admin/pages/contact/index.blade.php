@extends('admin.layouts.master')

@section('title', 'Contatos')

@section('breadcrumb')
    {{ Breadcrumbs::render('admin:contact') }}
@endsection

@section('content')
{{-- <div class="text-right mb-3 toolbarlinks">
    <a href="{{ route('admin.contact.create') }}" class="btn btn-sm btn-primary">
        <i class="fas fa-plus"></i> {{ __('Novo') }}
    </a>
</div> --}}

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ __('Lista de Contatos') }} ({{ $total }})</h3>
        <div class="card-tools">
            @include('admin.pages.contact._partials.filter')
        </div>
    </div>
    <!-- /.card-header -->
    
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
        <thead>
            <tr>
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('name', 'Nome')</th>
                <th>@sortablelink('is_read', 'Lido')</th>
                <th>@sortablelink('created_at', 'Data')</th>
                {{-- <th>@sortablelink('updated_at', 'Atualizado')</th> --}}
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->name }}</td>
                <td>

                    {!! $contact->is_read ?
                        '<span class="badge badge-success">Lido</span>' :
                        '<span class="badge badge-warning">Aguardando</span>'
                    !!}
                </td>                    
                <td>{{ $contact->created_at }}</td>
                {{-- <td>{{ $contact->updated_at }}</td> --}}
                <td>
                    <a title="{{ __('Visualizar') }}" class="btn btn-sm btn-default" href="{{ route('admin.contact.show', $contact->id) }}"
                        data-remote="{{ route('admin.contact.show', $contact->id) }}" data-toggle="modal" 
                        data-target="#contact-{{ $contact->id }}">
                        <i class="fas fa-eye"></i>
                    </a>

                    @include('includes.form.postLink', ['url' => route('admin.contact.destroy', $contact->id)])
                </td>
            </tr>

            <div class="modal fade" id="contact-{{ $contact->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detalhes</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Aguarde...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">
                                Fechar
                            </button>
                        </div>
                    </div>
                </div>
            </div>   

            @endforeach
        </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<div class="table-pagination d-flex justify-content-end">
    {!! $contacts->appends(\Request::except('page'))->render() !!}
</div>

<script>
    $('body').on('click', '[data-toggle="modal"]', function(){
        $($(this).data("target")+' .modal-body').load($(this).data("remote"));
    });    
</script>
@endsection
