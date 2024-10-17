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
                    <div class="card-title">Form Artikel</div>
                  </div>
                <form action="{{route('artikel-store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body"> 
                    <div class="row">
                      <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                          <label for="nama">Judul Artikel</label>
                          <input
                            type="text"
                            class="form-control form-control"
                            id="nama"
                            placeholder="Masukkan Judul Artikel"
                            name="judul_artikel" required/>
                        </div>
                        <div class="form-group">
                          <label for="terbit">Tanggal Terbit</label>
                          <input
                            type="date"
                            class="form-control form-control"
                            id="terbit"
                            placeholder="Masukkan Tanggal Terbit"
                            name="tanggal_terbit" required/>
                        </div>
                      
                
                        {{-- <!-- Dropdown untuk memilih entitas terkait (related_id) -->
                        <label for="related_id">Pilih Entitas Terkait:</label>
                        <select name="related_id" id="related_id" required>
                            <option value="">-- Pilih Entitas --</option>
                            <!-- Opsi akan diisi berdasarkan pilihan related_type -->
                        </select> --}}
                      </div>
                      <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                          <label for="kategori_type">Terkait Dengan:</label>
                        <select name="kategori_type" id="kategori_type" class="form-select form-control" required">
                            <option value="">-- Pilih Terkait Dengan --</option>
                            <option value="sarana">Sarana</option>
                            <option value="humas">Humas</option>
                            <option value="kesiswaan">Kesiswaan</option>
                            <option value="kurikulum">Kurikulun</option>
                        </select>
                        </div>
                        <div class="form-group">
                          <label for="thumbnail">Foto Artikel</label>
                          <input
                            type="file"
                            class="form-control form-control"
                            id="thumbnail"
                            placeholder="Masukkan Foto Kegiatan"
                            name="thumbnail"/>
                        </div>
                        <div class="form-group">
                            <label for="isi">Isi Artikel</label>
                            <textarea class="form-control" id="isi" rows="5" name="isi_artikel" required>
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

    {{-- <script>
      // Ambil data sarana dan humas dari backend (dikirim dari controller)
      const saranas = @json($saranas);
      const humas = @json($humas);

      // Fungsi untuk mengupdate dropdown 'related_id' berdasarkan pilihan 'related_type'
      function updateRelatedOptions() {
          const relatedType = document.getElementById('related_type').value;
          const relatedIdDropdown = document.getElementById('related_id');

          // Kosongkan dropdown
          relatedIdDropdown.innerHTML = '<option value="">-- Pilih Entitas --</option>';

          let relatedOptions = [];

          if (relatedType === 'sarana') {
              relatedOptions = saranas;
          } else if (relatedType === 'humas') {
              relatedOptions = humas;
          }

          // Tambahkan opsi ke dropdown 'related_id'
          relatedOptions.forEach(option => {
              const newOption = document.createElement('option');
              newOption.value = option.id;
              newOption.textContent = option.nama; // Tampilkan nama sarana atau humas
              relatedIdDropdown.appendChild(newOption);
          });
      }
  </script> --}}

    @include('admin.master.foot')
  </body>
</html>

