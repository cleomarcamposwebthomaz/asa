@extends('admin.layouts.master')

@section('title', 'Características')

@section('breadcrumb')
    {{ Breadcrumbs::render('feature') }}
@endsection

@section('content')
<div class="text-right mb-3 toolbarlinks">
    <a href="{{ route('admin.feature.create') }}" class="btn btn-sm btn-primary">
        <i class="fas fa-plus"></i> {{ __('Novo') }}
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ __('Lista de Características') }}</h3>
        <div class="card-tools">
            @include('admin.pages.feature._partials.filter')
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
            @foreach ($features as $feature)
            <tr>
                <td>{{ $feature->id }}</td>
                <td>{{ $feature->name }}</td>
                <td>

                    {!! $feature->active ?
                        '<span class="badge badge-success">Ativo</span>' :
                        '<span class="badge badge-danger">Inativo</span>'
                    !!}
                </td>                    
                <td>{{ $feature->created_at }}</td>
                <td>{{ $feature->updated_at }}</td>
                <td>
                    <a class="btn btn-sm btn-default" href="{{ route('admin.feature.edit', $feature->id) }}">
                        <i class="fas fa-edit"></i>
                    </a>

                    {{-- <a class="btn btn-sm btn-default" href="{{ route('admin.feature.option.index', ['feature' => $feature->id]) }}">
                        <i class="fas fa-list"></i> {{ __('opções') }} ({{ $feature->options_count }})
                    </a> --}}

                    @include('includes.form.postLink', ['url' => route('admin.feature.destroy', $feature->id)])
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<div class="table-pagination d-flex justify-content-end">
    {!! $features->appends(\Request::except('page'))->render() !!}
</div>
@endsection
