  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">Menú</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img srcset="{{URL::to('/img/integra.png')}}" class="img-circle" alt="User Image"/>
        </div>
        <div class="info">
            @if (Auth::guest())
                <a href="#" class="d-block">InfyOm</a>
            @else
                <a href="#" class="d-block">{{ Auth::user()->usuario }}</a>
            @endif
            <!-- Status -->
            <a href="#" class="font-weight-light"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @include('layouts.menu')
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>