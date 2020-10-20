@extends('admin.layouts.master')

@section('title', 'Anunciantes')

@section('breadcrumb')
    {{ Breadcrumbs::render('advertiser:edit') }}
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">{{ __('Editar Anunciante') }}</h3>
    </div>
    <!-- /.card-header -->
    {!! Form::model($advertiser, ['route' => ['admin.advertiser.update', $advertiser->id], 'method' => 'PATCH']) !!}
      <div class="card-body">
        @include('admin.pages.advertiser._partials.form')
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        @include('includes.form.bottom', ['url' => route('admin.advertiser.index')])
      </div>
      <!-- /.card-footer -->
    {!! Form::close() !!}
  </div>
  <!-- /.card -->
@endsection
