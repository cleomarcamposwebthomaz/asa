@extends('admin.layouts.master')

@section('title', 'Tipo de Ofertas')

@section('breadcrumb')
    {{ Breadcrumbs::render('offer-type:create') }}
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">{{ __('Cadastrar') }}</h3>
    </div>
    <!-- /.card-header -->
      {!! Form::open(['url' => route('admin.offer-type.store')]) !!}
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
