@include('frontend.master.header')

<body>

<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
    @include('frontend.master.navbar')
	<!--Page Title-->
    <section class="page-title" style="background-image:url('{{asset('storage/images/kesiswaan/'.$kesiswaanss->foto_program)}}')">
    	<div class="auto-container">
        	<h1>{{$kesiswaanss->nama_program}}</h1>
            <ul class="page-breadcrumb">
            	<li><a href="{{route('home')}}">home</a></li>
                <li>{{$kesiswaanss->nama_program}}</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
	
	<section class="portfolio-single-section">
		<div class="auto-container">
			<div class="row clearfix">
			
				<!--Image Column-->
				<div class="image-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="image">
							<img src="{{asset('storage/images/kesiswaan/'.$kesiswaanss->foto_program)}}" alt="" />
						</div>
						<div class="image">
							<img src="{{asset('storage/images/kesiswaan/'.$kesiswaanss->foto_anggota)}}" alt="" />
						</div>
					</div>
				</div>
				
				<!--Content Column-->
				<div class="content-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<h2>{{$kesiswaanss->nama_program}}</h2>
						<div class="title">corporate finance</div>
						<div class="text">
                            <p class="mb-3">
                                @php
                                    // Membagi deskripsi menjadi paragraf berdasarkan batas karakter
                                    // $paragraphs = explode("\n", wordwrap($kesiswaanss->deskripsi_program, 300, "\n"));
									$paragraphs = explode("\n", $kesiswaanss->deskripsi_program);
                                @endphp

                                @foreach ($paragraphs as $paragraph)
                                    <p>{{ $paragraph }}</p> <!-- Menampilkan setiap paragraf -->
                                @endforeach
                            </p> 
                        </div>			
						<ul class="porfolio-info">
							<li><span>Penanggung jawab:</span>{{$kesiswaanss->penanggung_jawab}}</li>
							<li><span>tags:</span> <a>{{ implode(' | ', $kesiswaanss->jurusans->pluck('nama')->toArray()) }}</a> </li>
						</ul>
					</div>
				</div>
				
			</div>
			
			<!--New Posts-->
			<div class="new-posts clearfix">
                @if ($previousKesiswaan)
                    <a href="{{route('detail-kesiswaan',$previousKesiswaan->slug)}}" class="prev-post"><span class="icon fa fa-caret-left"></span> Program Sebelumnya </a>
                @endif
                @if ($nextKesiswaan)
                    <a href="{{route('detail-kesiswaan',$nextKesiswaan->slug)}}" class="next-post"><span class="icon fa fa-caret-right"></span> Program Selanjutnya </a>
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