@extends('admin.layouts.master')

@section('title', 'Tipo de Banners')

@section('breadcrumb')
    {{ Breadcrumbs::render('banner-type:edit') }}
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">{{ __('Tipo de Banners') }}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    {!! Form::model($bannerType, ['route' => ['admin.banner-type.update', $bannerType->id], 'method' => 'PATCH', 'files' => true]) !!}
      <div class="card-body">
        @include('admin.pages.banner-type._partials.form')
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
