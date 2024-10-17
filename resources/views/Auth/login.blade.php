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
              <h4></h4>
              <h6 class="font-weight-light">Masuk melanjutkan</h6>
              @if ($errors->any())
              <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{$item}}</li>
                    @endforeach
                </ul>
              </div>
                  
              @endif
              <form class="pt-3" action="{{route('login')}}" method="POST">
                @csrf
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="email">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                  {{-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" onclick="event.preventDefault();
                                        document.getElementById('login-form').submit();">SIGN IN</a> --}}
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">MASUK</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Lupa password?</a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Belum memiliki akun? daftar sini <a href="{{route('regis')}}" class="text-primary">Register</a>
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
@include('Auth.master.foot')
</body>

</html>
