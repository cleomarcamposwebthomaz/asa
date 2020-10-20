@extends('front.layouts.master')

@section('title', !empty($category->name) ? $category->name : $appSetting['property_page_title']['value'])

@section('breadcrumb')
    {{ Breadcrumbs::render('site:property') }}
@endsection

@section('content') 
  @if (!empty($category))
  <div class="bg-light text-center pt-3 pb-3">
    <h5 class="f-black text-dark text-uppercase">
      {{ $category->name }}
    </h5>
  </div>
  @else
  <div class="bg-light text-center pt-3 pb-3">
    <h5 class="f-black text-dark text-uppercase">
      {{ $appSetting['property_page_title']['value'] }}
    </h5>
  </div>
  @endif

  <div class="container">
    @yield('breadcrumb')
  </div>

  <div class="container mt-0 mt-md-0 listProperties mb-5">

    <div class="row">
      <div class="col-sm-4 col-xl-3 mb-1 md-md-5 block-filter">

        <div class="widget-filter">
            <div class="d-block d-sm-none">
              <div class="header d-flex justify-content-between align-items-center mb-3 border-bottom close-modal-filter">
                <h6 class="text-danger text-700">{{ $appSetting['property_page_title']['value'] }}</h6>
                <button class="btn btn-show-search">
                    <i class="fas fa-search"></i>
                </button>
              </div>              
            </div>
          
            @include('front.pages.property._partials.filter')            
        </div>
      </div> <!-- left -->

      <div class="col-sm-8 col-xl-9">

        <div class="text-center loading-property mb-5" style="display: none;">
          <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
          </div>
        </div>

        <div class="filter-actives"></div>

        <div class="row" id="list-properties">
          <div class="col-sm-12">
            <h5 class="f-black text-dark text-uppercase pb-2">{{ $total }} Encontrados</h5>
          </div>
          
          @each('front.pages.property._partials.property', $properties, 'property')

          <div class="col-sm-12">
            {{ $properties->appends(request()->query())->links() }}
          </div>
        </div>
      </div> <!-- right -->
    </div>
    
  </div>
@endsection