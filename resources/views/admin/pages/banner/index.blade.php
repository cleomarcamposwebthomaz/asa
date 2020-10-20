@extends('admin.layouts.master')

@section('title', 'Banners')

@section('breadcrumb')
    {{ Breadcrumbs::render('banner') }}
@endsection

@section('content')
<div class="text-right mb-3 toolbarlinks">
    <a href="{{ route('admin.banner.create') }}" class="btn btn-sm btn-primary">
        <i class="fas fa-plus"></i> {{ __('Novo') }}
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ __('Lista de Banners') }}</h3>

        <div class="card-tools">
            @include('admin.pages.banner._partials.filter')
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
        <thead>
            <tr>
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('banner_type_id', 'Tipo')</th>
                <th>@sortablelink('name', 'Nome')</th>
                <th>@sortablelink('active', 'Status')</th>
                {{-- <th>@sortablelink('created_at', 'Adicionado')</th>
                <th>@sortablelink('updated_at', 'Atualizado')</th> --}}
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($banners as $banner)
            <tr>
                <td>{{ $banner->id }}</td>
                <td>{{ $banner->type->name }}</td>
                <td>{{ $banner->name }}</td>
                <td>

                    {!! $banner->active ?
                        '<span class="badge badge-success">Ativo</span>' :
                        '<span class="badge badge-danger">Inativo</span>'
                    !!}
                </td>
                {{-- <td>{{ $banner->created_at }}</td>
                <td>{{ $banner->updated_at }}</td> --}}
                <td>
                    <a class="btn btn-sm btn-default" href="{{ route('admin.banner.edit', $banner->id) }}">
                        <i class="fas fa-edit"></i>
                    </a>

                    @include('includes.form.postLink', ['url' => route('admin.banner.destroy', $banner->id)])
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<div class="table-pagination d-flex justify-content-end">
    {!! $banners->appends(\Request::except('page'))->render() !!}
</div>
@endsection
