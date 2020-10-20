@extends('front.layouts.master')

@section('title', 'Blog')

@section('content')
<section id="page-show" class="pb-5">
  <div class="bg-light text-center pt-3 pb-3">
    <h3 class="f-black text-dark text-uppercase">
      Blog
    </h3>
  </div>

  <div class="container pt-5">
    <div class="row">
        @foreach ($posts as $post)
            @include('front.pages.blog._partials.blog')
        @endforeach
    </div>
  </div>

</section>
@endsection