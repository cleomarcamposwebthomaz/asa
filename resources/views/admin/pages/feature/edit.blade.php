@extends('admin.layouts.master')

@section('title', 'Característica')

@section('breadcrumb')
    {{ Breadcrumbs::render('feature:edit') }}
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">{{ __('Editar Característica') }}</h3>
    </div>
    <!-- /.card-header -->
    {!! Form::model($feature, ['route' => ['admin.feature.update', $feature->id], 'method' => 'PATCH']) !!}
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
