<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Admin Page</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="{{asset('admin/assets/img/kaiadmin/favicon.ico')}}"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    <script src="{{asset('admin/assets/js/plugin/webfont/webfont.min.js')}}"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["{{asset('admin/assets/css/fonts.min.css')}}"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/plugins.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/kaiadmin.min.css')}}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/demo.css')}}" />
  </head>
<body>
    <div class="wrapper">
      @include('admin.master.sidebar')

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="../index.html" class="logo">
                <img
                  src="../assets/img/kaiadmin/logo_light.svg"
                  alt="navbar brand"
                  class="navbar-brand"
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
            <div class="page-header">
              <h3 class="fw-bold mb-3">Forms</h3>
              <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                  <a href="#">
                    <i class="icon-home"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Forms</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Basic Form</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Form Kelas</div>
                  </div>
                <form action="{{route('kelas-update', $kelass)}}" method="POST" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                  <div class="card-body"> 
                    <div class="row">
                      <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                          <label for="namakelas">Nama Kelas</label>
                          <input
                            type="text"
                            class="form-control form-control"
                            id="namakelas"
                            placeholder="Masukkan Nama Kelas"
                            name="nama_kelas" value="{{$kelass->nama_kelas}}"/>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Pilih Jurusan</label>
                            <select
                              class="form-select form-control"
                              id="jurusan"
                              name="jurusan_id">
                            <option value="{{$kelass->jurusan_id}}">{{$kelass->jurusan->nama}}</option>
                              @foreach ($jurusans as $item)
                                  <option value="{{$item->jurusan_id}}">{{$item->nama}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="card-action">
                    <button class="btn btn-success">Simpan</button>
                    <button class="btn btn-danger">Cancel</button>
                  </div>
                 </form>
                </div>
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
