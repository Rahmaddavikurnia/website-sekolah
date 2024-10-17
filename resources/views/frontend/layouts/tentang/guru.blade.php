@include('frontend.master.header')

<body>

<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
   @include('frontend.master.navbar')
	
	<!--Page Title-->
    <section class="page-title" style="background-image:url(storage/images/foto2.jpg)">
    	<div class="auto-container">
        	<h1>Guru & Staf</h1>
            <ul class="page-breadcrumb">
            	<li><a href="{{route('home')}}">home</a></li>
                <li>guru & staf</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
	
	<!--Team Page Section-->
	<section class="team-page-section">
		<div class="auto-container">
			<div class="row clearfix">
				
				<!--Team Block-->
                @foreach ($gurus as $item)
                <div class="team-block col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="image">
							<img src="{{asset('storage/images/guru/'.$item->gambar)}}" alt="" />
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="content">
										<div class="social-box">
											<a href="#"><span class="fa fa-twitter"></span></a>
											<a href="#"><span class="fa fa-facebook"></span></a>
											<a href="#"><span class="fa fa-linkedin"></span></a>
											<a href="#"><span class="fa fa-google-plus"></span></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="lower-content">
							<h3><a>{{$item->nama}}</a></h3>
							<div class="designation">{{$item->jabatan}}</div>
						</div>
					</div>
				</div>
                @endforeach
				
				<!--Team Block-->

			</div>
		</div>
	</section>
	
	@include('frontend.master.footer')
	
</div>
<!--End pagewrapper--><!--Scroll to top--><div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>

@include('frontend.master.foot')

</body>
</html>