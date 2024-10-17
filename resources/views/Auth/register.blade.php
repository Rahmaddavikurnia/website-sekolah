@include('Auth.master.header')

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="storage/images/logoblu.png" alt="logo">
              </div>
              <h6 class="font-weight-light">Mendaftarnya mudah. Hanya perlu beberapa langkah</h6>
              <form class="pt-3" action="{{route('register')}}" method="POST">
                @csrf
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" name="name" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password" placeholder="Password">
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Saya menyetujui semua Syarat & Ketentuan
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  {{-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Registrasi</a> --}}
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Daftar</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Sudah memiliki akun? <a href="login.html" class="text-primary">Masuk</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  @include('Auth.master.foot')
</body>

</html>
