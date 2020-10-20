@extends('admin.layouts.master')

@section('title', 'Empreendimentos')

@section('breadcrumb')
    {{ Breadcrumbs::render('enterprise') }}
@endsection

@section('content')
<div class="text-right mb-3 toolbarlinks">
    <a href="{{ route('admin.enterprise.create') }}" class="btn btn-sm btn-primary">
        <i class="fas fa-plus"></i> {{ __('Novo') }}
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ __('Lista de Empreendimentos') }}</h3>
        <div class="card-tools">
            @include('admin.pages.enterprise._partials.filter')
        </div>
    </div>
    <!-- /.card-header -->
    
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
        <thead>
            <tr>
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('name', 'Nome')</th>
                <th>@sortablelink('active', 'Exibir no Site')</th>
<!--                 <th>@sortablelink('created_at', 'Adicionado')</th>
                <th>@sortablelink('updated_at', 'Atualizado')</th> -->
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enterprises as $enterprise)
            <tr>
                <td>{{ $enterprise->id }}</td>
                <td>{{ $enterprise->name }}</td>
                <td>
                    {!! $enterprise->active ?
                        '<span class="badge badge-success">Ativo</span>' :
                        '<span class="badge badge-danger">Inativo</span>'
                    !!}
                </td>
<!--                 <td>{{ $enterprise->created_at }}</td>
                <td>{{ $enterprise->updated_at }}</td> -->
                <td>
                    <a class="btn btn-sm btn-default" href="{{ route('admin.enterprise.edit', $enterprise->id) }}">
                        <i class="fas fa-edit"></i>
                    </a>

                    @include('includes.form.postLink', ['url' => route('admin.enterprise.destroy', $enterprise->id)])
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<div class="table-pagination d-flex justify-content-end">
    {!! $enterprises->appends(\Request::except('page'))->render() !!}
</div>
@endsection
