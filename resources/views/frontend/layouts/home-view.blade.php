@include('frontend.master.header')
<body>

<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
   @include('frontend.master.navbar')
    <!--Main Slider-->
    <section class="main-slider">
    	
        <div class="main-slider-carousel owl-carousel owl-theme">
            
            <div class="slide" style="background-image:url(storage/images/foto1.jpg)">
                <div class="auto-container">
                	<div class="content centered">
                   		<h3 class="style-three">Selamat Datang</h3>
                   		<h2 class="style-two">SMK Negeri 4 Payakumbuh <br> BlueTech IT School</h2>
                    	<div class="link-box">
							<a href="#" class="theme-btn btn-style-five">Lihat selengkapnya</a>
						</div>
                    </div>
                </div>
            </div>
            
            <div class="slide" style="background-image:url(storage/images/foto2.jpg)">
                <div class="auto-container">
                	<div class="content centered">
                   		<h3 class="style-three">Get The Success You Need</h3>
                   		<h2 class="style-two">Engineered your Business <br> taking to next level</h2>
                    	<div class="link-box">
							<a href="#" class="theme-btn btn-style-five">Lihat selengkapnya</a>
						</div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!--End Main Slider-->
	
	<section class="about-section">
		<div class="auto-container">
			<div class="row clearfix">
				
				<!--Title Column-->
				<div class="title-column col-lg-5 col-md-12 col-sm-12">
					<div class="inner-column">
						<!--Sec Title-->
						<div class="sec-title">
							<h2>Tentang SMKN 4</h2>
						</div>
						<div class="text">SMK Negeri 4 Payakumbu merupakan sekolah berbasis IT satu satu nya di Payakumbuh yang berfokuskan kepada teknologi dan informasi. SMK Negeri 4 Payakumbuh merupakan sekolah PK(Pusat Keunggulan) satu-satu nya yang ada di kota Payakumbuh.</div>
						<a href="{{route('home')}}" class="theme-btn btn-style-five">Lihat Selengkapnya</a>
					</div>
				</div>
				
				<!--Video Column-->
				<div class="video-column col-lg-7 col-md-12 col-sm-12">
					<div class="inner-column wow fadeInRight" data-wow-delay="600ms" data-wow-duration="1500ms">
						
						<!--Video Box-->
                        <div class="video-box">
                            <figure class="image">
								<iframe width="640" height="360" src="https://www.youtube.com/embed/4sz62gQ3eM0" frameborder="0" allowfullscreen></iframe>
                            </figure>
                            <a href="https://youtu.be/4sz62gQ3eM0" class="lightbox-image overlay-box"><span class="flaticon-arrow"></span></a>
                        </div>
						
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!--End About Section-->
	
	<!--Task Section-->
	<section class="task-section">
		<div class="auto-container">
			<div class="row clearfix">
				
				<!--Image Column-->
				<div class="image-column col-lg-4 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="image">
							<img src="storage/images/kepala.png" alt="" />
						</div>
					</div>
				</div>
				
				<!--Content Column-->
				<div class="content-column col-lg-8 col-md-12 col-sm-12">
					<div class="inner-column">
						<h2>Sambutan dari kepala <br> SMK Negeri 4 Payakumbuh</h2>
						
						<!--Featured Block Two-->
						<div class="feature-block-two alternate">
							<div class="inner-box">
								<h3><a href="#">Assalamu'alakum wr.wb</a></h3>
									<div class="text">
									Puji syukur kita panjatkan kehadirat Allah SWT atas segala limpahan rahmat, taufiq dan hidayah-Nya, sehingga saya mampu menuliskan kata sambutan Kepala sekolah dalam rangka penerbitan website sekolah SMK Negeri 4 Payakumbuh sebagai sarana informasi dan komunikasi up date sekolah ini.

									Perkembangan Ilmu Pegetahuan dan teknologi dari tahun ke tahun harus diakui terus mengalami peningkatan dan ini adalah bukti dari proses pendidikan yang dilakukan pada setiap jenjang pendidikan dan nyata dalam dunia kerja dewasa ini. Dari perkembangan ini kita dibawa untuk mampu beradaptasi, berprestasi dan bersaing di era kompetitif ini.

									Selain itu juga website juga dapat menjadi sarana promosi sekolah yang cukup efektif. Berdasarkan hal tersebut saya harapkan nantinya berbagai kegiatan positif sekolah (intrakurikuler & ekstrakurikuler) dapat diunggah dari website SMK Negeri 4 Payakumbuh sehingga masyarakat dapat mengetahui kegiatan-kegiatan dan prestasi-prestasi yang telah berhasil diraih oleh sekolah ini.

									Besar harapan kami, profil SMK Negeri 4 Payakumbuh ini dapat memberi manfaat bagi semua pihak yang ada dilingkup Pendidikan dan pemerhati pendidikan secara khusus bagi civitas akademika SMK Negeri 4 Payakumbuh.

									<br><br>Wassalamu’alikum Wr. Wb.
									</div>
							</div>
						</div>
						
					</div>
				</div> 	
				
			</div>
		</div>
	</section>
	<!--End Task Section-->

	<section class="news-section-four">
		<div class="auto-container">
			<!--Sec Title-->
			<div class="sec-title">
				<h2>Artikel Terbaru</h2>
			</div>
			
			@foreach ($artikelnew as $item)
				<div class="news-block-four">
					<div class="inner-box">
						<div class="row clearfix">
						
							<!--Image Column-->
							<div class="image-column col-lg-6 col-md-12 col-sm-12">
								<div class="inner-column">
									<div class="image">
										<a href="blog-single.html"><img src="{{asset('storage/images/artikel/'.$item->thumbnail)}}"  alt="" /></a>
									</div>
								</div>
							</div>
							<!--Content Column-->
							<div class="content-column col-lg-6 col-md-12 col-sm-12">
								<div class="inner-column">
									<ul class="post-info">
										<li>{{$item->tanggal_terbit}}</li>
										<li>{{$item->kategori_type}}</li>
									</ul>
									<h3><a href="{{route('detail-artikel',$item->slug)}}">{{$item->judul_artikel}}</a></h3>
									<div class="text">{{ Str::limit($item->isi_artikel, 300, '...') }}</div>
									<a class="read-more" href="{{route('detail-artikel',$item->slug)}}"><span class="arrow fa fa-angle-right"></span>Lihat selengkapnya</a>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				
			@endforeach
			<!--News Block Four-->
			<!--Button Box-->
			<div class="button-box text-center">
				<a href="{{route('all-artikel')}}" class="theme-btn btn-style-five">Semua Artikel</a>
			</div>
			
		</div>
	</section>
	
	<section class="case-section">
		<div class="auto-container">
			<!--Sec Title-->
			<div class="sec-title centered">
				<h2>Prestasi Sekolah</h2>
				<div class="title-text">Prestasi yang di peroleh oleh SMKN 4 Paykumbuh</div>
			</div>
		</div>
		<div class="four-item-carousel owl-carousel owl-theme">
		
			@foreach ($prestasis as $item)
				<div class="case-block">
					<div class="inner-box">
						<div class="image">
							<img src="{{asset('storage/images/prestasi/'.$item->gambar)}}" alt="" />
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="content">
										{{-- <div class="text">{{ $item->deskripsi }}</div> --}}
										<div class="text">{{ Str::limit($item->deskripsi, 250, '...') }}</div>
										<a href="{{route('detail-prestasi',$item->slug)}}" class="read-more"><span class="fa fa-angle-right"></span>Lihat selengkapnya</a>
									</div>
								</div>
							</div>
						</div>
						<div class="lower-box">
							<div class="category">{{$item->kategori}}</div>
							<h3><a href="{{route('detail-prestasi',$item->slug)}}">{{$item->title}}</a></h3>
						</div>
					</div>
				</div>
			@endforeach
		</div>
		<div class="button-box text-center">
			<a href="{{route('all-prestasi')}}" class="theme-btn btn-style-five">Semua Prestasi</a>
		</div>
	</section>
	
	<!--News Section Two-->
	<section class="news-section-three alternate">
		<div class="auto-container">
			<!--Sec Title-->
			<div class="sec-title centered">
				<h2>Kabar Terbaru</h2>
				<div class="title-text">Kabar dan berita yang terbaru dari SMK Negeri 4 Payakumbuh</div>
			</div>
			<div class="row clearfix">
				
				@foreach ($kabarnew as $item)
       			<div class="news-block-three col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="image">
							<a href="{{route('detail-kabar',$item->slug)}}"><img src="{{asset('storage/images/kabar/'.$item->gambar)}}" alt="img" /></a>
						</div>
						<div class="lower-content">
							<ul class="post-info">
								<li>{{$item->tanggal_terbit}}</li>
								<li>{{$item->related_type}}</li>
							</ul>
							<h3><a href="{{route('detail-kabar',$item->slug)}}">{{$item->judul_kabar}}</a></h3>
							<div class="text">{{ Str::limit($item->isi_kabar, 90, '...') }}</div>
							<a class="read-more" href="{{route('detail-kabar',$item->slug)}}"><span class="fa fa-angle-right"></span> Lihat Selengkapnya</a>
						</div>
					</div>
				</div>
        	@endforeach				
			</div>
			<div class="content centered">
				<a href="{{route('all-kabar')}}" class="theme-btn btn-style-five">Semua Kabar</a>
			</div>
		</div>
	</section>
	<!--End News Section Two-->
  @include('frontend.master.footer')
	
</div>
<!--End pagewrapper--><!--Scroll to top--><div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>

@include('frontend.master.foot')

</body>
</html>