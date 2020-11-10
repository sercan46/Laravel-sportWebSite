<footer id="footer" class="footer-wrapper footer-1">
	<!-- Start footer top area -->
	<div class="footer-top-wrap pt-20 bg-dark">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 hidden-sm">
					<div class="zm-widget pr-40">
						<h2 class="h6 zm-widget-title uppercase text-white mb-30">Hakkımızda</h2>
						<div class="zm-widget-content">
							<p style="color:orangered">{{$ayar->hakkimizda}}</p>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-6 col-lg-2">
					<div class="zm-widget">
						<h2 class="h6 zm-widget-title uppercase text-white mb-30">Sosyal Medya</h2>
						<div class="zm-widget-content">
							<div class="zm-social-media zm-social-1">
								<ul>
									<li><a href="https://www.linkedin.com/in/{{$ayar->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i>Linkedln</a></li>
									<li><a href="https://www.instagram.com/{{$ayar->instagram}}" target="_blank"><i class="fa fa-instagram"></i>Instagram</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-6 col-lg-3">
					<div class="zm-widget pr-50 pl-20">
						<h2 class="h6 zm-widget-title uppercase text-white mb-30">LİNKLER</h2>
						<div class="zm-widget-content">
							<div class="zm-category-widget zm-category-1">
								<ul>
									<li><a href="{{route('anasayfa')}}" style="font-weight: bold">Anasayfa</a></li>
								@foreach($sayfalar as $sayfa)
										<li><a href="/sayfa/{{$sayfa->id}}/{{$sayfa->slug}}" style="font-weight: bold">{{$sayfa->baslik}}</a></li>
									@endforeach
										<li><a href="{{route('galerim.formu')}}" style="font-weight: bold">Galerim</a></li>
									<li><a href="{{route('motivasyon.formu')}}" style="font-weight: bold">Motive Edici Sözler</a></li>

									<li><a href="{{route('iletisim.formu')}}" style="font-weight: bold">İletişim</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-6 col-lg-3">
					<div class="zm-widget">
						<h2 class="h6 zm-widget-title uppercase text-white mb-30">ÜCRETSİZ E-MAİL ABONELİĞİ</h2>
						<!-- Start Subscribe From -->
						<div class="zm-widget-content">
							<div class="subscribe-form subscribe-footer">
								<p style="color: #ffc107">Haber Bültenimize Ücretsiz Kayıt Olabilirsiniz.</p>
								<form action="{{route('abone.ol')}}" method="POST">
									{{csrf_field()}}
								<input type="email" name="email" placeholder="E-Mail Adresiniz" required>
									<input type="submit" value="Abone OL">
								</form>
							</div>
						</div>
						<!-- End Subscribe From -->
					</div>

				</div>
			</div>

		</div>
<div class="footer-buttom bg-dark ptb-20">
<hr class=" mlr-80"/>
					<p  class="uppercase ptb-20" style="text-align: center;color: white;font-weight: bold">2019 &copy; {{$ayar->baslik}}.</p>
		</div>
	</div>
</footer>