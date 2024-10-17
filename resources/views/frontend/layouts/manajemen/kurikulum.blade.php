@include('frontend.master.header')

<body>

<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
   @include('frontend.master.navbar')

    <!--Main Slider-->
    <section class="page-title" style="background-image:url(storage/images/foto2.jpg)">
    	<div class="auto-container">
        	<h1>Kurikulum</h1>
            <ul class="page-breadcrumb">
            	<li><a href="{{route('home')}}">home</a></li>
                <li>kurikulum</li>
            </ul>
        </div>
    </section>
	<!--Beyong Section-->
	<section class="beyong-section">
		<div class="auto-container">
			<!--MixitUp Galery-->
            <div class="mixitup-gallery">
                <!--Filter-->
                <div class="filters text-center clearfix">                     
                    <ul class="filter-tabs filter-btns clearfix">
						<li class="filter" data-role="button" data-filter="all"></li>
                        <li class="filter" data-role="button" data-filter=".transport"></li>
                        <li class="filter" data-role="button" data-filter=".consumer"></li>
                        <li class="filter" data-role="button" data-filter=".energy"></li>
                    </ul>
                </div>

			</div>
			
			<!--Beyong Tabs-->
			<div class="beyong-tabs tabs-box">

				<!--Tab Btns-->
				<ul class="tab-btns tab-buttons clearfix">
					<li data-tab="#beyong-limits" class="tab-btn active-btn">PPLG <span class="separater-dots"></span></li>
					<li data-tab="#beyong-customer" class="tab-btn">TJKT <span class="separater-dots"></span></li>
					<li data-tab="#beyong-process" class="tab-btn">DKV <span class="separater-dots"></span></li>
					<li data-tab="#beyong-coaching" class="tab-btn">BC <span class="separater-dots"></span></li>
				</ul>

				<!--Tabs Container-->
				<div class="tabs-content">

					<!--Tab / Active Tab-->
					<div class="tab active-tab" id="beyong-limits">
						<div class="content">
							<div class="row clearfix">
								<!--Image Column-->
								<div class="image-column col-lg-6 col-md-12 col-sm-12">
									<div class="image">
                                        <div class="image">
                                            <img src="storage/images/foto2.jpg" alt="" />
                                        </div>		 
									</div>
								</div>
								<!--Content Column-->
								<div class="content-column col-lg-6 col-md-12 col-sm-12">
									<div class="inner-column">
										<h2>Kurikulum Jurusan PPLG</h2>
                                        @if ($kurikulums['pplg']->isEmpty())
                                            <p>Tidak ada kurikulum untuk jurusan ini.</p>
                                        @else
                                            <ul class="list-style-two">
                                                @foreach ($kurikulums['pplg'] as $kurikulum)
                                                    <li>{{$kurikulum->nama}}</li>
                                                @endforeach
                                            </ul>
                                        @endif
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!--Tab-->
                    <div class="tab" id="beyong-customer">
						<div class="content">
							<div class="row clearfix">
								<!--Image Column-->
								<div class="image-column col-lg-6 col-md-12 col-sm-12">
									<div class="image">
                                        <img src="storage/images/foto2.jpg" alt="" />
									</div>
								</div>
								<!--Content Column-->
								<div class="content-column col-lg-6 col-md-12 col-sm-12">
									<div class="inner-column">
										<h2>Kurikulum Jurusan TJKT</h2>
                                        @if ($kurikulums['tjkt']->isEmpty())
                                            <p>Tidak ada kurikulum untuk jurusan ini.</p>
                                        @else
                                            <ul class="list-style-two">
                                                @foreach ($kurikulums['tjkt'] as $kurikulum)
                                                    <li>{{$kurikulum->nama}}</li>
                                                @endforeach
                                            </ul>
                                        @endif
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!--Tab-->
                    <div class="tab" id="beyong-process">
						<div class="content">
							<div class="row clearfix">
								<!--Image Column-->
								<div class="image-column col-lg-6 col-md-12 col-sm-12">
									<div class="image">
                                        <img src="storage/images/foto2.jpg" alt="" />
									</div>
								</div>
								<!--Content Column-->
								<div class="content-column col-lg-6 col-md-12 col-sm-12">
									<div class="inner-column">
                                        <h2>Kurikulum Jurusan DKV</h2>
                                        @if ($kurikulums['dkv']->isEmpty())
                                            <p>Tidak ada kurikulum untuk jurusan ini.</p>
                                        @else
                                            <ul class="list-style-two">
                                                @foreach ($kurikulums['dkv'] as $kurikulum)
                                                    <li>{{$kurikulum->nama}}</li>
                                                @endforeach
                                            </ul>
                                        @endif
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!--Tab-->
                    <div class="tab" id="beyong-coaching">
						<div class="content">
							<div class="row clearfix">
								<!--Image Column-->
								<div class="image-column col-lg-6 col-md-12 col-sm-12">
									<div class="image">
                                        <img src="storage/images/foto2.jpg" alt="" />
    									</div>
								</div>
								<!--Content Column-->
								<div class="content-column col-lg-6 col-md-12 col-sm-12">
									<div class="inner-column">
										<h2>Kurikulum Jurusan BC</h2>
                                        @if ($kurikulums['bc']->isEmpty())
                                            <p>Tidak ada kurikulum untuk jurusan ini.</p>
                                        @else
                                            <ul class="list-style-two">
                                                @foreach ($kurikulums['bc'] as $kurikulum)
                                                    <li>{{$kurikulum->nama}}</li>
                                                @endforeach
                                            </ul>
                                        @endif
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			
		</div>
	</section>
	<!--End Beyong Section-->
	
	@include('frontend.master.footer')
	
</div>
<!--End pagewrapper--><!--Scroll to top--><div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>
@include('frontend.master.foot')

</body>
</html>