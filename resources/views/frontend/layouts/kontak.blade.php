@include('frontend.master.header')

<body>

<div class="page-wrapper">
 	
    <!-- Preloader -->
    {{-- <div class="preloader"></div> --}}
 	
    @include('frontend.master.navbar')
	
	<!--Page Title-->
    <section class="page-title" style="background-image:url(storage/images/foto2.jpg)">
    	<div class="auto-container">
        	<h1>Kontak kami</h1>
            <ul class="page-breadcrumb">
            	<li><a href="{{route('home')}}">home</a></li>
               	<li>kontak kami</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
	
	<!--Map Section-->
    <div class="map-section">
    	<div class="auto-container">
       		<!--Map Outer-->
            <div class="map-outer">
                
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15959.152211796905!2d100.60357013612486!3d-0.22317670391275435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd54ca1a72cb691%3A0x8d46714ec46a7761!2sSMK%20Negeri%204%20Payakumbuh!5e0!3m2!1sid!2sid!4v1727623779097!5m2!1sid!2sid" 
                width="1350" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
		</div>
	</div>
	<!--End Map Section-->

	
	<!--Contact Section-->
	<section class="contact-section">
		<div class="auto-container">
			<div class="row clearfix">
				
				<!--Info Column-->
				<div class="info-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="content-box">
							<h2>Apakah anda ingin bersekolah di SMK Negeri 4 Payakumbuh?</h2>
							<div class="title">Hubungi kami atau kunjungi kami segera!</div>
							<ul class="list-style-three">
								<li><span class="icon fa fa-map-marker"></span>Jl. Muchtar Latief, Padang Sikabu, Kec. Lamposi Tigo Nagori, Kota Payakumbuh</li>
								<li><span class="icon fa fa-phone"></span>1-800-369-8527</li>
								<li><span class="icon fa fa-envelope"></span>smkn4payakumbuh@gmail.com</li>
								<li><span class="icon fa fa-clock-o"></span>Senin sampai Jumat 07.00 - 17.00</li>
							</ul>
							<!--Social Boxed-->
							<ul class="social-boxed">
								<li><a href="#"><span class="fa fa-facebook"></span></a></li>
								<li><a href="#"><span class="fa fa-linkedin"></span></a></li>
								<li><a href="#"><span class="fa fa-vimeo"></span></a></li>
								<li><a href="#"><span class="fa fa-google-plus"></span></a></li>
								<li><a href="#"><span class="fa fa-twitter"></span></a></li>
							</ul>
						</div>
					</div>
				</div>
				
				<!--Form Column-->
				<div class="form-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<h2>Pendaftaran</h2>
						<div class="title">
                            Apakah Anda tertarik untuk mendaftarkan anak Anda di SMK Negeri 4 Payakumbuh? Tim kami yang berdedikasi, siap menjawab semua pertanyaan yang Anda miliki dan siap membantu anak Anda untuk memulai perjalanan mereka bersama kami.
						</div>
						<div class="contact-form ">
                            <!--Comment Form-->

							@if(session('success'))
								<div class="alert alert-success">
									{{ session('success') }}
								</div>
							@endif

                            <form method="post" action="{{route('kirimsaran')}}" id="contact-form">
								@csrf
								<div class="form-group">
									<input type="text" name="name" placeholder="Nama Anda" required>
								</div>

								<div class="form-group">
									<input type="email" name="email" placeholder="Masukkan Email" required>
								</div>


								<div class="form-group">
									<textarea name="message" placeholder="Saran dan Pesan"></textarea>
								</div>

								<div class="form-group">
									<button class="theme-btn message-btn" type="submit" name="submit-form">Kirim Saran</button>
								</div>
    
                            </form>
    
                        </div>
    
					</div>
				</div>
				
				
			</div>
		</div>
	</section>	
	<!--End Contact Section-->
	
	@include('frontend.master.footer')
	
</div>
<!--End pagewrapper--><!--Scroll to top--><div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>

@include('frontend.master.foot')

<!--Google Map APi Key-->
<script src="http://maps.google.com/maps/api/js?key=AIzaSyB2uu6KHbLc_y7fyAVA4dpqSVM4w9ZnnUw"></script>
<script src="{{asset('frontend/js/map-script.js')}}"></script>
<!--End Google Map APi-->

</body>
</html>