  <div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
        <a href="{{route('home')}}" class="logo">
          <img
            src="{{asset('storage/images/logoblu.png')}}"
            alt="navbar brand"
            class="navbar-brand"
            height="60"
          />
        </a>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
          </button>
          <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
          </button>
        </div>
        <button class="topbar-toggler more">
          <i class="gg-more-vertical-alt"></i>
        </button>
      </div>
      <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <ul class="nav nav-secondary">
          <li class="nav-item">
            <a href="{{route('home-admin')}}">
              <i class="fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">Data Website</h4>
          </li>
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#jurusan">
              <i class="fas fa-layer-group"></i>
              <p>Jurusan</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="jurusan">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('j.create')}}">
                    <span class="sub-item">Tambah Jurusan</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('j.dashboard')}}">
                    <span class="sub-item">Data Jurusan</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#karir">
              <i class="fas fa-street-view"></i>
              <p>Peluang Karir</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="karir">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('peluangkarir-create')}}">
                    <span class="sub-item">Tambah Peluang Karir</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('peluangkarir-dashboard')}}">
                    <span class="sub-item">Data Peluang Karir</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#kelas">
              <i class="fas fa-university"></i>
              <p>Daftar Kelas</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="kelas">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('kelas-create')}}">
                    <span class="sub-item">Tambah Kelas</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('kelas-dashboard')}}">
                    <span class="sub-item">Data Kelas</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#kesiswaan">
              <i class="fas fa-universal-access"></i>
              <p>Program Kesiswaan</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="kesiswaan">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('kesiswaan-create')}}">
                    <span class="sub-item">Tambah Data</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('kesiswaan-dashboard')}}">
                    <span class="sub-item">Data Program Kesiswaan</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#siswa">
              <i class="far fa-address-book"></i>
              <p>Data Siswa</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="siswa">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('siswa-create')}}">
                    <span class="sub-item">Tambah Data</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('siswa-dashboard')}}">
                    <span class="sub-item">Data Siswa</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#prestasi">
              <i class="fas fa-trophy"></i>
              <p>Data Prestasi</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="prestasi">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('prestasi-create')}}">
                    <span class="sub-item">Tambah Data</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('prestasi-dashboard')}}">
                    <span class="sub-item">Data Prestasi</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#kurikulum">
              <i class="fas fa-book-open"></i>
              <p>Data Kurikulum</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="kurikulum">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('kurikulum-create')}}">
                    <span class="sub-item">Tambah Data</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('kurikulum-dashboard')}}">
                    <span class="sub-item">Data Kurikulum</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#sarana">
              <i class="fas fa-school"></i>
              <p>Data Sarana</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="sarana">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('sarana-create')}}">
                    <span class="sub-item">Tambah Data</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('sarana-dashboard')}}">
                    <span class="sub-item">Data Sarana</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#humas">
              <i class="fas fa-user-friends"></i>
              <p>Data Humas</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="humas">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('humas-create')}}">
                    <span class="sub-item">Tambah Data</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('humas-dashboard')}}">
                    <span class="sub-item">Data Kegiatan Humas</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#kabar">
              <i class="fas fa-newspaper"></i>
              <p>Data Kabar</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="kabar">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('kabar-create')}}">
                    <span class="sub-item">Tambah Data</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('kabar-dashboard')}}">
                    <span class="sub-item">Data Kabar</span>
                  </a>
                </li>
              </ul>
            </div>
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#guru">
              <i class="fas fa-user-tie"></i>
              <p>Data Guru</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="guru">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('guru-create')}}">
                    <span class="sub-item">Tambah Data</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('guru-dashboard')}}">
                    <span class="sub-item">Data Guru</span>
                  </a>
                </li>
              </ul>
            </div>
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#artikel">
              <i class="far fa-newspaper"></i>
              <p>Data Artikel</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="artikel">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{route('artikel-create')}}">
                    <span class="sub-item">Tambah Artikel</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('artikel-dashboard')}}">
                    <span class="sub-item">Data Artikel</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- End Sidebar -->