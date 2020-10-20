@extends('front.layouts.master')

@section('title', $post->title)

@section('breadcrumb')
    {{ Breadcrumbs::render('site:post', $post) }}
@endsection

@section('content')
<section id="post-show" class="pb-5">
  <div class="bg-light text-center pt-3 pb-3">
    <h3 class="f-black text-dark">
      {{ $post->title }}
    </h3>
  </div>

  <div class="container">
    @yield('breadcrumb')
  </div>

  <div class="container pt-3">
    {!! $post->content !!}
  </div>
</section>
@endsection