@extends('admin.layouts.master')

@section('title', 'Cadastrar Empreendimento')

@section('breadcrumb')
    {{ Breadcrumbs::render('enterprise:create') }}
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">{{ __('Cadastrar') }}</h3>
    </div>
    <!-- /.card-header -->
      {!! Form::open(['url' => route('admin.enterprise.store'), 'files' => true, 'novalidate' => true]) !!}
      <div class="card-body">
        @include('admin.pages.enterprise._partials.form')
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        @include('includes.form.bottom', ['url' => route('admin.enterprise.index')])
      </div>
      <!-- /.card-footer -->
      {!! Form::close() !!}
  </div>
  <!-- /.card -->
@endsection
