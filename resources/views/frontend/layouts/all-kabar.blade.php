@include('frontend.master.header')
<body>

<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
    @include('frontend.master.navbar')
	
	<!--Page Title-->
    <section class="page-title" style="background-image:url(storage/images/foto1.jpg)">
    	<div class="auto-container">
        	<h1>Semua Kabar</h1>
            <ul class="page-breadcrumb">
            	<li><a href="{{route('home')}}">home</a></li>
                <li>semua kabar</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
	
	<!--Blog Classic Section-->
    <div class="blog-classic-section">
    	<div class="auto-container">
       	
            @foreach ($kabars as $item)
                        	<!--News Block-->
        	<div class="news-block-eight">
        		<div class="inner-box">
        			<div class="image">
						<a href="{{route('detail-kabar',$item->slug)}}"><img src="{{asset('storage/images/kabar/'.$item->gambar)}}" alt="img" /></a>
					</div>
					<div class="content">
						<div class="clearfix">
							<div class="pull-left">
								<ul class="post-meta clearfix">
									<li>{{$item->tanggal_terbit}}</li>
									<li>{{$item->related_type}}</li>
									<li><span class="icon fa fa-comment-o"></span> 86</li>
								</ul>
							</div>
							<div class="pull-right">
								<ul class="post-meta clearfix">
									<li class="pull-right"><span class="icon fa fa-heart-o"></span> 153</li>
								</ul>
							</div>
						</div>
						<h2><a href="blog-single.html">{{$item->judul_kabar}}</a></h2>
						<div class="text">{{ Str::limit($item->isi_kabar, 280, '...') }}</div>
						<a class="read-more" href="{{route('detail-kabar',$item->slug)}}">Lihat Selengkapnya</a>
					</div>
				</div>
			</div>
		
            @endforeach

			<!--Styled Pagination-->
            {{ $kabars->links('frontend.pagination') }}
			<!--End Styled Pagination-->
			
		</div>
	</div>
	<!--End Blog Classic Section-->
	
	@include('frontend.master.footer')
	
</div>
<!--End pagewrapper--><!--Scroll to top--><div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>

@include('frontend.master.foot')

</body>
</html>