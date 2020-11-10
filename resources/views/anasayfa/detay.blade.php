@extends('anasayfa/template')
@section('icerik')
	<div id="page-content" class="page-wrapper">
		<div class="zm-section single-post-wrap bg-white ptb-70 xs-pt-30">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 columns">
						<div class="row">
							<div class="col-md-12">
								<article class="zm-post-lay-single">
								@if($yazi->video !="")
										<div class="zm-post-video">
											<div class="embed-responsive-16by9 embed-responsive">
												<iframe src="{{$yazi->video}}" class="embed-responsive-item"></iframe>
											</div>
										</div>
									@else
									<div class="zm-post-thumb">
									<img src="/{{$yazi->resim}}" alt="img">
									</div>
									@endif
									<div class="zm-post-dis">
										<div class="zm-post-header">
											<div class="zm-post-meta">
												<ul style="list-style-type:none">
													<li class="s-meta" ><a class="zm-author"><i class="fa fa-pencil" ></i> {{$yazi->kullanici->name}}</a></li>
													<li class="s-meta"> <a class="zm-date"><i class="fa fa-calendar" ></i> {!! date('d-m-y',strtotime($yazi->created_at)) !!}</a></li>
													<li class="s-meta"><a class="zm-date"><i class="fa fa-eye" ></i> {{$yazi->getPageViews()}}</a></li>
												</ul>
											</div>
											<div class="bg-info">
											<hr/>

											<h2 class="zm-post-title h2  " style="text-align: center;font-size: 40px;color: darkred">{{$yazi->baslik}}</h2>
											<hr/>
											</div>
										</div>
										<div class="zm-post-content">
											{!! $yazi->icerik !!}
										</div>
										<div class="entry-meta-small clearfix ptb-40 mtb-40 border-top border-bottom">
										</div>
									</div>
								</article>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<aside class="zm-post-lay-a2-area">
									<div class="post-title mb-40">
										<h2 class="h6 inline-block">İLGİNİZİ ÇEKEBİLİR</h2>
									</div>
									<div class="row">
										<div class="zm-posts clearfix">

											@foreach($ilgililer as $ilgili)

											<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
												<article class="zm-post-lay-a2">
													<div class="zm-post-thumb">
														<a href="/yazi/{{$ilgili->id}}/{{$ilgili->slug}}"><img src="/{{$ilgili->resim}}" alt="img" width="247" height="177"></a>
													</div>
													<div class="zm-post-dis">
														<div class="zm-post-header">
															<h2 class="zm-post-title h2"><a href="/yazi/{{$ilgili->id}}/{{$ilgili->slug}}">{{$ilgili->baslik}}</a></h2>
															<div class="zm-post-meta">
																<ul>
																	<li class="s-meta"><a class="zm-author"><i class="fa fa-pencil" ></i> {{$ilgili->kullanici->name}}</a></li>
																	<li class="s-meta"><a class="zm-date"><i class="fa fa-calendar" ></i> {!! date('d-m-y',strtotime($ilgili->created_at)) !!}</a></li>
																</ul>
															</div>
														</div>
													</div>
												</article>
											</div>
											@endforeach
										</div>
									</div>
								</aside>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="review-area mt-50 ptb-70 border-top">
									<div class="post-title mb-40">
										<h2 class="h6 inline-block" style="color: #1b6d85">TOPLAM YORUM SAYISI :     {{$yazi->yorumlar->count()}}</h2>
									</div>
									<div class="post-title mb-40">
										<h2 class="h6 inline-block" style="color: #1b6d85">Toplam DEĞERLENDİRME : {{$yazi->yorumlar->count()}} </h2>

										<p style="margin-top:15px;">	<h2 class="h6 inline-block" style="color: #1b6d85">Ortalama Puan : @for($i=1;$i<=$yazi->ratingPercent(100);$i++)

										<i class="fa fa-star" aria-hidden="true"></i>
										@endfor
										</h2>
										</p>
									</div>
									<div class="review-wrap">
										<div class="review-inner" >



										@foreach($yorumlar as $yorum)


											<div class="single-review clearfix" id="yorumlistesi">
												<div class="reviewer-img">
													<img src="/{{$yorum->kullanici->avatar}}" alt="" width="50" height="50">
												</div>
												<div class="reviewer-info">

													<h4 class="reviewer-name"><a>{{$yorum->kullanici->name}}</a></h4>
													<span class="date-time">{!! date('d-m-y',strtotime($yorum->created_at)) !!}</span>
													<p class="reviewer-comment">{{$yorum->yorum}}</p>
												<p>
													@for($i=1;$i<=$yorum->rating;$i++)

														<i class="fa fa-star" aria-hidden="true"></i>

													@endfor
												</p>
												</div>
											</div>

									@endforeach



										</div>
									</div>
								</div>
							</div>
							<!-- End Comment box  -->
							@if(Auth::check())
							<!-- Start comment form -->
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="comment-form-area">
									<div class="post-title mb-40">
										<h2 class="h6 inline-block" style="color: #985f0d">Yorum Yaz</h2>
									</div>
									<div class="form-wrap">
										<form id="yorumformu" action="{{route('yorum.gonder')}}" method="post">
											{{csrf_field()}}
											<div class="form-inner clearfix">
													<div class="single-input">
														<input type="hidden" value="{{$yazi->id}}" name="yazi">
														<div class="post-title mb-40">
															<h2 class="h6 inline-block" style="margin-bottom:15px;">DEĞERLENDİRME</h2>
															<input id="input-id" type="text" class="rating" data-size="xs" name="derece">
														</div>


													<textarea class="textarea" name="yorum" id="yorumalani" placeholder="Yorumunuzu Yazın..."></textarea>
												</div>
												<button class="submit-button" id="gonder"> <i class="fa fa-send"> Gönder</i></button>
											</div>
										</form>
									</div>
								</div>
							</div>
							@else
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										Yorum Yapabilmek İçin <a href="{{route('login')}}">GİRİŞ</a> Yapın Yada <a href="{{route('register')}}">Kayıt Olun</a>

									</div>



								@endif
							<!-- End comment form -->
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
																<li class="s-meta"><a class="zm-author"><i class="fa fa-pencil" ></i> {{$yorumlar->kullanici->name}}</a></li>
																<li class="s-meta"><a class="zm-date"><i class="fa fa-calendar" ></i> {!! date('d-m-y',strtotime($yorumlar->created_at)) !!}</a></li>
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

											<div class="zm-post-lay-f zm-single-post clearfix" id="yorumlist">
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
			</div>
		</div>
	</div>
	<!-- End page content -->

@endsection

@section('css')

@endsection

@section('js')
	<script>
        $(function(){

            $('#yorumformu').on('submit',function(e){
                $.ajaxSetup({
                    header:$('meta[name="_token"]').attr('content')
                })
                e.preventDefault(e);

                var yorum = 	document.getElementById("yorumalani").value;
                var derece = document.getElementById("input-id").value;


                if(yorum==""){
                    swal({
                        title: "Hata",
                        text: "Yorumunuzu Yazın",
                        type: "error",
                        showConfirmButton:false,
                        timer: 1000,
                    });

				}else if(derece=="") {


                    swal({
                        title: "Hata",
                        text: "Değerlendirme Seçin",
                        type: "error",
                        showConfirmButton:false,
                        timer: 1000,
                    });

                }

                $.ajax({

                    type:"POST",
                    url:"{{route('yorum.gonder')}}",
                    data:$(this).serialize(),
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
                        swal({
                            title: data.baslik,
                            text: data.mesaj,
                            type: data.tur,
                            showConfirmButton:false,
                            timer: 1000,
                        })
							.then(data)
                        {

                          document.getElementById("yorumformu").reset();
                            $("#yorumlistesi").load("{{url()->current()}}");


                        }


                    },

                    error: function(data){
					console.log(error);
                    }
                })
            });
        });

	</script>

@endsection