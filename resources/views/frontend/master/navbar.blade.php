<header class="main-header header-style-two">
    	
  <!--Header Top Three-->
  <div class="header-top-three">
    <div class="auto-container">
    <div class="inner-container clearfix">
      <!--Top Left-->
      <div class="top-left">
        <ul class="header-info-list">
          <li class="text-white"><span class="icon text-white flaticon-telephone-handle-silhouette"></span>telfon: 800-369-8527</li>
          <li class="text-white"><span class="icon text-white fa fa-envelope"></span>smkn4@gmail.com</li>
        </ul>
      </div>
      <!--Top Right-->
      <div class="top-right">
        <!--Social Box-->
        <ul class="social-box">
          <li class="share text-white">terhubung dengan kami</li>
          <li class="text-white"><a href="#"><span class="text-white fa fa-facebook"></span></a></li>
          <li class="text-white"><a href="#"><span class="text-white fa fa-linkedin"></span></a></li>
          <li class="text-white"><a href="#"><span class="text-white fa fa-stumbleupon"></span></a></li>
          <li class="text-white"><a href="#"><span class="text-white fa fa-pinterest"></span></a></li>
          <li class="text-white"><a href="#"><span class="text-white fa fa-twitter"></span></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
  
  <!--Header-Upper-->
    <div class="header-upper">
      <div class="auto-container">
          <div class="clearfix">
              
              <div class="pull-left logo-box">
                  <div class="logo"><a href="{{route('home')}}"><img src="storage/images/logoblu.png" width="100px" alt="" title=""></a></div>
              </div>
                 
                 <div class="nav-outer clearfix">
                
        <!-- Main Menu -->
        <nav class="main-menu navbar-expand-md">
          <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>

          <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
            <ul class="navigation clearfix">
              <li><a href="{{route('home')}}">Beranda</a></li>
              <li class="dropdown"><a href="#">Tentang Kami</a>
                <ul>
                  <li><a href="{{route('visi-misi')}}">Visi Misi</a></li>
                  <li><a href="{{route('guru-staf')}}">Guru & Staf <Table></Table></a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="#">Program</a>
                <ul>
                  <li class="dropdown"><a href="#">Program Keahlian</a>
                    <ul>
                      @foreach ($jurusans as $item)
                          <li><a href="{{route('detail-jurusan',['slug' => $item->slug])}}">{{$item->nama}}</a></li>
                      @endforeach 
                   </ul>
                  </li>
                  <li><a href="{{route('all-prestasi')}}">Prestasi</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="#">Berita</a>
                <ul>
                  <li><a href="{{route('all-kabar')}}">Kabar</a></li>
                  <li><a href="{{route('all-artikel')}}">Artikel</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="#">Manajemen</a>
                <ul>
                  <li class="dropdown"><a href="#">Kesiswaan</a>
                    <ul>
                      @foreach ($kesiswaans as $item)
                          <li><a href="{{route('detail-kesiswaan',['slug' => $item->slug])}}">{{$item->nama_program}}</a></li>
                      @endforeach 
                   </ul>
                  </li>
                  <li><a href="{{route('kurikulum-view')}}">Kurikulum <Table></Table></a></li>
                  <li><a href="{{route('all-sarana')}}">Sarana</a></li>
                  <li><a href="{{route('all-humas')}}">Humas <Table></Table></a></li>
                </ul>
              </li>
              @auth
                @if (!Auth::check() || Auth::user()->role != 'user')
                  <li class="dropdown"><a href="#">Halaman</a>
                    <ul>
                      <li><a href="{{route('home-admin')}}">Halaman Admin</a></li>
                    </ul>
                  </li>
                @endif
              @endauth
              <li><a href="{{route('kontak-view')}}">Kontak</a></li>
            </ul>
          </div>
          
        </nav>
        
        <!--Button Box-->
        @if (Auth::check())
        <div class="button-box">
          {{-- <a href="{{route('logout')}}" class="theme-btn btn-style-one">Logout</a> --}}
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
            <a href="#" class="theme-btn btn-style-one" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        </div>
        @else
          <div class="button-box">
            <a href="{{route('login')}}" class="theme-btn btn-style-one">Login</a>
          </div>
        @endif
        
        
        <!--Search Box Outer-->
        <div class="search-box-outer">
          <div class="dropdown">
            <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search"></span></button>
            <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">
              <li class="panel-outer">
                <div class="form-container">
                  <form method="GET" action="{{route('search')}}">
                    <div class="form-group">
                      <input type="search" name="keyword" value="" placeholder="Cari Sesuatu....">
                      <button type="submit" class="search-btn"><span class="fa fa-search"></span></button>
                    </div>
                  </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
        
      </div>
               
            </div>
        </div>
    </div>
    <!--End Header Upper-->
    
    <!--Sticky Header-->
    <div class="sticky-header">
      <div class="auto-container clearfix">
          <!--Logo-->
          <div class="logo pull-left">
              <a href="{{route('home')}}" class="img-responsive"><img src="storage/images/logoblu.png" width="100px" alt="" title=""></a>
            </div>
            
            <!--Right Col-->
            <div class="right-col pull-right">
              <!-- Main Menu -->
                <nav class="main-menu navbar-expand-md">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                        <ul class="navigation clearfix">
                          <li><a href="{{route('home')}}">Beranda</a></li>
                          <li class="dropdown"><a href="#">Tentang Kami</a>
                            <ul>
                              <li><a href="{{route('visi-misi')}}">Visi Misi</a></li>
                              <li><a href="{{route('guru-staf')}}">Guru & Staf <Table></Table></a></li>
                            </ul>
                          </li>
                          <li class="dropdown"><a href="#">Program</a>
                            <ul>
                              <li class="dropdown"><a href="#">Program Keahlian</a>
                                <ul>
                                  @foreach ($jurusans as $item)
                                    <li><a href="{{route('detail-jurusan',['slug' => $item->slug])}}">{{$item->nama}}</a></li>
                                  @endforeach
                               </ul>
                              </li>
                              <li><a href="{{route('all-prestasi')}}">Prestasi</a></li>
                            </ul>
                          </li>
                          <li class="dropdown"><a href="#">Berita</a>
                            <ul>
                              <li><a href="{{route('all-kabar')}}">Kabar</a></li>
                              <li><a href="{{route('all-artikel')}}">Artikel <Table></Table></a></li>
                            </ul>
                          </li>
                          <li class="dropdown"><a href="#">Manajemen</a>
                            <ul>
                              <li class="dropdown"><a href="#">Kesiswaan</a>
                                <ul>
                                  @foreach ($kesiswaans as $item)
                                      <li><a href="{{route('detail-kesiswaan',['slug' => $item->slug])}}">{{$item->nama_program}}</a></li>
                                  @endforeach 
                               </ul>
                              </li>
                              <li><a href="{{route('kurikulum-view')}}">Kurikulum <Table></Table></a></li>
                              <li><a href="{{route('all-sarana')}}">Sarana</a></li>
                              <li><a href="{{route('all-humas')}}">Humas <Table></Table></a></li>
                            </ul>
                          </li>
                          @auth
                            @if (!Auth::check() || Auth::user()->role != 'user')
                              <li class="dropdown"><a href="#">Halaman</a>
                                <ul>
                                  <li><a href="{{route('home-admin')}}">Halaman Admin</a></li>
                                </ul>
                              </li>
                            @endif
                          @endauth
                          <li><a href="{{route('kontak-view')}}">Kontak</a></li>
                        </ul>
                    </div>
                </nav><!-- Main Menu End-->
            </div>
            
        </div>
    </div>
    <!--End Sticky Header-->

</header>
<!--End Main Header -->
