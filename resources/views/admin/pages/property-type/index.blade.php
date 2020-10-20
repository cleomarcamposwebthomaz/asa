@extends('admin.layouts.master')

@section('title', 'Tipo de Imóveis')

@section('breadcrumb')
    {{ Breadcrumbs::render('property-type') }}
@endsection

@section('content')
<div class="text-right mb-3 toolbarlinks">
    <a href="{{ route('admin.property-type.create') }}" class="btn btn-sm btn-primary">
        <i class="fas fa-plus"></i> {{ __('Novo') }}
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ __('Lista de tipo de Imóveis') }}</h3>
        <div class="card-tools">
            @include('admin.pages.property-type._partials.filter')
        </div>
    </div>
    <!-- /.card-header -->
    
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
        <thead>
            <tr>
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('name', 'Nome')</th>
                <th>@sortablelink('active', 'Status')</th>
                <th>@sortablelink('created_at', 'Adicionado')</th>
                <th>@sortablelink('updated_at', 'Atualizado')</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($propertyTypes as $propertyType)
            <tr>
                <td>{{ $propertyType->id }}</td>
                <td>{{ $propertyType->name }}</td>
                <td>

                    {!! $propertyType->active ?
                        '<span class="badge badge-success">Ativo</span>' :
                        '<span class="badge badge-danger">Inativo</span>'
                    !!}
                </td>
                <td>{{ $propertyType->created_at }}</td>
                <td>{{ $propertyType->updated_at }}</td>
                <td>
                    <a class="btn btn-sm btn-default" href="{{ route('admin.property-type.edit', $propertyType->id) }}">
                        <i class="fas fa-edit"></i>
                    </a>

                    @include('includes.form.postLink', ['url' => route('admin.property-type.destroy', $propertyType->id)])
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<div class="table-pagination d-flex justify-content-end">
    {!! $propertyTypes->appends(\Request::except('page'))->render() !!}
</div>
@endsection
