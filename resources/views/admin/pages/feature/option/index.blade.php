@extends('admin.layouts.master')

@section('title', $feature->name)

@section('breadcrumb')
    {{ Breadcrumbs::render('feature') }}
@endsection

@section('content')

    <div class="text-right mb-3 toolbarlinks">
        <a href="{{ route('admin.feature.index') }}" class="btn btn-default">
            <i class="fas fa-chevron-left"></i> Voltar
        </a>        
        <a href="{{ route('admin.feature.option.create', ['feature' => $feature->id]) }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> {{ __('Novo') }}
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Lista de opções') }}</h3>
            <div class="card-tools">
                @include('admin.pages.feature._partials.filter')
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
                @foreach ($featureOptions as $featureOption)
                <tr>
                    <td>{{ $featureOption->id }}</td>
                    <td>{{ $featureOption->name }}</td>
                    <td>

                        {!! $featureOption->active ?
                            '<span class="badge badge-success">Ativo</span>' :
                            '<span class="badge badge-danger">Inativo</span>'
                        !!}
                    </td>                     
                    <td>{{ $featureOption->created_at }}</td>
                    <td>{{ $featureOption->updated_at }}</td>
                    <td>
                        <a 
                            class="btn btn-sm btn-default" 
                            href="{{ route('admin.feature.option.edit', [
                                'option' => $featureOption->id,
                                'feature' => $featureOption->feature_id,
                            ]) }}"
                        >
                            <i class="fas fa-edit"></i>
                        </a>

                        {{-- @include('includes.form.postLink', ['url' => route('admin.feature.option.destroy', $feature->id)]) --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
