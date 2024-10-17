@include('admin.master.header')
<body>
<div class="wrapper">
    {{-- @include('admin.master.sidebar') --}}
<div class="main-panel">
  <div class="row">
    <div class="col-md-9">
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
            minimumInputLength: 1,
            placeholder: 'Cari siswa...',
            allowClear: true
        });
    });
    </script>
</body>
</html>
