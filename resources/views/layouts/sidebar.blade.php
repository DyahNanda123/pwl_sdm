<div class="sidebar">
    <!-- Sidebar Search Form -->
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
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link {{ ($activeMenu == 'dashboard') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-header">Data Pengguna</li>
            <li class="nav-item">
                <a href="{{ url('/level') }}" class="nav-link {{ ($activeMenu == 'level') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-layer-group"></i>
                    <p>Level User</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/user') }}" class="nav-link {{ ($activeMenu == 'user') ? 'active' : '' }}">
                    <i class="nav-icon far fa-user"></i>
                    <p>Data User</p>
                </a>
            </li>

            <!-- Data Kegiatan -->
            <li class="nav-header">Data Kegiatan</li>
            <li class="nav-item {{ ($activeMenu == 'kategori-kegiatan') ? 'menu-open' : '' }}">
                <a href="{{ url('/kategori-kegiatan') }}" class="nav-link {{ ($activeMenu == 'kategori-kegiatan') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list"></i>
                    <p>Kategori Kegiatan</p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('kategori.kegiatan', 1) }}" class="nav-link {{ ($activeMenu == 'kegiatan-terprogram') ? 'active' : '' }}">
                            <p>Kegiatan Terprogram</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('kategori.kegiatan', 2) }}" class="nav-link {{ ($activeMenu == 'kegiatan-non-terprogram') ? 'active' : '' }}">
                            <p>Kegiatan Non-Terprogram</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('kategori.kegiatan', 3) }}" class="nav-link {{ ($activeMenu == 'kegiatan-non-jti') ? 'active' : '' }}">
                            <p>Kegiatan Non-JTI</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ url('/daftar-kegiatan') }}" class="nav-link {{ ($activeMenu == 'daftar-kegiatan') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-calendar-alt"></i>
                    <p>Daftar Kegiatan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/daftar-dosen') }}" class="nav-link {{ ($activeMenu == 'daftar-dosen') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-tie"></i>
                    <p>Daftar Dosen</p>
                </a>
            </li>
        </ul>
    </nav>
</div>
