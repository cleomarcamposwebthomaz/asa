@extends('admin.layouts.master')

@section('title', 'Páginas')

@section('breadcrumb')
    {{ Breadcrumbs::render('page:edit') }}
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">{{ __('Editar Página') }}</h3>
    </div>
    <!-- /.card-header -->
    {!! Form::model($page, ['route' => ['admin.page.update', $page->id], 'method' => 'PATCH']) !!}
      <div class="card-body">
        @include('admin.pages.cms._partials.form')
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        @include('includes.form.bottom', ['url' => route('admin.page.index')])
      </div>
      <!-- /.card-footer -->
    {!! Form::close() !!}
  </div>
  <!-- /.card -->
@endsection
