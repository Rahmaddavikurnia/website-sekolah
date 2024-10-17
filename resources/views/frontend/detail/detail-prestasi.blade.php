@include('frontend.master.header')

<body>

<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
    @include('frontend.master.navbar')
	
	<!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('storage/images/prestasi/'.$prestasis->gambar)}})">
    	<div class="auto-container">
        	<h1>{{$prestasis->title}}</h1>
            <ul class="page-breadcrumb">
            	<li><a href="{{route('home')}}">home</a></li>
                <li>{{$prestasis->title}}</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
	
	<!--Sidebar Page Container-->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
				
               	<!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                	<aside class="sidebar">
						<div class="sidebar-inner">
						
							<!-- Search -->
							<div class="sidebar-widget search-box">
								<form method="post" action="contact.html">
									<div class="form-group">
										<input type="search" name="search-field" value="" placeholder="Search Blog ..." required>
										<button type="submit"><span class="icon fa fa-search"></span></button>
									</div>
								</form>
							</div>
						

							<!--Popular Posts-->
							<div class="sidebar-widget popular-posts">
								<div class="sidebar-title">
									<h2>Prestasi Terkait</h2>
								</div>
                                @if ($relatedPrestasi->isEmpty())
                                    <p>Tidak ada prestasi terkait. Silakan periksa prestasi lain di daftar.</p>
                                @else
                                    @foreach ($relatedPrestasi as $item)
                                    <article class="post">
                                        <figure class="post-thumb"><a href="{{route('detail-prestasi',$item->slug)}}"><img src="{{asset('storage/images/prestasi/'.$item->gambar)}}" alt=""></a></figure>
                                        <div class="post-info">{{$item->tanggal}}</div>
                                        <div class="text"><a href="{{route('detail-prestasi',$item->slug)}}">{{$item->title}}</a></div>
                                    </article>
                                    @endforeach
                                @endif
							</div>		
						</div>
					</aside>
				</div>
               
                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                	<div class="blog-single">
						<div class="inner-box">
							<div class="image">
								<img src="{{asset('storage/images/prestasi/'.$prestasis->gambar)}}" alt="" />
							</div>
							<div class="lower-content">
								<div class="clearfix">
									<div class="pull-left">
										<ul class="post-meta clearfix">
											<li>{{$prestasis->tanggal}}</li>
											<li>{{$prestasis->kategori}}</li>
										</ul>
									</div>
									<div class="pull-right">
										<ul class="post-meta clearfix">
											<li class="pull-right"><span class="icon fa fa-heart-o"></span> 153</li>
										</ul>
									</div>
								</div>
								<h2>{{$prestasis->title}}</h2>
								<div class="text">
                                    @php
                                        // Membagi deskripsi menjadi paragraf berdasarkan batas karakter
                                        $paragraphs = explode("\n", wordwrap($prestasis->deskripsi, 185, "\n")); // 100 karakter per paragraf
                                    @endphp

                                    @foreach ($paragraphs as $paragraph)
                                        <p>{{ $paragraph }}</p> <!-- Menampilkan setiap paragraf -->
                                    @endforeach
								</div>
								<!--post-share-options-->
								<div class="post-share-options">
									<div class="post-share-inner clearfix">
										<div class="pull-left tags"><span>Tags: </span><a href="#">{{$prestasis->kategori}}
                                            {{-- @if($kabar->related_table == 'sarana')
                                                <a href="{{ route('sarana.index') }}">Sarana</a>
                                            @elseif($kabar->related_table == 'humas')
                                                <a href="{{ route('humas.index') }}">Humas</a>
                                            @elseif($kabar->related_table == 'kesiswaan')
                                                <a href="{{ route('kesiswaan.index') }}">Kesiswaan</a>
                                            @elseif($kabar->related_table == 'kurikulum')
                                                <a href="{{ route('kurikulum.index') }}">Kurikulum</a>
                                            @endif --}}
                                            </a></div>
									</div>
								</div>
								
							</div>
							
							<!--New Posts-->
                            <div class="new-posts">
                            	<div class="clearfix">
                                	
                                    <div class="pull-left prev-post">
                                    	@if ($previousPrestasi)
                                        <a href="{{route('detail-kabar',$previousPrestasi->slug)}}">Kabar Sebelumnya </a>
                                    	<h4>{{$previousPrestasi->title}}</h4>
                                        @endif
                                    </div>
                                    
                                    <div class="pull-right next-post">
                                        @if ($nextPrestasi)
                                        <a href="{{route('detail-kabar',$nextPrestasi->slug)}}">Kabar Selanjutnya </a>
                                    	<h4>{{$nextPrestasi->title}}</h4>
                                        @endif
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <!--Comments Area-->
							<div class="comments-area">
								<div class="group-title">
									<h2>Komentar</h2>
								</div>

								@foreach ($prestasis->comments as $item)
									<div class="comment-box">
										<div class="comment">
											<div class="author-thumb"><img src="storage/images/user.jpg	" alt=""></div>
											<div class="comment-inner clearfix">
												<div class="comment-info clearfix"><strong>{{$item->user ? $item->user->name : 'Anonim'}}</strong><div class="comment-time">{{$item->created_at->format('d M Y')	}}</div></div>
												<div class="text">{{$item->content}}</div>
												{{-- <a class="comment-reply" href="#"><span class="fa fa-angle-right"></span> Reply</a> --}}

												@if (auth()->check() && (auth()->user()->admin || auth()->user()->id === $item->user_id))
													<form action="{{ route('comment-destroy', $item->id) }}" method="POST" style="display:inline;">
														@csrf
														@method('DELETE')
														<button type="submit" class="comment-reply"><span class="fa fa-angle-right"></span> Hapus komen</button>
													</form>
												@endif
											</div>
										</div>
									</div>
								@endforeach

							</div>
							<!--End Comments Area-->
							<!--Comment Form-->
								<div class="comment-form">
									<div class="group-title">
										<h2>Berikan Komentar</h2>
									</div>
									<form method="POST" action="{{route('comment')}}">
										@csrf
										<div class="row clearfix">
											<div class="column col-md-12 col-sm-12 col-xs-12">
												<div class="form-group">
													<textarea name="content" placeholder="komentar"></textarea>
												</div>
											</div>
										</div>
										<input type="hidden" name="comentable_type" value="App\Models\Prestasi">
										<input type="hidden" name="comentable_id" value="{{ $prestasis->id }}">
										<div class="form-group text-right">
											<button class="theme-btn btn-style-five" type="submit" name="submit-form">Kirim</button>
										</div>
									</form>
								</div>
						</div>
						
					</div>
				</div>
				
			</div>
		</div>
	</div>
	
	@include('frontend.master.footer')
	
</div>
<!--End pagewrapper--><!--Scroll to top--><div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>

@include('frontend.master.foot')

</body>
</html>