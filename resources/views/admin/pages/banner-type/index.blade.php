@extends('admin.layouts.master')

@section('title', 'Tipo de Banners')

@section('breadcrumb')
    {{ Breadcrumbs::render('banner-type') }}
@endsection

@section('content')
<div class="text-right mb-3 toolbarlinks">
    <a href="{{ route('admin.banner-type.create') }}" class="btn btn-sm btn-primary">
        <i class="fas fa-plus"></i> {{ __('Novo') }}
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ __('Lista de Banners') }}</h3>

        <div class="card-tools">
            @include('admin.pages.banner-type._partials.filter')
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
        <thead>
            <tr>
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('name', 'Nome')</th>
                <th>@sortablelink('description', 'Descrição')</th>
                <th>@sortablelink('active', 'Status')</th>
                {{-- <th>@sortablelink('created_at', 'Adicionado')</th>
                <th>@sortablelink('updated_at', 'Atualizado')</th> --}}
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bannerTypes as $type)
            <tr>
                <td>{{ $type->id }}</td>
                <td>{{ $type->name }}</td>
                <td>{{ $type->description }}</td>
                <td>

                    {!! $type->active ?
                        '<span class="badge badge-success">Ativo</span>' :
                        '<span class="badge badge-danger">Inativo</span>'
                    !!}
                </td>
                {{-- <td>{{ $type->created_at }}</td>
                <td>{{ $type->updated_at }}</td> --}}
                <td>
                    <a class="btn btn-sm btn-default" href="{{ route('admin.banner-type.edit', $type->id) }}">
                        <i class="fas fa-edit"></i>
                    </a>

                    @include('includes.form.postLink', ['url' => route('admin.banner-type.destroy', $type->id)])
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<div class="table-pagination d-flex justify-content-end">
    {!! $bannerTypes->appends(\Request::except('page'))->render() !!}
</div>
@endsection
