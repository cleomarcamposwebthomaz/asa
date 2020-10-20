@extends('admin.layouts.master')

@section('title', 'Configurações')

@section('breadcrumb')
    {{ Breadcrumbs::render('setting') }}
@endsection

@section('content')
<div class="text-right mb-3 toolbarlinks">
    <a href="{{ route('admin.setting.create') }}" class="btn btn-sm btn-primary">
        <i class="fas fa-plus"></i> Novo
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista de Configurações</h3>
        <div class="card-tools">
            @include('admin.pages.setting._partials.filter')
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
        <thead>
            <tr>
                <th>@sortablelink('id', 'ID')</th>
                {{-- <th>@sortablelink('name', 'Nome')</th> --}}
                <th>@sortablelink('label', 'Label')</th>
                {{-- <th>@sortablelink('public_name', 'Nome Público')</th> --}}
                {{-- <th>@sortablelink('value', 'Valor')</th> --}}
                {{-- <th>@sortablelink('updated_at', 'Atualizado')</th> --}}
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($settings as $setting)
            <tr>
                <td>{{ $setting->id }}</td>
                {{-- <td>{{ $setting->name }}</td> --}}
                {{-- <td>{{ $setting->label }}</td> --}}
                <td>{{ $setting->public_name }}</td>
                {{-- <td>{!! Str::limit($setting->value, 50, ' ...') !!}</td> --}}
                {{-- <td>{{ $setting->updated_at }}</td> --}}
                <td>
                    <a class="btn btn-sm btn-default" href="{{ route('admin.setting.edit', $setting->id) }}">
                        <i class="fas fa-edit"></i>
                    </a>

                    @include('includes.form.postLink', ['url' => route('admin.setting.destroy', $setting->id)])
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<div class="table-pagination d-flex justify-content-end">
    {!! $settings->appends(\Request::except('page'))->render() !!}
</div>
@endsection
