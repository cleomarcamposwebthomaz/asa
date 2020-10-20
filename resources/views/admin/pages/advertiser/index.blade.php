@extends('admin.layouts.master')

@section('title', 'Anunciantes')

@section('breadcrumb')
    {{ Breadcrumbs::render('advertiser') }}
@endsection

@section('content')

    <div class="text-right mb-3 toolbarlinks">
        <a href="{{ route('admin.advertiser.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> {{ __('Novo') }}
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Lista de Anunciantes') }}</h3>
            <div class="card-tools">
                @include('admin.pages.advertiser._partials.filter')
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
                @foreach ($advertisers as $advertiser)
                <tr>
                    <td>{{ $advertiser->id }}</td>
                    <td>{{ $advertiser->name }}</td>
                    <td>
                        {!! $advertiser->active ?
                            '<span class="badge badge-success">Ativo</span>' :
                            '<span class="badge badge-danger">Inativo</span>'
                        !!}
                    </td>
                    <td>{{ $advertiser->created_at }}</td>
                    <td>{{ $advertiser->updated_at }}</td>
                    <td>
                        <a class="btn btn-sm btn-default" href="{{ route('admin.advertiser.edit', $advertiser->id) }}">
                            <i class="fas fa-edit"></i>
                        </a>

                        @include('includes.form.postLink', ['url' => route('admin.advertiser.destroy', $advertiser->id)])
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
