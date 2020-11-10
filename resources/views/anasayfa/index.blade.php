@extends('anasayfa/template')
@section('icerik')
	<div class="zm-section bg-white ptb-70">
		<div class="container">
			<div class="row mb-40">
				<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
					<div class="section-title">
						<h2 class="h6 header-color inline-block uppercase" style="background-color: #1c7430;color: white">Yağ Yakıcı</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5 col-sm-12 col-xs-12 col-lg-6">
					<div class="zm-posts">
						<article class="zm-post-lay-a">
							<div class="zm-post-thumb">
								<a href="/yazi/{{$tekli->id}}/{{$tekli->slug}}"><img src="/{{$tekli->resim}}" alt="img"></a>
							</div>
							<div class="zm-post-dis">
								<div class="zm-post-header">
									<div class="zm-category"><a href="/kategori/{{$tekli->kategorisi->id}}/{{$tekli->kategorisi->slug}}" class="bg-cat-1 cat-btn">{{$tekli->kategorisi->baslik}}</a></div>
									<h2 class="zm-post-title h2"><a href="/yazi/{{$tekli->id}}/{{$tekli->slug}}">{{$tekli->baslik}}</a></h2>
									<div class="zm-post-meta">
										<ul style=" list-style-type: none!important;" >
											<li class="s-meta"><a class="zm-author"> <i class="fa fa-pencil" ></i> {{$tekli->kullanici->name}}</a></li>
											<li class="s-meta"><a class="zm-date"><i class="fa fa-calendar" ></i> {!! date('d-m-y',strtotime($tekli->created_at)) !!}</a></li>
											<li class="s-meta"><a class="zm-date"><i class="fa fa-eye" ></i> {{$tekli->getPageviews()}}</a></li>

										</ul>
									</div>
								</div>
							</div>
						</article>
					</div>
				</div>

				<div class="col-md-7 col-sm-12 col-xs-12 col-lg-6">
					<div class="zm-posts">

						@foreach($yazilar as $yazi)


							<article class="zm-post-lay-d clearfix">
								<div class="zm-post-thumb f-left">
									<a href="/yazi/{{$yazi->id}}/{{$yazi->slug}}"><img src="/{{$yazi->resim}}" alt="img"></a>
								</div>
								<div class="zm-post-dis f-right">
									<div class="zm-post-header">
										<div class="zm-category"><a href="/kategori/{{$yazi->kategorisi->id}}/{{$yazi->kategorisi->slug}}" class="bg-cat-2 cat-btn">{{$yazi->kategorisi->baslik}}</a></div>
										<h2 class="zm-post-title"><a href="/yazi/{{$yazi->id}}/{{$yazi->slug}}">{{$yazi->baslik}}</a></h2>
										<div class="zm-post-meta">
											<ul>
												<li class="s-meta"><a class="zm-author"><i class="fa fa-pencil" ></i> {{$yazi->kullanici->name}}</a></li>
												<li class="s-meta"><a class="zm-date"><i class="fa fa-calendar" ></i> {!! date('d-m-y',strtotime($yazi->created_at)) !!}</a></li>

											</ul>
										</div>
									</div>
								</div>
							</article>
						@endforeach

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Start Video Post [View layout A]  -->
	<div class="video-post-area ptb-70 bg-dark">
		<div class="container">
			<div class="row mb-40">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="section-title">
						<h2 class="h6 header-color inline-block uppercase">Videolar</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="zm-video-post-list zm-posts owl-active-3 navigator-1 clearfix">

					@foreach($videolar as $video)


						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
							<div class="zm-video-post zm-video-lay-a zm-single-post">
								<div class="zm-video-thumb"  data-dark-overlay="2.5" >
									<img src="/{{$video->resim}}" alt="video" width="386" height="248">
									<a href="/yazi/{{$video->id}}/{{$video->slug}}">
										<i class="fa fa-play-circle-o"></i>
									</a>
								</div>
								<div class="zm-video-info text-white">
									<h2 class="zm-post-title"><a href="/yazi/{{$video->id}}/{{$video->slug}}">{{$video->baslik}}</a></h2>
									<div class="zm-post-meta">
										<ul>
											<li class="s-meta"><a class="zm-author"><i class="fa fa-pencil" ></i> {{$video->kullanici->name}}</a></li>
											<li class="s-meta"><a class="zm-date"><i class="fa fa-calendar" ></i> {!! date('d-m-y',strtotime($video->created_at)) !!}</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>

					@endforeach

				</div>
			</div>
		</div>
	</div>
	<!-- End Video Post [View layout A]  -->

	<div class="zm-section bg-white pt-20 pb-40">
		<div class="container">
			<div class="row">
				<!-- Start left side -->
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 columns">
					<div class="row mb-40">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="section-title">
								<h2 class="h6 header-color inline-block uppercase" style="background-color: rebeccapurple">YENİ YAZILAR</h2>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="zm-posts">
								@foreach($yeniler as $yeni)


									<article class="zm-post-lay-c zm-single-post clearfix">
										<div class="zm-post-thumb f-left">
											<a href="/yazi/{{$yeni->id}}/{{$yeni->slug}}"><img src="/{{$yeni->resim}}" alt="img" width="382" height="216"></a>
										</div>
										<div class="zm-post-dis f-right">
											<div class="zm-post-header">
												<div class="zm-category"><a href="/kategori/{{$yeni->kategorisi->id}}/{{$yeni->kategorisi->slug}}" class="bg-primary cat-btn">{{$yeni->kategorisi->baslik}}</a></div>
												<h2 class="zm-post-title"><a href="/yazi/{{$yeni->id}}/{{$yeni->slug}}">{{$yeni->baslik}}</a></h2>
												<div class="zm-post-meta">
													<ul>
														<li class="s-meta"><a class="zm-author"><i class="fa fa-pencil" ></i> {{$yeni->kullanici->name}}</a></li>
														<li class="s-meta"><a class="zm-date"><i class="fa fa-calendar" ></i> {!! date('d-m-y',strtotime($yeni->created_at)) !!}</a></li>
														<li class="s-meta"><a class="zm-date"><i class="fa fa-eye" ></i> {{$yeni->getpageviews()}}</a></li>

													</ul>
												</div>

											</div>
										</div>
									</article>
								@endforeach



							</div>
						</div>
					</div>
				</div>
				<!-- End left side -->
				<!-- Start Right sidebar -->
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 sidebar-warp columns">
					<div class="row">

						<!-- Start post layout E -->
						<aside class="zm-post-lay-e-area col-xs-12 col-sm-6 col-md-6 col-lg-12 mt-60 hidden-md">
							<div class="row mb-40">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="section-title">
										<h2 class="h6 header-color inline-block uppercase" style="background-color: #533f03;color: #ffc107">En Fazla Yorum Alanlar</h2>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="zm-posts">


										@foreach($yorumlar as $yorum)



											<article class="zm-post-lay-e zm-single-post clearfix">
												<div class="zm-post-thumb f-left">
													<a href="/yazi/{{$yorum->yazi->id}}/{{$yorum->yazi->slug}}"><img src="/{{$yorum->yazi->resim}}" alt="img"></a>
												</div>
												<div class="zm-post-dis f-right">
													<div class="zm-post-header">
														<h2 class="zm-post-title"><a href="/yazi/{{$yorum->yazi->id}}/{{$yorum->yazi->slug}}">{{$yorum->yazi->baslik}}</a></h2>
														<div class="zm-post-meta">
															<ul>
																<li class="s-meta"><a class="zm-author"><i class="fa fa-pencil" ></i> {{$yorum->kullanici->name}}</a></li>
																<li class="s-meta"><a class="zm-date"><i class="fa fa-calendar" ></i> {!! date('d-m-y',strtotime($yorum->created_at)) !!}</a></li>
															</ul>
														</div>
													</div>
												</div>
											</article>
										@endforeach
									</div>
								</div>
							</div>
						</aside>
						<!-- Start post layout E -->
						<!-- Start post layout E -->
						<aside class="zm-post-lay-e-area col-xs-12 col-sm-6 col-md-6 col-lg-12 mt-60 hidden-md">
							<div class="row mb-40">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="section-title">
										<h2 class="h6 header-color inline-block uppercase">Popüler İçerikler</h2>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="zm-posts">


										@foreach($populer as $pop)



											<article class="zm-post-lay-e zm-single-post clearfix">
												<div class="zm-post-thumb f-left">
													<a href="/yazi/{{$pop->id}}/{{$pop->slug}}"><img src="/{{$pop->resim}}" alt="img"></a>
												</div>
												<div class="zm-post-dis f-right">
													<div class="zm-post-header">
														<h2 class="zm-post-title"><a href="/yazi/{{$pop->id}}/{{$pop->slug}}">{{$pop->baslik}}</a></h2>
														<div class="zm-post-meta">
															<ul>
																<li class="s-meta"><a class="zm-author"><i class="fa fa-pencil" ></i> {{$pop->kullanici->name}}</a></li>
																<li class="s-meta"><a class="zm-date"><i class="fa fa-calendar" ></i> {!! date('d-m-y',strtotime($pop->created_at)) !!}</a></li>
															</ul>
														</div>
													</div>
												</div>
											</article>
										@endforeach
									</div>
								</div>
							</div>
						</aside>
						<!-- Start post layout E -->

					</div>
				</div>
				<!-- End Right sidebar -->
			</div>

			@if($reklam->link2 != "")
				<div class="advertisement">
					<div class="row mt-40">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
							<a href="{{$reklam->link2}}"><img src="{{$reklam->reklam2}}" onclick="clickAlert()" alt="" style="width: 450px;height: 175px"></a>
						</div>
					</div>
				</div>
			@endif


		</div>
	</div>

@endsection

@section('css')

@endsection

@section('js')
	<script>

		function clickAlert() {
			swal({
				title: 'Lütfen',
				text: 'İletişime Geçiniz...',
				icon: 'success',
				timer: 5000 ,
				buttons: false,
			})
		}
	</script>

@endsection