@extends('admin.layouts.master')

@section('title', 'Cadastrar Imóvel')

@section('breadcrumb')
    {{ Breadcrumbs::render('property:create') }}
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">{{ __('Cadastrar') }}</h3>
    </div>
    <!-- /.card-header -->
      {!! Form::open(['url' => route('admin.property.store'), 'novalidate' => true]) !!}
      <div class="card-body">
        @include('admin.pages.property._partials.form')
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        @include('includes.form.bottom', ['url' => route('admin.property.index')])
      </div>
      <!-- /.card-footer -->
      {!! Form::close() !!}
  </div>
  <!-- /.card -->
@endsection
