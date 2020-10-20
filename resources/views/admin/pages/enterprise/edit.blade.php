@extends('admin.layouts.master')

@section('title', 'Equipe Empreendimentoes')

@section('breadcrumb')
    {{ Breadcrumbs::render('enterprise:edit') }}
@endsection

@section('content')
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">{{ __('Editar Empreendimento') }}</h3>
  </div>
  <!-- /.card-header -->
  {!! Form::model($enterprise, ['route' => ['admin.enterprise.update', $enterprise->id], 'method' => 'PATCH', 'files' => true, 'novalidate' => true]) !!}
    <div class="card-body">
      @include('admin.pages.enterprise._partials.form')
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      @include('includes.form.bottom', ['url' => route('admin.enterprise.index')])
    </div>
    <!-- /.card-footer -->
  {!! Form::close() !!}
</div>

<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Enviar Fotos</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @component('includes.form.dropzone', [
          'form' => [
            'url' => route('admin.enterprise.photo.store', [
              'enterprise' => $enterprise->id
            ])
          ]
        ])
        <input type="hidden" name="enterprise_id" value="{{ $enterprise->id }}">
        @endcomponent
      </div>

      <div class="modal-footer justify-content-end">
        <button type="button" class="btn btn-primary" onclick="location.reload()">Concluir</button>
      </div>

    </div>
    <!-- /.modal-content -->
  </div>
</div>  
@endsection
