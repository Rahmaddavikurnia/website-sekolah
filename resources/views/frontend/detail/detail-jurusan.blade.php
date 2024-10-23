@include('frontend.master.header')

<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
    @include('frontend.master.navbar')
	
	<!--Page Title-->
    <section class="page-title" style="background-image:url('{{asset('storage/jurusan/' .$jurusanss->foto)}}')">
    	<div class="auto-container">
        	<h1>{{$jurusanss->nama}}</h1>
            <ul class="page-breadcrumb">
            	<li><a href="{{route('home')}}">home</a></li>
                <li>{{$jurusanss->nama}}</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
	
	<!--Portfolio Single Section-->
	<section class="portfolio-single-section">
		<div class="auto-container">
			<div class="row clearfix">
			
				<!--Image Column-->
				<div class="image-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="image">
							<img src="{{asset('storage/jurusan/' .$jurusanss->foto)}}" alt="" />
						</div>
						<div class="image">
							<img src="{{asset('storage/jurusan/kegiatan/'.$jurusanss->kegiatan)}}" alt="" />
						</div>
					</div>
				</div>
				
				<!--Content Column-->
				<div class="content-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<h2>{{$jurusanss->nama}}</h2>
						<div class="title"></div>
						<div class="text">
							<p class="mb-3">
                                @php
                                    // Membagi deskripsi menjadi paragraf berdasarkan batas karakter
                                    $paragraphs = explode("\n", wordwrap($jurusanss->deskripsi, 300, "\n"));
                                @endphp

                                @foreach ($paragraphs as $paragraph)
                                    <p>{{ $paragraph }}</p> <!-- Menampilkan setiap paragraf -->
                                @endforeach
                            </p> 

                            <div class="feature-block-two style-two">
								<div class="inner-box">
									<h3><a href="#">Peluang Karir {{$jurusanss->nama}}</a></h3>
                                    @if ($jurusanss->peluangkarir->isEmpty())
                                        <p>Tidak ada peluang karir untuk jurusan ini.</p>
                                    @else
                                        <ul class="list-style-two">
                                            @foreach ($jurusanss->peluangkarir as $item)
                                                <li>{{$item->nama}}</li>
                                            @endforeach
                                        </ul>
                                    @endif
								</div>
							</div>

                            <div class="feature-block-two style-two">
								<div class="inner-box">
									<h3><a href="#">Kurikulum jurusan {{$jurusanss->nama}} yang di ajarkan</a></h3>
                                    @if ($jurusanss->kurikulum->isEmpty())
                                        <p>Tidak ada kurikulum yang diajarkan untuk jurusan ini.</p>
                                    @else
                                        <ul class="list-style-two">
                                            @foreach ($jurusanss->kurikulum as $item)
                                                <li>{{$item->nama}}</li>
                                            @endforeach
                                        </ul>
                                    @endif
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>  
			
			<!--New Posts-->
			<div class="new-posts clearfix">
                @if ($previousJurusan)
                    <a href="{{route('detail-jurusan',$previousJurusan->slug)}}" class="prev-post"><span class="icon fa fa-caret-left"></span> Jurusan Sebelumnya </a>
                @endif
                @if ($nextJurusan)
                    <a href="{{route('detail-jurusan',$nextJurusan->slug)}}" class="next-post"><span class="icon fa fa-caret-right"></span> Jurusan Selanjutnya </a>
                @endif
			</div>
			
		</div>
	</section>
	<!--End Portfolio Single Section-->
	
	
	@include('frontend.master.footer')
	
</div>
<!--End pagewrapper--><!--Scroll to top--><div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>

@include('frontend.master.foot')

</body>
</html>