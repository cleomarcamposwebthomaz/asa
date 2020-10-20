@extends('admin.layouts.master')

@section('title', 'Categorias')

@section('breadcrumb')
    {{ Breadcrumbs::render('category') }}
@endsection

@section('content')
<div class="text-right mb-3 toolbarlinks">
    <a href="{{ route('admin.category.create') }}" class="btn btn-sm btn-primary">
        <i class="fas fa-plus"></i> {{ __('Novo') }}
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ __('Lista de Categorias') }}</h3>
        <div class="card-tools">
            @include('admin.pages.category._partials.filter')
        </div>
    </div>
    <!-- /.card-header -->
    
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
        <thead>
            <tr>
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('parent_id', 'Categoria PAI')</th>
                <th>@sortablelink('name', 'Nome')</th>
                <th>@sortablelink('active', 'Ativo')</th>
                <th title="Mostrar no Menu">@sortablelink('show_menu', 'Menu')</th>
                <th>@sortablelink('created_at', 'Adicionado')</th>
                {{-- <th>@sortablelink('updated_at', 'Atualizado')</th> --}}
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->father ? $category->father->name : '--' }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    {!! $category->active ?
                        '<span class="badge badge-success">Sim</span>' :
                        '<span class="badge badge-danger">Não</span>'
                    !!}
                </td>
                <td >

                    {!! $category->show_menu ?
                        '<span class="badge badge-success">Sim</span>' :
                        '<span class="badge badge-danger">Não</span>'
                    !!}
                </td>                
                <td>{{ $category->created_at }}</td>
                {{-- <td>{{ $category->updated_at }}</td> --}}
                <td>
                    <a class="btn btn-sm btn-default" href="{{ route('admin.category.edit', $category->id) }}">
                        <i class="fas fa-edit"></i>
                    </a>

                    @include('includes.form.postLink', ['url' => route('admin.category.destroy', $category->id)])
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<div class="table-pagination d-flex justify-content-end">
    {!! $categories->appends(\Request::except('page'))->render() !!}
</div>
@endsection
