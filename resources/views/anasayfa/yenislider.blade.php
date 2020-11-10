<div class="slider-post-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-8">
				<div class="slider-post-area-content">
					<ul class="slide-posts owl-carousel list-unstyled">

						@foreach($sliders as $slider)
						<li class="item">
							<a href="/yazi/{{$slider->id}}/{{$slider->slug}}"><img src="/{{$slider->resim}}" alt="img" width="803" height="467"></a>
						</li>
					@endforeach

					</ul>
					<ul class="posts-thumbnails-wrapper list-unstyled"style="padding-top: 10px">

						@foreach($sliders as $slider)
						<li class="post-thumbnail">
							<a href="#"><img src="/{{$slider->resim}}" alt="img" width="134" height="78"></a>
						</li>
						@endforeach

					</ul>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-md">
				<aside class="zm-post-lay-e-area">
					<div class="row mb-30">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="zm-posts-tab-menu">
								<ul class="nav nav-tabs">
									<li><a data-toggle="tab" href="#latest_posts"  style="background-color:yellow;font-weight: bold">Popüler İçerikler</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="zm-posts-tab-content tab-content">
								<div id="latest_posts" class="zm-posts tab-pane fade in active">

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
					</div>
				</aside>
			</div>
		</div>
	</div>
</div>