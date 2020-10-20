@extends('admin.layouts.master')

@section('title', 'Tags')

@section('breadcrumb')
    {{ Breadcrumbs::render('tag:edit') }}
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">{{ __('Editar Tag') }}</h3>
    </div>
    <!-- /.card-header -->
    {!! Form::model($tag, ['route' => ['admin.tag.update', $tag->id], 'method' => 'PATCH']) !!}
      <div class="card-body">
        @include('admin.pages.tag._partials.form')
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        @include('includes.form.bottom', ['url' => route('admin.tag.index')])
      </div>
      <!-- /.card-footer -->
    {!! Form::close() !!}
  </div>
  <!-- /.card -->
@endsection
