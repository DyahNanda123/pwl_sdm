    <div class="sidebar">
    
      <div class="user-panel mt-3 pb-3 mb-3 d-flex flex">
        <div class="image">
          <img src="{{ asset('image/profile.jpg') }}" alt="Profile Picture" class="brand-image img-circle elevation-3" style="opacity: .8; width: 35px; height: 35px;">
        </div>
        <div class="info">
            <a class="d-block" href="#" href="#Nabila Hasna">22241760077 - Nabila H </a>
        </div>
    </div>
      <!-- SidebarSearch Form -->
      <div class="form-inline mt-2">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- Sidebar Menu-->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link {{ $activeMenu == 'dashboard' ? 'active' : '' }} ">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-header">Data Kegiatan</li>
              <li class="nav-item">
                <a href="{{ url('/kategori') }}" class="nav-link {{ $activeMenu == 'kategori' ? 'active' : '' }} ">
                    <i class="nav-icon far fa-bookmark"></i>
                    <p>Kategori Kegiatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/kegiatan') }}" class="nav-link {{ $activeMenu == 'kegiatan' ? 'active' : '' }} ">
                    <i class="nav-icon far fa-calendar"></i>
                    <p>Daftar Kegiatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/detailkegiatan') }}" class="nav-link {{ $activeMenu == 'detailkegiatan' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-book-open"></i>
                    <p>Detail Kegiatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/progres') }}" class="nav-link {{ $activeMenu == 'progres' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-chart-line"></i>
                    <p>Progres Kegiatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/detailprogres') }}" class="nav-link {{ $activeMenu == 'detailprogres' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-chart-bar"></i>
                    <p>Detail Progres</p>
                </a>
              </li>
              <!-- Menambahkan Menuuuu Logout -->
              <li class="nav-header">Logout</li>
              <li class="nav-item">
                <a href="{{ url('logout') }}" class="nav-link"
                   style="background-color: red; color: white;"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   <i class="nav-icon fas fa-sign-out-alt"></i>
                   <p>Logout</p>
                </a>
                <form id="logout-form" action="{{ url('logout') }}" method="GET" style="display: none;">
                </form>
              </li> 
        </ul>
      </nav>
    </div>
