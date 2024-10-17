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
                    <div class="card-title">Form Program Kesiswaan</div>
                  </div>
                <form action="{{route('kesiswaan-update',$kesiswaans)}}" method="POST" enctype="multipart/form-data">
                  @method('patch')
                    @csrf
                  <div class="card-body"> 
                    <div class="row">
                      <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                          <label for="nama_program">Nama Program</label>
                          <input
                            type="text"
                            class="form-control form-control"
                            id="nama_program"
                            placeholder="Masukkan Nama Program"
                            name="nama_program" value="{{$kesiswaans->nama_program}}"/>
                        </div>
                        <div class="form-group">
                          <label for="penanggung_jawab">Penanggung Jawab</label>
                          <input
                            type="text"
                            class="form-control form-control"
                            id="penanggung_jawab"
                            placeholder="Masukkan Nama Penanggung Jawab"
                            name="penanggung_jawab" value="{{$kesiswaans->penanggung_jawab}}"/>
                        </div>
                        <div class="form-group">
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
                      </div>
                      <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                          <label for="foto_anggota">Foto Anggota</label>
                          <input
                            type="file"
                            class="form-control form-control"
                            id="foto_anggota"
                            placeholder="Masukkan Foto Anggota"
                            name="foto_anggota"/>
                        </div>
                        <div class="form-group">
                          <label for="foto_program">Foto Program</label>
                          <input
                            type="file"
                            class="form-control form-control"
                            id="foto_program"
                            placeholder="Masukkan Foto Program"
                            name="foto_program"/>
                        </div>
                        <div class="form-group">
                            <label for="isi">Deskripsi Program</label>
                            <textarea class="form-control" id="isi" rows="5" name="deskripsi_program">{{$kesiswaans->deskripsi_program}}
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

