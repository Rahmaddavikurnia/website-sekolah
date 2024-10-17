@include('admin.master.header')
<body>
  <div class="wrapper">
  @include('admin.master.sidebar')

    <div class="main-panel">
      <div class="main-header">
        <div class="main-header-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
              <img
                src="assets/img/kaiadmin/logo_light.svg"
                alt="navbar brand"
                class="navbar-brand"
                height="20"
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
       @include('admin.master.navbar')
      </div>

      <div class="container">
        <div class="page-inner">
          <div
            class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
              <h3 class="fw-bold mb-3">Beranda Admin</h3>
              <h6 class="op-7 mb-2">Selamat Datang, {{Auth::user()->name}}</h6>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-md-3">
              <div class="card card-stats card-round">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-icon">
                      <div
                        class="icon-big text-center icon-primary bubble-shadow-small"
                      >
                        <i class="fas fa-newspaper"></i>
                      </div>
                    </div>
                    <div class="col col-stats ms-3 ms-sm-0">
                      <div class="numbers">
                        <p class="card-category">Artikel Dan Kabar</p>
                        <h4 class="card-title">{{$total}}</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="card card-stats card-round">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-icon">
                      <div
                        class="icon-big text-center icon-info bubble-shadow-small"
                      >
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                    <div class="col col-stats ms-3 ms-sm-0">
                      <div class="numbers">
                        <p class="card-category">Pengguna</p>
                        <h4 class="card-title">{{$jumlahUser}}</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="card card-stats card-round">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-icon">
                      <div
                        class="icon-big text-center icon-success bubble-shadow-small"
                      >
                        <i class="fas fa-trophy"></i>
                      </div>
                    </div>
                    <div class="col col-stats ms-3 ms-sm-0">
                      <div class="numbers">
                        <p class="card-category">Prestasi</p>
                        <h4 class="card-title">{{$jumlahPrestasi}}</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="card card-stats card-round">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-icon">
                      <div
                        class="icon-big text-center icon-secondary bubble-shadow-small"
                      >
                        <i class="far fa-address-book"></i>
                      </div>
                    </div>
                    <div class="col col-stats ms-3 ms-sm-0">
                      <div class="numbers">
                        <p class="card-category">Siswa</p>
                        <h4 class="card-title">{{$jumlahSiswa}}</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <h3 class="fw-bold mb-3">Timeline</h3>
          <div class="row">
            <div class="col-md-12">
              <ul class="timeline">
                <li>
                  <div class="timeline-badge">
                    <i class="far fa-paper-plane"></i>
                  </div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4 class="timeline-title">Tentang halaman admin</h4>
                    </div>
                    <div class="timeline-body">
                      <p>
                       Halaman ini bertujuan untuk menjadi pusat kontrol dalam pengelolan semua data dan informasi tentang website sekolah ini.
                      </p>
                    </div>
                  </div>
                </li>
                <li class="timeline-inverted">
                  <div class="timeline-badge warning">
                    <i class="far fa-bell"></i>
                  </div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4 class="timeline-title">Mussum ipsum cacilds</h4>
                    </div>
                    <div class="timeline-body">
                      <p>
                        Far far away, behind the word mountains, far from the
                        countries Vokalia and Consonantia, there live the
                        blind texts.
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="timeline-badge danger">
                    <i class="icon-close"></i>
                  </div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4 class="timeline-title">Mussum ipsum cacilds</h4>
                    </div>
                    <div class="timeline-body">
                      <p>
                        Far far away, behind the word mountains, far from the
                        countries Vokalia and Consonantia, there live the
                        blind texts.
                      </p>
                    </div>
                  </div>
                </li>
                <li class="timeline-inverted">
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4 class="timeline-title">Mussum ipsum cacilds</h4>
                    </div>
                    <div class="timeline-body">
                      <p>
                        Far far away, behind the word mountains, far from the
                        countries Vokalia and Consonantia, there live the
                        blind texts.
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="timeline-badge info">
                    <i class="icon-tag"></i>
                  </div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4 class="timeline-title">Mussum ipsum cacilds</h4>
                    </div>
                    <div class="timeline-body">
                      <p>
                        Far far away, behind the word mountains, far from the
                        countries Vokalia and Consonantia, there live the
                        blind texts.
                      </p>
                      <hr />
                      <div class="btn-group dropdown">
                        <button
                          type="button"
                          class="btn btn-primary btn-sm dropdown-toggle"
                          data-bs-toggle="dropdown"
                        >
                          <span class="btn-label">
                            <i class="fa fa-cog"></i>
                          </span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <li>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#"
                              >Another action</a
                            >
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"
                              >Something else here</a
                            >
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4 class="timeline-title">Mussum ipsum cacilds</h4>
                    </div>
                    <div class="timeline-body">
                      <p>
                        Far far away, behind the word mountains, far from the
                        countries Vokalia and Consonantia, there live the
                        blind texts.
                      </p>
                    </div>
                  </div>
                </li>
                <li class="timeline-inverted">
                  <div class="timeline-badge success">
                    <i class="icon-credit-card"></i>
                  </div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4 class="timeline-title">Mussum ipsum cacilds</h4>
                    </div>
                    <div class="timeline-body">
                      <p>
                        Far far away, behind the word mountains, far from the
                        countries Vokalia and Consonantia, there live the
                        blind texts.
                      </p>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </div>

    
    @include('admin.master.skin')
  </div>
  @include('admin.master.foot')
</body>
</html>
