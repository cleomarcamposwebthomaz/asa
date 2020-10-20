@extends('admin.layouts.master')

@section('title', 'Páginas')

@section('breadcrumb')
    {{ Breadcrumbs::render('page') }}
@endsection

@section('content')
<div class="text-right mb-3 toolbarlinks">
    <a href="{{ route('admin.page.create') }}" class="btn btn-sm btn-primary">
        <i class="fas fa-plus"></i> {{ __('Novo') }}
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ __('Lista de Páginas') }}</h3>
        <div class="card-tools">
            @include('admin.pages.cms._partials.filter')
        </div>
    </div>
    <!-- /.card-header -->
    
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
        <thead>
            <tr>
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('title', 'Título')</th>
                <th>@sortablelink('active', 'Status')</th>
                <th>@sortablelink('created_at', 'Adicionado')</th>
                <th>@sortablelink('updated_at', 'Atualizado')</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pages as $page)
            <tr>
                <td>{{ $page->id }}</td>
                <td>{{ $page->title }}</td>
                <td>

                    {!! $page->active ?
                        '<span class="badge badge-success">Ativo</span>' :
                        '<span class="badge badge-danger">Inativo</span>'
                    !!}
                </td>
                <td>{{ $page->created_at }}</td>
                <td>{{ $page->updated_at }}</td>
                <td>
                    <a class="btn btn-sm btn-default" href="{{ route('admin.page.edit', $page->id) }}">
                        <i class="fas fa-edit"></i>
                    </a>

                    @include('includes.form.postLink', ['url' => route('admin.page.destroy', $page->id)])
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<div class="table-pagination d-flex justify-content-end">
    {!! $pages->appends(\Request::except('page'))->render() !!}
</div>
@endsection
