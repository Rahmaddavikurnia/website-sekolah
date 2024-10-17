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
                    <div class="card-title">Form Prestasi</div>
                  </div>
                <form action="{{route('prestasi-store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body"> 
                    <div class="row">
                      <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                          <label for="nama">Nama Prestasi</label>
                          <input
                            type="text"
                            class="form-control form-control"
                            id="nama"
                            placeholder="Masukkan Nama Prestasi"
                            name="title" required/>
                        </div>
                        <div class="form-group">
                          <label for="siswa">Nama Siswa</label>
                          <select class="form-control form-control" id="siswa" name="id_siswa[]" multiple style="width: 100%" required>
                            <option value="">Pilih Siswa</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="tanggal">Tanggal</label>
                          <input
                            type="date"
                            class="form-control form-control"
                            id="tanggal"
                            placeholder="Masukkan tanggal"
                            name="tanggal"/>
                        </div>
                        {{-- <div class="form-group">
                          <label for="jabatan">Jabatan Guru</label>
                          <input
                            type="text"
                            class="form-control form-control"
                            id="jabatan"
                            placeholder="Masukkan Jabatan"
                            name="jabatan"/>
                        </div> --}}
                        <div class="form-group">
                          <label for="kategori">Kategori Prestasi</label>
                          <input
                            type="text"
                            class="form-control form-control"
                            id="kategori"
                            placeholder="Masukkan Kategori"
                            name="kategori"/>
                        </div>
                        <div class="form-group">
                          <label for="fotojurusan">Foto Prestasi</label>
                          <input
                            type="file"
                            class="form-control form-control"
                            id="fotojurusan"
                            placeholder="Masukkan Foto Prestasi"
                            name="gambar"/>
                        </div>
                        <div class="form-group">
                          <label for="deskripsi">Deskripsi Prestasi</label>
                          <textarea class="form-control" id="deskripsi" rows="5" name="deskripsi" required>
                          </textarea>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#siswa').select2({
            ajax: {
                url: '/siswa/search', // Pastikan ini mengarah ke route yang benar
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        query: params.term,
                    };
                },
                processResults: function (data) {
                    return {
                        results: data.map(function (item) {
                            return {
                                id: item.id,
                                text: item.nama
                            };
                        })
                    };
                },
                cache: true
            },
            minimumInputLength: 10,
            placeholder: 'Cari siswa...',
            allowClear: true
        });
    });
    </script>
  </body>
</html>
