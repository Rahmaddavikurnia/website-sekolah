@include('frontend.master.header')

<body>

<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
    @include('frontend.master.navbar')
	
	<!--Page Title-->
    <section class="page-title" style="background-image:url(storage/images/foto2.jpg)">
    	<div class="auto-container">
        	<h1>Sarana dan Prasarana</h1>
            <ul class="page-breadcrumb">
            	<li><a href="{{route('home')}}">home</a></li>
               	<li><a href="{{route('all-sarana')}}">sarana</a></li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
	
	<!--Blog Grid Section-->
    <div class="blog-grid-section">
    	<div class="auto-container">
       		<div class="row clearfix">
       			@foreach ($saranas as $item)
                    <div class="news-block-five style-two col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image">
                                <a href="blog-single.html"><img src="{{asset('storage/images/sarana/'.$item->gambar)}}" alt="" /></a>
                            </div>
                            <div class="lower-content">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <ul class="post-meta clearfix">
                                            <li><span class="icon fa fa-solid fa-users"></span> {{$item->kapasitas}}</li>
                                        </ul>
                                    </div>
                                    <div class="pull-right">
                                        <ul class="post-meta clearfix">
                                            <li class="pull-right"><span class="icon fa fa-solid fa-map-location"></span> {{$item->lokasi}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <h2><a href="{{route('detail-sarana',$item->slug)}}">{{$item->nama}}</a></h2>
                                <div class="text">{{ Str::limit($item->deskripsi, 150, '...') }}</div>
                                <a class="read-more" href="{{route('detail-sarana',$item->slug)}}">Lihat Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
       			<!--News Block Five-->
                {{ $saranas->links('frontend.pagination') }}
				
			</div>
		</div>
	</div>
	<!--End Blog Classic Section-->
	
	@include('frontend.master.footer')
	
</div>
<!--End pagewrapper--><!--Scroll to top--><div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>

@include('frontend.master.foot')
</body>
</html>