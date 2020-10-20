@extends('admin.layouts.master')

@section('title', 'Imóveis')

@section('breadcrumb')
    {{ Breadcrumbs::render('property') }}
@endsection

@section('content')
<div class="text-right mb-3 toolbarlinks">
    <a href="{{ route('admin.property.create') }}" class="btn btn-sm btn-primary">
        <i class="fas fa-plus"></i> {{ __('Novo') }}
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ __('Lista de Imóveis') }}</h3>
        <div class="card-tools">
            @include('admin.pages.property._partials.filter')
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
                {{-- <th>@sortablelink('created_at', 'Adicionado')</th>
                <th>@sortablelink('updated_at', 'Atualizado')</th> --}}
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($properties as $property)
            <tr>
                <td>{{ $property->id }}</td>
                <td>{{ $property->name }}</td>
                <td>
                    {!! $property->active ?
                        '<span class="badge badge-success">Ativo</span>' :
                        '<span class="badge badge-danger">Inativo</span>'
                    !!}
                </td>
                {{-- <td>{{ $property->created_at }}</td>
                <td>{{ $property->updated_at }}</td> --}}
                <td>
                    <a class="btn btn-sm btn-default" href="{{ route('admin.property.copy', $property->id) }}" title="{{ __('Duplicar Imóvel') }}" onclick="if (!confirm('Duplicar esse imóvel?')) return false;">
                        <i class="fas fa-clone"></i>
                    </a>

                    <a class="btn btn-sm btn-default" href="{{ route('admin.property.edit', $property->id) }}">
                        <i class="fas fa-edit"></i>
                    </a>

                    @include('includes.form.postLink', ['url' => route('admin.property.destroy', $property->id)])
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<div class="table-pagination d-flex justify-content-end">
    {!! $properties->appends(\Request::except('page'))->render() !!}
</div>
@endsection
