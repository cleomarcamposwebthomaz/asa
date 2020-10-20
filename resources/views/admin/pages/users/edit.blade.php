@extends('admin.layouts.master')

@section('title', 'Usuários')

@section('breadcrumb')
    {{ Breadcrumbs::render('user:edit') }}
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Editar Usuário</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    {!! Form::model($user, ['route' => ['admin.user.update', $user->id], 'method' => 'PATCH', 'files' => true]) !!}
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
