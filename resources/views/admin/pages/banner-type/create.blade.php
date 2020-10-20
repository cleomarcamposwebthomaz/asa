@extends('admin.layouts.master')

@section('title', 'Tipo de Banners')

@section('breadcrumb')
    {{ Breadcrumbs::render('banner-type:create') }}
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">{{ __('Cadastrar tipo de banner') }}</h3>
    </div>
    <!-- /.card-header -->
      {!! Form::open(['url' => route('admin.banner-type.store'), 'files' => true]) !!}
      <div class="card-body">
        @include('admin.pages.banner-type._partials.form')
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        @include('includes.form.bottom', ['url' => route('admin.banner-type.index')])
      </div>
      <!-- /.card-footer -->
      {!! Form::close() !!}
  </div>
  <!-- /.card -->
@endsection
