@extends('admin.layouts.master')

@section('title', 'Editar Post')

@section('breadcrumb')
    {{ Breadcrumbs::render('post:edit') }}
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">{{ __('Editar Página') }}</h3>
    </div>
    <!-- /.card-header -->
    {!! Form::model($post, ['route' => ['admin.post.update', $post->id], 'method' => 'PATCH', 'files' => true]) !!}
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
