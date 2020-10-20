@extends('admin.layouts.master')

@section('title', 'Equipe Corretores')

@section('breadcrumb')
    {{ Breadcrumbs::render('broker:edit') }}
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">{{ __('Editar Corretor') }}</h3>
    </div>
    <!-- /.card-header -->
    {!! Form::model($broker, ['route' => ['admin.broker.update', $broker->id], 'method' => 'PATCH', 'files' => true]) !!}
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
