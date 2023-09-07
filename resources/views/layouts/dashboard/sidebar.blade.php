  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      @if (auth()->guard('web')->check()) 
        <li class="nav-item">
          <a href="{{ route('user.home.index') }}" class="nav-link {{ request()->routeIs('user.home.index') ? '' : 'collapsed' }}">
              <i class="bi bi-grid"></i>
              <span>Dashboard</span>
          </a>
      </li>
     @endif
     @if (auth()->guard('admin')->check()) 
        <li class="nav-item">
          <a href="{{ route('admin.home.index') }}" class="nav-link {{ request()->routeIs('admin.home.index') ? '' : 'collapsed' }}">
              <i class="bi bi-grid"></i>
              <span>Dashboard</span>
          </a>
      </li>
     @endif
      @if (auth()->guard('web')->check())
        <li class="nav-item">
            <a href="{{ route('user.formulir.create') }}" class="nav-link {{ request()->routeIs('user.formulir.create') ? '' : 'collapsed' }}">
                <i class="bi bi-file-text"></i>
                <span>Formulir Pendaftaran</span>
            </a>
        </li>
      @endif
      @if (auth()->guard('web')->check())
        <li class="nav-item">
          <a href="{{ route('user.siswa.profile') }}" class="nav-link {{ request()->routeIs('user.siswa.profile') ? '' : 'collapsed' }}">
              <i class="bi bi-person"></i>
              <span>Siswa Profile</span>
          </a>
        </li>
      @endif
      @if (auth()->guard('admin')->check()) 
      <li class="nav-item">
        <a href="{{ route('admin.siswa.index') }}" class="nav-link {{ request()->routeIs('admin.siswa.index') ? '' : 'collapsed' }}">
            <i class="bi bi-mortarboard"></i>
            <span>Data User Siswa</span>
        </a>
      </li>
      @endif
      @if (auth()->guard('admin')->check()) 
      <li class="nav-item">
        <a href="{{ route('admin.keluarga.index') }}" class="nav-link {{ request()->routeIs('admin.keluarga.index') ? '' : 'collapsed' }}">
            <i class="bi bi-people-fill"></i>
            <span>Data Keluarga Siswa</span>
        </a>
      </li>
      @endif
      @if (auth()->guard('admin')->check()) 
      <li class="nav-item">
        <a href="{{ route('admin.sekolah.index') }}" class="nav-link {{ request()->routeIs('admin.sekolah.index') ? '' : 'collapsed' }}">
            <i class="bi bi-bank"></i>
            <span>Data Sekolah Siswa</span>
        </a>
      </li>
      @endif
      @if (auth()->guard('admin')->check()) 
      <li class="nav-item">
        <a href="{{ route('admin.ppdb-settings.index') }}" class="nav-link {{ request()->routeIs('admin.ppdb-settings.index') ? '' : 'collapsed' }}">
            <i class="bi bi-grid"></i>
            <span>Pengaturan Ppdb</span>
        </a>
      </li>
      @endif
    </ul>

  </aside><!-- End Sidebar-->