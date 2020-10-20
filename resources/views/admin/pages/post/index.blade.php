@extends('admin.layouts.master')

@section('title', 'Posts')

@section('breadcrumb')
    {{ Breadcrumbs::render('post') }}
@endsection

@section('content')
<div class="text-right mb-3 toolbarlinks">
    <a href="{{ route('admin.post.create') }}" class="btn btn-sm btn-primary">
        <i class="fas fa-plus"></i> {{ __('Novo') }}
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ __('Lista de Posts') }}</h3>
        <div class="card-tools">
            @include('admin.pages.post._partials.filter')
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
                {{-- <th>@sortablelink('created_at', 'Adicionado')</th>
                <th>@sortablelink('updated_at', 'Atualizado')</th> --}}
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>

                    {!! $post->active ?
                        '<span class="badge badge-success">Ativo</span>' :
                        '<span class="badge badge-danger">Inativo</span>'
                    !!}
                </td>
                {{-- <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td> --}}
                <td>
                    <a class="btn btn-sm btn-default" href="{{ route('admin.post.edit', $post->id) }}">
                        <i class="fas fa-edit"></i>
                    </a>

                    @include('includes.form.postLink', ['url' => route('admin.post.destroy', $post->id)])
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<div class="table-pagination d-flex justify-content-end">
    {!! $posts->appends(\Request::except('page'))->render() !!}
</div>
@endsection
