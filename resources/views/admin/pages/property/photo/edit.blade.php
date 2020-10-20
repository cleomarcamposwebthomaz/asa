@extends('admin.layouts.master')

@section('title', 'Editar Foto')

@section('breadcrumb')
    {{-- {{ Breadcrumbs::render('property.photo:edit') }} --}}
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">{{ _('Editar Foto') }}</h3>
    </div>
    {!! Form::model($propertyPhoto, [
        'route' => [
          'admin.property.photo.update',
          'photo' => $propertyPhoto->id,
          'property' => $property->id
        ], 
        'method' => 'PATCH', 
        'files' => true
    ]) !!}
      <div class="card-body">
        @include('admin.pages.property.photo._partials.form')
      </div>

      <div class="card-footer">
        @include('includes.form.bottom', [
          'url' => route(
            'admin.property.photo.update', [
              'photo' => $propertyPhoto->id,
              'property' => $property->id
            ]
          )
        ])
      </div>

    {!! Form::close() !!}
  </div>
@endsection
