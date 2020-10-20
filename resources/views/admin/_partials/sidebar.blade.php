<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    @foreach (config('admin.menu') as $menu)
      <li class="nav-item{{ !empty($menu['submenu']) ? ' has-treeview' : '' }}">
          <a href="{{ !empty($menu['url']) ? $menu['url'] : 'javascript:;' }}" class="nav-link {{ !empty($menu['submenu']) ? ' has-tree' : '' }}">
              <i class="{{ !empty($menu['icon']) ? $menu['icon'] : 'far fa-circle' }} nav-icon"></i>
              <p>
                  {{ $menu['name'] }}
                  @if (!empty($menu['submenu']))
                      <i class="right fas fa-angle-left"></i>
                  @endif

                  @if (!empty($menu['rightIcon']))
                      <i class="right {{ $menu['rightIcon'] }}"></i>
                  @endif
              </p>
          </a>

          @if (!empty($menu['submenu']))
              <ul class="nav nav-treeview">
                  @foreach ($menu['submenu'] as $menu)
                      <li class="nav-item">
                          <a href="{{ $menu['url'] }}" class="nav-link">
                              <i class="{{ !empty($menu['icon']) ? $menu['icon'] : 'far fa-circle' }} nav-icon"></i>
                              <p>{{ $menu['name'] }}</p>

                              @if (!empty($menu['rightIcon']))
                                  <i class="right {{ $menu['rightIcon'] }}"></i>
                              @endif
                          </a>
                      </li>
                  @endforeach
              </ul>
          @endif
      </li>
    @endforeach


</nav>
<!-- /.sidebar-menu -->
