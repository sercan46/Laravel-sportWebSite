@extends('anasayfa/template')
@section('icerik')
	<section id="page-content" class="page-wrapper">
		<div class="zm-section bg-white pt-30 xs-pt-30 pb-40">
			<div class="container">
				<div class="row">
					<!-- Start left side -->
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 columns">
						<div class="row mb-40">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="section-title">
									<h2 class="h6 header-color inline-block uppercase">{{$kategori->baslik}}</h2>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="zm-posts clearfix">
						@foreach($yazilar as $yazi)

								<div class="col-md-12">
									<article class="zm-post-lay-a">
										<div class="zm-post-thumb">
											<a href="/yazi/{{$yazi->id}}/{{$yazi->slug}}"><img src="/{{$yazi->resim}}" alt="img" width="803" height="350"></a>
										</div>
										<div class="zm-post-dis">
											<div class="zm-post-header">
												<div class="zm-category"><a href="/kategori/{{$kategori->id}}/{{$kategori->slug}}" class="bg-cat-5 cat-btn">{{$kategori->baslik}}</a></div>
												<h2 class="zm-post-title h2"><a href="/yazi/{{$yazi->id}}/{{$yazi->slug}}">{{$yazi->baslik}}</a></h2>
												<div class="zm-post-meta">
													<ul>
														<li class="s-meta"><a  class="zm-author"><i class="fa fa-pencil" ></i> {{$yazi->kullanici->name}}</a></li>
														<li class="s-meta"><a  class="zm-date"><i class="fa fa-calendar" ></i> {!! date('d-m-y',strtotime($yazi->created_at)) !!}</a></li>
													</ul>
												</div>
											</div>

										</div>
									</article>
								</div>

							@endforeach



							</div>
						</div>
					</div>
					<!-- End left side -->
					<!-- Start Right sidebar -->
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 sidebar-warp columns">
						<div class="row">
							<aside class="zm-post-lay-e-area col-sm-6 col-md-12 col-lg-12">
								<div class="row mb-40">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div class="section-title">
											<h2 class="h6 header-color inline-block uppercase">En Çok Yorumlananlar</h2>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div class="zm-posts">

											@foreach($enfazlayorumlar as $yorumlar)


												<article class="zm-post-lay-e zm-single-post clearfix">
													<div class="zm-post-thumb f-left">
														<a href="/yazi/{{$yorumlar->id}}/{{$yorumlar->slug}}"><img src="/{{$yorumlar->resim}}" alt="img"></a>
													</div>
													<div class="zm-post-dis f-right">
														<div class="zm-post-header">
															<h2 class="zm-post-title"><a href="/yazi/{{$yorumlar->id}}/{{$yorumlar->slug}}">{{$yorumlar->baslik}}</a></h2>
															<div class="zm-post-meta">
																<ul>
																	<li class="s-meta"><a href="#" class="zm-author"><i class="fa fa-pencil" ></i> {{$yorumlar->kullanici->name}}</a></li>
																	<li class="s-meta"><a href="#" class="zm-date"><i class="fa fa-calendar" ></i> {!! date('d-m-y',strtotime($yorumlar->created_at)) !!}</a></li>
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
							<!-- End post layout E -->
							<aside class="zm-post-lay-f-area col-sm-6 col-md-12 col-lg-12 mt-70">
								<div class="row mb-40">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div class="section-title">
											<h2 class="h6 header-color inline-block uppercase">Yeni Yorumlar</h2>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div class="zm-posts">


											@foreach($yeniyorumlar as $sonyorum)

												<div class="zm-post-lay-f zm-single-post clearfix">
													<div class="zm-post-dis">
														<p><a href="/yazi/{{$sonyorum->yazi->id}}/{{$sonyorum->yazi->slug}}"> {{$sonyorum->kullanici->name}} </a> - <em>“{{$sonyorum->yorum}}” </em>  <strong><a href="/yazi/{{$sonyorum->yazi->id}}/{{$sonyorum->yazi->slug}}">{{$sonyorum->yazi->baslik}}</a></strong></p>
													</div>
												</div>

											@endforeach
										</div>
									</div>
								</div>
							</aside>
						</div>
					</div>
					<!-- End Right sidebar -->
				</div>
				<!-- Start pagination area -->
				<div class="row hidden-xs">
					<div class="zm-pagination-wrap mt-70">
						<div class="container">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">



									<nav class="zm-pagination ptb-40 text-center">
										<ul class="page-numbers">

											{{$yazilar->links()}}

										</ul>
									</nav>
								</div>
							</div>
						</div>
					</div>
				</div>

			{{--	<li><a class="prev page-numbers" href="#">Previous</a></li>
				<li><span class="page-numbers current">1</span></li>
				<li><a class="page-numbers" href="#">2</a></li>
				<li><a class="page-numbers" href="#">3</a></li>
				<li><a class="page-numbers" href="#">4</a></li>
				<li><a class="page-numbers" href="#">5</a></li>
				<li><span class="page-numbers zm-pgi-dots">...</span></li>
				<li><a class="page-numbers" href="#">15</a></li>
				<li><a class="next page-numbers" href="#">Next</a></li>--}}
				<!-- End pagination area -->
				<!-- Start Advertisement -->
				<div class="advertisement">
					<div class="row mt-40">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
							<a href="#"><img src="images/ad/5.jpg" alt=""></a>
						</div>
					</div>
				</div>
				<!-- End Advertisement -->
			</div>
		</div>
	</section>

@endsection

@section('css')

@endsection

@section('js')

@endsection