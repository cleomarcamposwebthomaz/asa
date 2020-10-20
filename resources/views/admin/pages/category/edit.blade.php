@extends('admin.layouts.master')

@section('title', 'Categorias')

@section('breadcrumb')
    {{ Breadcrumbs::render('category:edit') }}
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">{{ __('Editar Categoria') }}</h3>
    </div>
    <!-- /.card-header -->
    {!! Form::model($category, ['route' => ['admin.category.update', $category->id], 'method' => 'PATCH']) !!}
      <div class="card-body">
        @include('admin.pages.category._partials.form')
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        @include('includes.form.bottom', ['url' => route('admin.category.index')])
      </div>
      <!-- /.card-footer -->
    {!! Form::close() !!}
  </div>
  <!-- /.card -->
@endsection
