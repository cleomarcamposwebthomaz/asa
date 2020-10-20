@extends('admin.layouts.master')

@section('title', 'Banners')

@section('breadcrumb')
    {{ Breadcrumbs::render('banner:create') }}
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">{{ __('Cadastrar Banner') }}</h3>
    </div>
    <!-- /.card-header -->
      {!! Form::open(['url' => route('admin.banner.store'), 'files' => true]) !!}
      <div class="card-body">
        @include('admin.pages.banner._partials.form')
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        @include('includes.form.bottom', ['url' => route('admin.banner.index')])
      </div>
      <!-- /.card-footer -->
      {!! Form::close() !!}
  </div>
  <!-- /.card -->
@endsection
