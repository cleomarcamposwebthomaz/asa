@extends('admin.layouts.master')

@section('title', 'Tipo de Oferta')

@section('breadcrumb')
    {{ Breadcrumbs::render('offer-type:edit') }}
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">{{ __('Editar Tiop de Oferta') }}</h3>
    </div>
    <!-- /.card-header -->
    {!! Form::model($offerType, ['route' => ['admin.offer-type.update', $offerType->id], 'method' => 'PATCH']) !!}
      <div class="card-body">
        @include('admin.pages.offer-type._partials.form')
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        @include('includes.form.bottom', ['url' => route('admin.offer-type.index')])
      </div>
      <!-- /.card-footer -->
    {!! Form::close() !!}
  </div>
  <!-- /.card -->
@endsection
