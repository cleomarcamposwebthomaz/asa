@extends('admin.layouts.master')

@section('title', 'Usuários')

@section('breadcrumb')
    {{ Breadcrumbs::render('user:create') }}
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Cadastrar Usuário</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
      {!! Form::open(['url' => route('admin.user.store'), 'files' => true]) !!}
      <div class="card-body">
        @include('admin.pages.users._partials.form')
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        @include('includes.form.bottom', ['url' => route('admin.user.index')])
      </div>
      <!-- /.card-footer -->
      {!! Form::close() !!}
  </div>
  <!-- /.card -->
@endsection
