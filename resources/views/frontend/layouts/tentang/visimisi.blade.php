@include('frontend.master.header')

<body>

<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
  @include('frontend.master.navbar')
	
	<!--Page Title-->
    <section class="page-title" style="background-image:url(storage/images/foto2.jpg)">
    	<div class="auto-container">
        	<h1>Visi Misi </h1>
            <ul class="page-breadcrumb">
            	<li><a href="{{route('home')}}">home</a></li>
                <li>visi misi</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
	

    <section class="beyong-section">
		<div class="auto-container">
			<!--MixitUp Galery-->
            <div class="mixitup-gallery">
                <!--Filter-->
                <div class="filters text-center clearfix">                     
                    <ul class="filter-tabs filter-btns clearfix">
						<li class="active filter" data-role="button" data-filter="all"></li>
                        <li class="filter" data-role="button" data-filter=".transport"></li>
                    </ul>
                </div>

			</div>
			
			<!--Beyong Tabs-->
			<div class="beyong-tabs tabs-box">

				<!--Tab Btns-->
				<ul class="tab-btns tab-buttons clearfix">
					<li data-tab="#beyong-limits" class="tab-btn active-btn">Visi <span class="separater-dots"></span></li>
					<li data-tab="#beyong-customer" class="tab-btn">Misi <span class="separater-dots"></span></li>
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
										<img src="storage/images/visi.jpg" alt="img" />
									</div>
								</div>
								<!--Content Column-->
								<div class="content-column col-lg-6 col-md-12 col-sm-12">
									<div class="inner-column">
										<h2>Visi</h2>
										<div class="text">Visi sekolah adalah pernyataan cita-cita. Ini menggambarkan tujuan akhir yang kami harapkan dapat tercapai.</div>
									
                                        <div class="text">Terwujudnya Pelayanan Informasi yang Transparan dan Akuntabel Dalam Pelayanan Publik.</div>
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
										<img src="storage/images/visi.jpg" alt="img" />
									</div>
								</div>
								<!--Content Column-->
								<div class="content-column col-lg-6 col-md-12 col-sm-12">
									<div class="inner-column">
										<h2>Misi</h2>
										<div class="text">Misi sekolah menjelaskan langkah-langkah yang harus kami ambil untuk mewujudkan visi.</div>
										<ul class="list-style-two">
											<li>Meningkatkan pengelolaan dan pelayanan informasi yang berkualitas, benar dan bertanggung jawab sesuai undang-undang yang berlaku.</li>
											<li>Membangun dan mengembangkan sistem penyediaan dan layanan informasi.</li>
											<li>Meningkatkan dan mengembangkan kompetensi dan kualitas SDM dalam bidang pelayanan informasi.</li>
											<li>Mewujudkan keterbukaan informasi SMK Negeri 4 Payakumbuh dengan proses yang cepat, tepat, mudah dan sederhana.</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!--Tab-->
					
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