@include('frontend.master.header')

<body>

<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
    @include('frontend.master.navbar')
	
	<!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('storage/images/artikel/'.$artikels->thumbnail)}})">
    	<div class="auto-container">
        	<h1>{{$artikels->judul_artikel}}</h1>
            <ul class="page-breadcrumb">
            	<li><a href="{{route('home')}}">home</a></li>
                <li>{{$artikels->judul_artikel}}</li>
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
						
							{{-- <!-- Search -->
							<div class="sidebar-widget search-box">
								<form method="post" action="contact.html">
									<div class="form-group">
										<input type="search" name="search-field" value="" placeholder="Search Blog ..." required>
										<button type="submit"><span class="icon fa fa-search"></span></button>
									</div>
								</form>
							</div>
						 --}}

							<!--Popular Posts-->
							<div class="sidebar-widget popular-posts">
								<div class="sidebar-title">
									<h2>Artikel Terkait</h2>
								</div>
                                @if ($relatedArtikels->isEmpty())
                                    <p>Tidak ada artikel terkait. Silakan periksa artikel lain di daftar.</p>
                                @else
                                    @foreach ($relatedArtikels as $item)
                                    <article class="post">
                                        <figure class="post-thumb"><a href="{{route('detail-artikel',$item->slug )}}"><img src="{{asset('storage/images/artikel/'.$item->tumbnail)}}" alt=""></a></figure>
                                        <div class="post-info">{{$item->tanggal_terbit}}</div>
                                        <div class="text"><a href="{{route('detail-kabar',$item->slug)}}">{{$item->judul_artikel}}</a></div>
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
								<img src="{{asset('storage/images/artikel/'.$artikels->thumbnail)}}" alt="" />
							</div>
							<div class="lower-content">
								<div class="clearfix">
									<div class="pull-left">
										<ul class="post-meta clearfix">
											<li>{{$artikels->tanggal_terbit}}</li>
											<li>{{$artikels->kategori_type}}</li>
										</ul>
									</div>
									<div class="pull-right">
										<ul class="post-meta clearfix">
											<li class="pull-right"><span class="icon fa fa-heart-o"></span> 153</li>
										</ul>
									</div>
								</div>
								<h2>{{$artikels->judul_artikel}}</h2>
								<div class="text">
                                    @php
                                        // Membagi deskripsi menjadi paragraf berdasarkan batas karakter
                                        $paragraphs = explode("\n", wordwrap($artikels->isi_artikel, 300, "\n"));
                                    @endphp

                                    @foreach ($paragraphs as $paragraph)
                                        <p>{{ $paragraph }}</p> <!-- Menampilkan setiap paragraf -->
                                    @endforeach
								</div>
								<!--post-share-options-->
								<div class="post-share-options">
									<div class="post-share-inner clearfix">
										<div class="pull-left tags"><span>Tags: </span><a href="#">{{$artikels->kategori_type}}
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
                                    	@if ($previousArtikel)
                                        <a href="{{route('detail-artikel',$previousArtikel->slug)}}">Artikel Sebelumnya </a>
                                    	<h4>{{$previousArtikel->judul_artikel}}</h4>
                                        @endif
                                    </div>
                                    
                                    <div class="pull-right next-post">
                                        @if ($nextArtikel)
                                        <a href="{{route('detail-artikel',$nextArtikel->slug)}}">Artikel Selanjutnya </a>
                                    	<h4>{{$nextArtikel->judul_artikel}}</h4>
                                        @endif
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <!--Comments Area-->
							<div class="comments-area">
								<div class="group-title">
									<h2>Komentar Artikel</h2>
								</div>
								<!--Comment Box-->
								@foreach ($artikels->comments as $item)
									<div class="comment-box">
										<div class="comment">
											<div class="author-thumb"><img src="storage/images/user.jpg	" alt=""></div>
											<div class="comment-inner clearfix">
												<div class="comment-info clearfix"><strong>{{ $item->user ? $item->user->name : 'Anonim'}}</strong><div class="comment-time">{{$item->created_at->format('d M Y')	}}</div></div>
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
										<input type="hidden" name="comentable_type" value="App\Models\Artikel">
										<input type="hidden" name="comentable_id" value="{{ $artikels->id }}">
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