@extends('admin.layouts.master')

@section('title', 'Equipe de Corretores')

@section('breadcrumb')
    {{ Breadcrumbs::render('broker:create') }}
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">{{ __('Cadastrar') }}</h3>
    </div>
    <!-- /.card-header -->
      {!! Form::open(['url' => route('admin.broker.store'), 'files' => true]) !!}
      <div class="card-body">
        @include('admin.pages.broker._partials.form')
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        @include('includes.form.bottom', ['url' => route('admin.broker.index')])
      </div>
      <!-- /.card-footer -->
      {!! Form::close() !!}
  </div>
  <!-- /.card -->
@endsection
