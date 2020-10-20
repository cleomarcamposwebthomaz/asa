@extends('admin.layouts.master')

@section('title', 'Editar Foto')

@section('breadcrumb')
    {{-- {{ Breadcrumbs::render('enterprise.photo:edit') }} --}}
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">{{ _('Editar Foto') }}</h3>
    </div>
    {!! Form::model($enterprisePhoto, [
        'route' => [
          'admin.enterprise.photo.update',
          'photo' => $enterprisePhoto->id,
          'enterprise' => $enterprise->id
        ], 
        'method' => 'PATCH', 
        'files' => true
    ]) !!}
      <div class="card-body">
        @include('admin.pages.enterprise.photo._partials.form')
      </div>

      <div class="card-footer">
        @include('includes.form.bottom', [
          'url' => route(
            'admin.enterprise.photo.update', [
              'photo' => $enterprisePhoto->id,
              'enterprise' => $enterprise->id
            ]
          )
        ])
      </div>

    {!! Form::close() !!}
  </div>
@endsection
