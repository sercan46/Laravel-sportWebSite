@extends('anasayfa/template')
@section('icerik')

	<!-- Start page content -->
	<div id="page-content" class="page-wrapper">
		<div class="zm-section single-post-wrap bg-white ptb-70 xs-pt-30">
			<div class="container">
				<div class="row">
					<!-- Start left side -->
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 columns">
						{{--<div class="row mb-40">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="section-title">
									<h2 class="h6 header-color inline-block uppercase">{{$yazi->baslik}}</h2>
								</div>
							</div>
						</div>--}}
						<div class="row">
							<!-- Start single post image formate-->
							<div class="col-md-12">
								<article class="zm-post-lay-single">
									<div class="zm-post-dis">
										<div class="zm-post-header">
											<h2 class="zm-post-title h2">{{$sayfa->baslik}}</h2>

										</div>
										<div class="zm-post-content">

											{!! $sayfa->icerik !!}



										</div>
										<div class="entry-meta-small clearfix ptb-40 mtb-40 border-top border-bottom">

										</div>
										{{--<div class="administrator-info clearfix">
											<div class="administrator-avatar">
												<img alt="administrator" src="images/post/single/author/1.jpg">
											</div>
											<div class="administrator-description">
												<h4 class="post-title"><a href="#">About Thomson Smith</a></h4>
												<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit. </p>
												<div class="share-social-link">
													<a href="#"><i class="fa fa-facebook"></i></a>
													<a href="#"><i class="fa fa-twitter"></i></a>
													<a href="#"><i class="fa fa-google-plus"></i></a>
													<a href="#"><i class="fa fa-rss"></i></a>
													<a href="#"><i class="fa fa-dribbble"></i></a>
												</div>
											</div>
										</div>--}}
									</div>
								</article>
							</div>
							<!-- End single post image formate -->
						{{--	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<nav class="zm-pagination ptb-40 mtb-40 text-center border-bottom border-top">
									<ul class="page-numbers clearfix">
										<li class=" pull-left"><a class="prev page-numbers" href="#">Previous</a></li>
										<li class="pull-right"><a class="next page-numbers" href="#">Next</a></li>
									</ul>
								</nav>
							</div>--}}

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
																	<li class="s-meta"><a class="zm-author"><i class="fa fa-pencil"></i> {{$yorumlar->kullanici->name}}</a></li>
																	<li class="s-meta"><a class="zm-date"><i class="fa fa-calendar"></i> {!! date('d-m-y',strtotime($yorumlar->created_at)) !!}</a></li>
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
														<p><a href="/yazi/{{$sonyorum->yazi->id}}/{{$sonyorum->yazi->slug}}"> {{$sonyorum->kullanici->name}} </a> - <em> “{{$sonyorum->yorum}}” </em>  <strong><a href="/yazi/{{$sonyorum->yazi->id}}/{{$sonyorum->yazi->slug}}">{{$sonyorum->yazi->baslik}}</a></strong></p>
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
			</div>
		</div>
	</div>
	<!-- End page content -->

@endsection

@section('css')

@endsection

@section('js')

@endsection