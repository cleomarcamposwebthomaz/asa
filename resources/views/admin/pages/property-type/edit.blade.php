@extends('admin.layouts.master')

@section('title', 'Tipo de Imóveis')

@section('breadcrumb')
    {{ Breadcrumbs::render('property-type:edit') }}
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">{{ __('Editar tipo de imóvel') }}</h3>
    </div>
    <!-- /.card-header -->
    {!! Form::model($propertyType, ['route' => ['admin.property-type.update', $propertyType->id], 'method' => 'PATCH']) !!}
      <div class="card-body">
        @include('admin.pages.property-type._partials.form')
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        @include('includes.form.bottom', ['url' => route('admin.property-type.index')])
      </div>
      <!-- /.card-footer -->
    {!! Form::close() !!}
  </div>
  <!-- /.card -->
@endsection
