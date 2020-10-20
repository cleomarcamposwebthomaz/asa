@extends('admin.layouts.master')

@section('title', 'Posts')

@section('breadcrumb')
    {{ Breadcrumbs::render('post:create') }}
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">{{ __('Cadastrar Post') }}</h3>
    </div>
    <!-- /.card-header -->
      {!! Form::open(['url' => route('admin.post.store'), 'files' => true]) !!}
      <div class="card-body">
        @include('admin.pages.post._partials.form')
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        @include('includes.form.bottom', ['url' => route('admin.post.index')])
      </div>
      <!-- /.card-footer -->
      {!! Form::close() !!}
  </div>
  <!-- /.card -->
@endsection
