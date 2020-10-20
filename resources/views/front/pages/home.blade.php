@extends('front.layouts.master')

@section('title', $appSetting['meta_title']['value'])

@section('content')
  <x-slideshow></x-slideshow>    
  
  <x-basic-filter></x-basic-filter>

  <div class="container mt-3 md-1 mt-md-3 mt-md-md-5 listProperties">
    <div class="heading text-{{ $appSetting['home_align_title']['value'] }} text-primary pb-md-4 pb-1">
      <h3 class="text-primary text-700 text-uppercase d-flex justify-content-between align-items-center">
        {{ $appSetting['propety_fatured_title']['value'] }}

        <button class="btn btn-show-home-filter d-block d-sm-none">
          <i class="fas fa-search"></i>
        </button>
      </h3>
    </div>

    <div class="row">
      @each('front.pages.property._partials.property', $properties, 'property')

      <div class="text-center pb-5 w-100">
        <a href="{{ route('property') }}" class="btn btn-primary btn-lg text-uppercase rounded-0">
          {{ $appSetting['home_button_more_property']['value'] }}
        </a>
      </div>
    </div>
  </div>

  <x-banner type="2"></x-banner>

  <div class="container mt-5 listProperties">
    <div class="heading text-{{ $appSetting['home_align_title']['value'] }} pb-4">
      <h3 class="text-primary text-700 text-uppercase">{{ $appSetting['propety_latest_title']['value'] }}</h3>
    </div>

    <div class="row">
      <x-property type="latest"></x-property>

      <div class="text-center pb-5 w-100">
        <a href="{{ route('property') }}" class="btn btn-primary btn-lg text-uppercase rounded-0">
          {{ $appSetting['home_button_more_property']['value'] }}
        </a>
      </div>
    </div>
  </div>

  <x-banner type="3"></x-banner>

  <div class="bg-light pt-5 pb-5">
    <div class="container">
      <div class="heading text-{{ $appSetting['home_align_title']['value'] }} pb-4">
        <h3 class="text-primary text-700 text-uppercase">{{ $appSetting['broker_title']['value'] }}</h3>
      </div>
      <div class="row">
        <x-broker></x-broker>
      </div>
    </div>
  </div>

  <div class="bg-light pt-1 pb-5">
    <div class="container">
      <div class="heading text-center pb-4">
        <h3 class="text-primary text-700 text-uppercase">BLOG</h3>
      </div>

      <x-posts></x-posts>

      <div class="text-center pb-5 w-100">
        <a href="{{ route('post') }}" class="btn btn-primary btn-lg text-uppercase rounded-0">
          Ver Blog
        </a>
      </div>      
    </div>
  </div>

  <div class="bg-light pt-5 pb-5">
    <div class="container">
      <div class="heading text-center pb-4">
        <h3 class="text-primary text-700 text-uppercase">{{ $appSetting['widget_instagram_title']['value'] }}</h3>
        <h2 class="pb-2"><i class="fab fa-instagram"></i> {{ $appSetting['widget_instagram_id']['value'] }}</h2>
      </div>
      {!! $appSetting['widget_instagram']['value'] !!}
    </div>
  </div>

  <section class="pt-5 pb-5 address-map">
      <div class="bg-white block-address position-relative d-flex align-items-center ">
        <div class="w-100 position-absolute address">
            <address class="card p-5 ml-auto mr-auto d-flex flex-row border-0 shadow">
                <div class="pr-5 d-none d-md-block">
                    <img src="{{ asset('img/gps.png') }}" alt="">
                </div>
                <div>
                    <h1 class="text-danger font-bold">Matriz</h1>
                    <p>
                        {{ $appSetting['address']['value'] }} <br />
                        {!! nl2br($appSetting['phones']['value']) !!}
                    </p>
                    <a href="/contato" class="btn btn-danger">
                        VER LOCALIZAÇÃO
                    </a>
                </div>
            </address>
        </div>
    
        {!! $appSetting['map_iframe_code']['value'] !!}
      </div>
    </section>  
  
@endsection