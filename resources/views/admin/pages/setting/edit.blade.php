@extends('admin.layouts.master')

@section('title', 'Configurações')

@section('breadcrumb')
    {{ Breadcrumbs::render('setting:edit') }}
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">{{ __('Editar Configuração') }}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    {!! Form::model($setting, ['route' => ['admin.setting.update', $setting->id], 'method' => 'PATCH', 'files' => true]) !!}
      <div class="card-body">
        @include('admin.pages.setting._partials.form')
      </div>

      <!-- /.card-body -->
      <div class="card-footer">
        @include('includes.form.bottom', ['url' => route('admin.setting.index')])
      </div>
      <!-- /.card-footer -->

    {!! Form::close() !!}
  </div>
  <!-- /.card -->
@endsection
