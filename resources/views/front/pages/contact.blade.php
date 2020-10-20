@extends('front.layouts.master')

@section('title', 'Entre em Contato')

@section('breadcrumb')
    {{ Breadcrumbs::render('site:contact') }}
@endsection

@section('content')
<section id="page-contact">
  <div class="bg-light text-center pt-3 pb-3">
    <h5 class="f-black text-dark text-uppercase">
      {{ __('Entre em Contato') }}
    </h5>
  </div>

  <div class="container">
    @yield('breadcrumb')
  </div>

  <div class="container pt-4">

    <div class="row">
      <div class="col-sm-7">
        <h5 class="text-primary text-bold mb-3">{{ __('Envie uma mensagem') }}</h5>
        {!! Form::open(['url' => route('contact.store')]) !!}

        @include('includes.flash-message')
        
        @include('includes.form.control', [
          'name' => 'name',
          'options' => [
            'required' => true,
            'placeholder' => __('Nome'),
          ]
        ])

        @include('includes.form.control', [
          'name' => 'subject',
          'options' => [
            'required' => true,
            'placeholder' => __('Assunto'),
          ]
        ])

        @include('includes.form.control', [
          'name' => 'phone',
          'options' => [
            'required' => true,
            'placeholder' => __('Telefone/Celular'),
            'data-usemask' => 'phone',
          ]
        ])
        
        @include('includes.form.control', [
          'name' => 'email',
          'options' => [
            'required' => true,
            'placeholder' => __('E-mail'),
          ]
        ])
        
        @include('includes.form.control', [
          'name' => 'message',
          'type' => 'textarea',
          'options' => [
            'required' => true,
            'placeholder' => __('Mensagem'),
            'rows' => 4,
          ]
        ])
        
        <button class="btn btn-primary rounded-0 shadow">
          <i class="fas fa-chevron-right"></i>
          {{ __('Enviar') }} 
        </button>
        
        {!! Form::close() !!}   
      </div> <!-- left -->

      <div class="col-sm-4 pt-4 pt-sm-1">
        <div>
          <h5 class="text-danger">{{ __('Fale Conosco') }}</h3>
            <div class="text-dark pt-1">
                <p class="d-flex align-items-center">
                  <i class="fas fa-phone mr-2 text-primary"></i> {!! nl2br($appSetting['phones']['value']) !!}
                </p>
              <p><i class="fas fa-envelope mr-2 text-primary"></i> {{ $appSetting['email']['value'] }} </p>
            </div>
    
            <h5 class="text-danger">Onde Estamos</h3>
            <address class="text-dark">
              <i class="fas fa-map-marker text-primary mr-2"></i> 
              {{ $appSetting['address']['value'] }}
            </address>          
        </div>
      </div>

    </div>
  </div>

  <div class="bg-light mt-5 pt-4 pb-4 map_iframe">
    <div class="container">
        <div class="col-sm-12">
            <h5 class="text-danger">Nossa Localização</h3>
            {!! $appSetting['map_iframe_code']['value'] !!}
        </div>
    </div>        
</div>

</section>
@endsection