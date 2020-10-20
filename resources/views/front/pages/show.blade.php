@extends('front.layouts.master')

@section('title', $page->title)

@section('content')
<section id="page-show" class="pb-5">
  <div class="bg-light text-center pt-3 pb-3">
    <h3 class="f-black text-dark">
      {{ $page->title }}
    </h3>
  </div>

  <div class="container pt-3">
    {!! $page->content !!}
  </div>
</section>
@endsection