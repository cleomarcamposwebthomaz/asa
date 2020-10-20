@extends('admin.layouts.master')

@section('title', 'Banners')

@section('breadcrumb')
    {{ Breadcrumbs::render('banner:edit') }}
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">{{ _('Editar Banner') }}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    {!! Form::model($banner, ['route' => ['admin.banner.update', $banner->id], 'method' => 'PATCH', 'files' => true]) !!}
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
