@include('frontend.master.header')

<body>

<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
    @include('frontend.master.navbar')
	
    <section class="page-title" style="background-image:url('{{asset('storage/images/sarana/'.$saranas->gambar)}}')">
    	<div class="auto-container">
        	<h1>{{$saranas->nama}}</h1>
            <ul class="page-breadcrumb">
            	<li><a href="{{route('home')}}">home</a></li>
                <li>{{$saranas->nama}}</li>
            </ul>
        </div>
    </section>

    <section class="help-section">
		<div class="auto-container">
			<div class="inner-container clearfix">
				<div class="content-column">
					<div class="inner-column">
						<div class="content">
							<div class="sec-title">
								<h2>{{$saranas->nama}}</h2>
								<div class="title-text">Sarana dan Prasarana yang ada di SMK Negeri 4 Kota Paykumbuh</div>
							</div>
							<div class="text">
                                @php
                                // Membagi deskripsi menjadi paragraf berdasarkan batas karakter
                                    $paragraphs = explode("\n", wordwrap($saranas->deskripsi, 250, "\n"));
                                @endphp

                                @foreach ($paragraphs as $paragraph)
                                    <p>{{ $paragraph }}</p> <!-- Menampilkan setiap paragraf -->
                                @endforeach
							</div>
						</div>
					</div>
				</div>
				<div class="image-column" style="background-image: url({{asset('storage/images/sarana/'.$saranas->gambar)}})">
					<div class="inner-column">
						<div class="image">
							<img src="{{asset('storage/images/sarana/'.$saranas->gambar)}}" alt="" />
                        </div>		
						
					</div>
				</div>
			</div>
		</div>
	</section>
	
    <section class="offer-section">
		<div class="auto-container">
			<!--Sec Title-->
			<div class="sec-title centered">
				<h2>Sarana dan Prasarana lainnya</h2>
			</div>			
			<div class="row clearfix">	
                @if ($relatedsaranas->isEmpty())
                <div class="sec-title centered">
                    <div class="title-text">Tidak ada sarana dan prasarana lainnya. Silakan periksa sarana dan prasarana lain di daftar.</div>
                </div>
                @else
                    @foreach ($relatedsaranas as $item)                   
                        <div class="offer-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="image">
                                    <a href="{{route('detail-sarana',$item->slug)}}"><img src="{{asset('storage/images/sarana/'.$item->gambar)}}" alt="" /></a>
                                </div>
                                <div class="lower-content">
                                    <h3><a href="{{route('detail-sarana',$item->slug)}}">{{$item->nama}}</a></h3>
                                    <div class="text">{{ Str::limit($item->isi_artikel, 250, '...') }}</div>
                                    <a class="read-more" href="{{route('detail-sarana',$item->slug)}}"><span class="fa fa-angle-right"></span> baca selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
			</div>			
		</div>
	</section>
	
	
	@include('frontend.master.footer')
	
</div>
<!--End pagewrapper--><!--Scroll to top--><div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>

@include('frontend.master.foot')

</body>
</html>