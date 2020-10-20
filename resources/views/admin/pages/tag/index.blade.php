@extends('admin.layouts.master')

@section('title', 'Tags')

@section('breadcrumb')
    {{ Breadcrumbs::render('tag') }}
@endsection

@section('content')

    <div class="text-right mb-3 toolbarlinks">
        <a href="{{ route('admin.tag.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> {{ __('Novo') }}
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Lista de Tags') }}</h3>
            <div class="card-tools">
                @include('admin.pages.tag._partials.filter')
            </div>
        </div>
        <!-- /.card-header -->
        
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>@sortablelink('id', 'ID')</th>
                    <th>@sortablelink('name', 'Nome')</th>
                    <th>@sortablelink('created_at', 'Adicionado')</th>
                    <th>@sortablelink('updated_at', 'Atualizado')</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->created_at }}</td>
                    <td>{{ $tag->updated_at }}</td>
                    <td>
                        <a class="btn btn-sm btn-default" href="{{ route('admin.tag.edit', $tag->id) }}">
                            <i class="fas fa-edit"></i>
                        </a>

                        @include('includes.form.postLink', ['url' => route('admin.tag.destroy', $tag->id)])
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
