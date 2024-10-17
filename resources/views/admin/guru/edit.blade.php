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
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Form Guru</div>
                  </div>
                <form action="{{route('guru-update',$gurus)}}" method="POST" enctype="multipart/form-data">
                  @method('patch')
                    @csrf
                  <div class="card-body"> 
                    <div class="row">
                      <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                          <label for="namajurusan">Nama Guru</label>
                          <input
                            type="text"
                            class="form-control form-control"
                            id="namajurusan"
                            placeholder="Masukkan Nama guru"
                            name="nama" value="{{$gurus->nama}}"/>
                        </div>
                        <div class="form-group">
                          <label>Pilih Jurusan Mengajar</label>
                          @foreach ($jurusans as $jurusan)
                              <div class="form-check">
                                  <input
                                      class="form-check-input"
                                      type="checkbox"
                                      name="jurusan_ids[]"
                                      value="{{ $jurusan->id }}"
                                      id="jurusan_{{ $jurusan->id }}"
                                      @if(in_array($jurusan->id, $selectedJurusanIds)) checked @endif
                                  />
                                  <label class="form-check-label" for="jurusan_{{ $jurusan->id }}">
                                      {{ $jurusan->nama }}
                                  </label>
                              </div>
                          @endforeach

                      </div>
                        <div class="form-group">
                          <label for="jabatan">Jabatan Guru</label>
                          <input
                            type="text"
                            class="form-control form-control"
                            id="jabatan"
                            placeholder="Masukkan Jabatan"
                            name="jabatan" value="{{$gurus->jabatan}}"/>
                        </div>
                        <div class="form-group">
                          <label for="fotojurusan">Foto Jurusan</label>
                          <input
                            type="file"
                            class="form-control form-control"
                            id="fotojurusan"
                            placeholder="Masukkan Foto Guru"
                            name="gambar"/>
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
