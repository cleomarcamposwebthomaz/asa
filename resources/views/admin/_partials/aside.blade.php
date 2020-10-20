<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/admin" class="brand-link">
    <img src="{{ asset('assets/admin/img/logo-thomaz.png') }}" alt="" class="img-fluid pl-4" width="200">
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

      <div class="info">
        @auth
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        @else
          <a href="#" class="d-block">
            Cleomar Campos
          </a>
        @endauth
      </div>
    </div>

    @include('admin._partials.sidebar')
  </div>
  <!-- /.sidebar -->
</aside>
