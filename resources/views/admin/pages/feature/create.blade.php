@extends('admin.layouts.master')

@section('title', 'Características')

@section('breadcrumb')
    {{ Breadcrumbs::render('feature:create') }}
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">{{ __('Cadastrar') }}</h3>
    </div>
    <!-- /.card-header -->
      {!! Form::open(['url' => route('admin.feature.store')]) !!}
      <div class="card-body">
        @include('admin.pages.feature._partials.form')
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        @include('includes.form.bottom', ['url' => route('admin.feature.index')])
      </div>
      <!-- /.card-footer -->
      {!! Form::close() !!}
  </div>
  <!-- /.card -->
@endsection
