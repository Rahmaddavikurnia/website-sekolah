@include('admin.master.header')
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
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Form Kegiatan Humas</div>
                  </div>
                <form action="{{route('humas-store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body"> 
                    <div class="row">
                      <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                          <label for="nama">Judul Kegiatan</label>
                          <input
                            type="text"
                            class="form-control form-control"
                            id="nama"
                            placeholder="Masukkan Nama Kegiatan"
                            name="judul_kegiatan" required/>
                        </div>
                        <div class="form-group">
                          <label for="lokasi">Tanggal kegiatan</label>
                          <input
                            type="date"
                            class="form-control form-control"
                            id="tanggal"
                            placeholder="Masukkan Tanggal Kegiatan"
                            name="tanggal_kegiatan" required/>
                      </div>
                        <div class="form-group">
                          <label for="pihak">Pihak Terkait</label>
                          <input
                            type="text"
                            class="form-control form-control"
                            id="pihak"
                            placeholder="Masukkan Tempat Kegiatan"
                            name="pihak_terkait"/>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                          <label for="tempat">Tempat Kegiatan</label>
                          <input
                            type="text"
                            class="form-control form-control"
                            id="tempat"
                            placeholder="Masukkan Tempat Kegiatan"
                            name="tempat" required/>
                        </div>
                        <div class="form-group">
                          <label for="gambar">Foto Kegiatan</label>
                          <input
                            type="file"
                            class="form-control form-control"
                            id="gambar"
                            placeholder="Masukkan Foto Kegiatan"
                            name="gambar"/>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Kegiatan</label>
                            <textarea class="form-control" id="deskripsi_kegiatan" rows="5" name="deskripsi_kegiatan" required>
                            </textarea>
                          </div>
                      </div>
                    
                    </div>
               
                  </div>
                  <div class="card-action">
                    <button type="submit" class="btn btn-success">Simpan</button>
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