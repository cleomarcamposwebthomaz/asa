@extends('admin.layouts.master')

@section('title', 'Usuários')

@section('breadcrumb')
    {{ Breadcrumbs::render('user') }}
@endsection

@section('content')
<div class="text-right mb-3 toolbarlinks">
    <a href="{{ route('admin.user.create') }}" class="btn btn-sm btn-primary">
        <i class="fas fa-plus"></i> Novo
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista de Usuários</h3>

        <div class="card-tools">
            @include('admin.pages.users._partials.filter')
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
        <thead>
            <tr>
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('name', 'Nome')</th>
                <th>@sortablelink('email', 'E-mail')</th>
                <th>@sortablelink('created_at', 'Adicionado')</th>
                <th>@sortablelink('updated_at', 'Atualizado')</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
                <td>
                    <a class="btn btn-sm btn-default" href="{{ route('admin.user.edit', $user->id) }}">
                        <i class="fas fa-edit"></i>
                    </a>

                    @include('includes.form.postLink', ['url' => route('admin.user.destroy', $user->id)])
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<div class="table-pagination d-flex justify-content-end">
    {!! $users->appends(\Request::except('page'))->render() !!}
</div>
@endsection
