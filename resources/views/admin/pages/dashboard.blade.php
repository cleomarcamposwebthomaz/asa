@extends('admin.layouts.master')

@section('title', 'Painel de Controle')

@section('content')


<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{ $totalProperties }}</h3>
        <p>Imóveis</p>
      </div>
      <div class="icon">
        <i class="fas fa-building"></i>
      </div>
      <a href="{{ route('admin.property.index') }}" class="small-box-footer">Ver Mais <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{ $totalUsers }}</h3>
        <p>Usuários</p>
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
      <a href="{{ route('admin.user.index') }}" class="small-box-footer">Ver mais <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{ $totalCategories }}</h3>
        <p>Categorias</p>
      </div>
      <div class="icon">
        <i class="fas fa-asterisk"></i>
      </div>
      <a href="{{ route('admin.category.index') }}" class="small-box-footer">Ver mais  <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>{{ $totalPosts }}</h3>
        <p>Posts</p>
      </div>
      <div class="icon">
        <i class="fas fa-tag"></i>
      </div>
      <a href="{{ route('admin.post.index') }}" class="small-box-footer">Ver mais <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>

<script>
  (function(w,d,s,g,js,fs){
    g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
    js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
    js.src='https://apis.google.com/js/platform.js';
    fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
  }(window,document,'script'));
</script>

<div class="col-sm-12 pt-4 pb-4 card">
  {!! Form::open(['method' => 'get', 'class' => 'form-inline d-flex justify-content-end']) !!}
  <div class="form-group">
    <label for="" class="mr-2">Data de Início</label>
    {!! Form::date('start', Request::get('start'), ['class' => 'form-control']) !!}
  </div>
  <div class="form-group ml-2">
    <label for="" class="mr-2">Até</label>
    {!! Form::date('end', Request::get('end'), ['class' => 'form-control']) !!}
  </div>
  <button class="btn btn-warning ml-2">
    <i class="fas fa-search"></i>
  </button>
  {!! Form::close() !!}
</div>

@if (empty(Request::get('start')))
    <h3>Últimos 30 dias</h3>
@else
<h3>Vísitas de {{ date('d/m/Y', strtotime(Request::get('start'))) }} até {{ date('d/m/Y', strtotime(Request::get('end'))) }}</h3>
@endif
<div class="col-sm-12 card w-100">
  <div id="chart-1-container">
    <div class="p-5 text-center">
      <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
      </div>    
    </div>
  </div>
</div>

<div id="chart-2-container"></div>

<script>

  gapi.analytics.ready(function() {
  
    /**
     * Authorize the user with an access token obtained server side.
     */
    gapi.analytics.auth.authorize({
      'serverAuth': {
        'access_token': '{{ $accesstoken }}'
      }
    });
    
    var startDate = "{{ !empty(Request::get('start')) ? Request::get('start') : '30daysAgo' }}"
    var endDate = "{{ !empty(Request::get('end')) ? Request::get('end') : 'yesterday' }}"
  
    /**
     * Creates a new DataChart instance showing sessions over the past 30 days.
     * It will be rendered inside an element with the id "chart-1-container".
     */
    var dataChart1 = new gapi.analytics.googleCharts.DataChart({
      query: {
        'ids': 'ga:{{ $ga_id }}', // <-- Replace with the ids value for your view.
        'start-date': startDate,
        'end-date': endDate,
        'metrics': 'ga:sessions,ga:users',
        'dimensions': 'ga:date'
      },
      chart: {
        'container': 'chart-1-container',
        'type': 'LINE',
        'options': {
          'width': '100%'
        }
      }
    });
    dataChart1.execute();
  });
</script>

@endsection