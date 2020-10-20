<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>@yield('title')</title>

      <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
      <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('plugins/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
      <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/dist/assets/owl.carousel.min.css') }}">
      <link rel="stylesheet" href="{{ asset('plugins/fancybox/dist/jquery.fancybox.css') }}">
      <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
      <link rel="stylesheet" href="{{ asset('/css/custom.css') }}">

      @livewireStyles

      <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    </head>
    <body class="{{ !empty($pageName) ? $pageName : 'body' }}">

      @include('front._partials.header')

      <div id="wrapper">
        @yield('content')
      </div> <!-- wrapper -->

      @include('front._partials.footer')
       
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
      <script src="{{ asset('plugins/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
      <script src="{{ asset('plugins/fancybox/dist/jquery.fancybox.min.js') }}"></script>
      <script src="{{ asset('plugins/owl-carousel/dist/owl.carousel.min.js') }}"></script>
      <script src="{{ asset('plugins/maskMoney/dist/jquery.maskMoney.min.js') }}"></script>
      <script src="{{ asset('plugins/jquery-mask/dist/jquery.mask.min.js') }}"></script>
      
      <script src="{{ asset('/js/app.js') }}"></script>
      <script src="{{ asset('/js/custom.js') }}"></script>

      @stack('scripts')
      
      @livewireScripts

    </body>
</html>
