@extends('admin.layouts.master')

@section('title', 'Tipo de Ofertas')

@section('breadcrumb')
    {{ Breadcrumbs::render('offer-type') }}
@endsection

@section('content')
<div class="text-right mb-3 toolbarlinks">
    <a href="{{ route('admin.offer-type.create') }}" class="btn btn-sm btn-primary">
        <i class="fas fa-plus"></i> {{ __('Novo') }}
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ __('Lista de Tipo de Ofertas') }}</h3>
        <div class="card-tools">
            @include('admin.pages.offer-type._partials.filter')
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
            @foreach ($offerTypes as $offerType)
            <tr>
                <td>{{ $offerType->id }}</td>
                <td>{{ $offerType->name }}</td>
                <td>{{ $offerType->created_at }}</td>
                <td>{{ $offerType->updated_at }}</td>
                <td>
                    <a class="btn btn-sm btn-default" href="{{ route('admin.offer-type.edit', $offerType->id) }}">
                        <i class="fas fa-edit"></i>
                    </a>

                    @if (!$offerType->is_default)
                        @include('includes.form.postLink', ['url' => route('admin.offer-type.destroy', $offerType->id)])
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<div class="table-pagination d-flex justify-content-end">
    {!! $offerTypes->appends(\Request::except('page'))->render() !!}
</div>
@endsection
