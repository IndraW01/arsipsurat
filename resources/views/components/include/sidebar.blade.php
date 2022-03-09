<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
      <div class="sidebar-brand-icon">
        <i class="fas fa-clipboard-list"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Arsip Surat</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('home') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
      Arsip
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item {{ request()->routeIs('surat.*') ? 'active' : '' }}">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
          aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-envelope-open-text"></i>
          <span>Arsip Surat</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Menu Surat:</h6>
              <a class="collapse-item {{ request()->routeIs('surat.masuk.*') ? 'active' : '' }}" href="{{ route('surat.masuk.index') }}"><i class="far fa-envelope fa-fw"></i> Surat Masuk</a>
              <a class="collapse-item {{ request()->routeIs('surat.keluar.*') ? 'active' : '' }}" href="{{ route('surat.keluar.index') }}"><i class="far fa-envelope-open fa-fw"></i> Surat Keluar</a>
          </div>
      </div>
  </li>

  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item {{ request()->routeIs('unit.*') ? 'active' : '' }}">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
          aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
          data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Menu Tambahan: </h6>
              <a class="collapse-item {{ request()->routeIs('unit.*') ? 'active' : '' }}" href="{{ route('unit.index') }}"><i class="fas fa-university"></i> Unit</a>
          </div>
      </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
