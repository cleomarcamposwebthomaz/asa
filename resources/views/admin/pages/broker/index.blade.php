@extends('admin.layouts.master')

@section('title', 'Equipe de Corretores')

@section('breadcrumb')
    {{ Breadcrumbs::render('broker') }}
@endsection

@section('content')
<div class="text-right mb-3 toolbarlinks">
    <a href="{{ route('admin.broker.create') }}" class="btn btn-sm btn-primary">
        <i class="fas fa-plus"></i> {{ __('Novo') }}
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ __('Lista de Corretores') }}</h3>
        <div class="card-tools">
            @include('admin.pages.broker._partials.filter')
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
            @foreach ($brokers as $broker)
            <tr>
                <td>{{ $broker->id }}</td>
                <td>{{ $broker->name }}</td>
                <td>
                    {!! $broker->active ?
                        '<span class="badge badge-success">Ativo</span>' :
                        '<span class="badge badge-danger">Inativo</span>'
                    !!}
                </td>
<!--                 <td>{{ $broker->created_at }}</td>
                <td>{{ $broker->updated_at }}</td> -->
                <td>
                    <a class="btn btn-sm btn-default" href="{{ route('admin.broker.edit', $broker->id) }}">
                        <i class="fas fa-edit"></i>
                    </a>

                    @include('includes.form.postLink', ['url' => route('admin.broker.destroy', $broker->id)])
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<div class="table-pagination d-flex justify-content-end">
    {!! $brokers->appends(\Request::except('page'))->render() !!}
</div>
@endsection
