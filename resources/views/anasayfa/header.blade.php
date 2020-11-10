<header  class="header-area header-wrapper bg-white clearfix">
	<div class="sidebar-menu">
		<div class="sidebar-menu-inner"></div>
		<span class="fa fa-remove"></span>
	</div>
	<div class="header-top-bar ptb-10" style="background-color: #0E0E0E">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-7  hidden-xs">
					<div class="header-top-left">
						<nav class="header-top-menu zm-secondary-menu">
							<ul>
								<li><a href="{{route('anasayfa')}}" style="font-weight: bold">Anasayfa</a></li>
								@foreach($sayfalar as $sayfa)
									<li><a href="/sayfa/{{$sayfa->id}}/{{$sayfa->slug}}" style="font-weight: bold">{{$sayfa->baslik}}</a></li>
								@endforeach
								<li><a href="{{route('galerim.formu')}}" style="font-weight: bold">GALERİM</a></li>
								<li><a href="{{route('motivasyon.formu')}}" style="font-weight: bold">MOTİVE EDİCİ SÖZLER</a></li>
								<li><a href="{{route('iletisim.formu')}}" style="font-weight: bold">İLETİŞİM</a></li>
							</ul>
						</nav>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
					<div class="header-top-right clierfix text-right">
						<div class="header-social-bookmark topbar-sblock">
							<ul>
								<li><a href="https://www.linkedin.com/in/{{$ayar->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="https://www.instagram.com/{{$ayar->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
							</ul>
						</div>
						<div class="user-accoint topbar-sblock">
							@if(!Auth::check())
							<span class="login-btn uppercase">GİRİŞ YAP</span> |
								<span class="kayit-btn uppercase"><a href="{{route('register')}}">Kayıt Ol</a></span>
							<div class="login-form-wrap bg-white">
								<form method="POST" action="{{ route('login') }}" class="zm-signin-form text-left">
									@csrf
									<input id="email" type="email" class="zm-form-control username{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="E-Mail Adresiniz" required>
									@if ($errors->has('email'))
										<span class="invalid-feedback">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
									@endif
									<input id="password" type="password" class="zm-form-control password{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Şifreniz" required>
									@if ($errors->has('password'))
										<span class="invalid-feedback">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
									@endif
									<input type="checkbox" name="remember" class="remember" {{ old('remember') ? 'checked' : '' }}> &nbsp;Beni Hatırla<br>
									<div class="zm-submit-box clearfix  mt-20">
										<input type="submit" value="Giriş">
										<a href="{{route('register')}}">Kayıt Ol</a>
									</div>
									<a href="{{ route('password.request') }}" class="zm-forget">Şifremi Unuttum</a>
								</form>
							</div>
								@else
								@if(Auth::user()->yetki=="admin")
									<span class="login-btn uppercase"><a href="{{route('yonetim.index')}}" target="_blank">YÖNETİM PANELİ</a></span> |
								@endif
								<span class="login-btn uppercase"><a href="/kullanici/">PROFİLİM</a></span> |
									<span class="login-btn uppercase"><a href="{{route('kullanici.cikis')}}">ÇIKIŞ</a></span>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="header-middle-area ">
		<div class="container-fluid">
			<div class="row">
					<div class="global-table">
						<div class="global-row">
							<div class="global-cell">
								<div class="logo">
									<img src="/{{$ayar->logo}}" class="img-responsive" alt="main logo" style="width: 100%">
								</div>
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
	<div class="header-bottom-area hidden-sm hidden-xs" >
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="menu-wrapper  bg-theme clearfix">
						<div class="row">
							<div class="col-md-11">
								<div class="mainmenu-area">
									<nav class="primary-menu uppercase " style="font-weight: bold;">
										<ul class="clearfix">
											@foreach($kategoriler as $kategori)
													<li class="current drop"><a href=@if($kategori->altkategori->count() > 0) '#' @else"/kategori/{{$kategori->id}}/{{$kategori->slug}}"@endif>{{$kategori->baslik}}</a>
														@if($kategori->altkategori->count())
															<ul class="dropdown" style="font-weight: bold">
																@foreach($kategori->altkategori as $altkategori)
																		<li><a href="/kategori/{{$altkategori->id}}/{{$altkategori->slug}}">{{$altkategori->baslik}}</a></li>
																@endforeach
															</ul>
														@endif
													</li>
											@endforeach
										</ul>
									</nav>
								</div>
							</div>
							<div class="col-md-1">
								<div class="search-wrap pull-right">
									<div class="search-btn"><i class="fa fa-search"></i></div>
									<div class="search-form">
										<form action="{{route('arama.yap')}}" method="POST">
											{{csrf_field()}}
											<input type="search" placeholder="Arama Yap" name="kelime">
											<button type="submit"><i class='fa fa-search'></i></button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="mobile-menu-area hidden-md hidden-lg">
		<div class="fluid-container">
			<div class="mobile-menu clearfix">
				<div class="search-wrap mobile-search">
					<div class="mobile-search-btn"><i class="fa fa-search"></i></div>
					<div class="mobile-search-form">
						<form action="#">
							<input type="text" placeholder="Search">
							<button type="submit"><i class='fa fa-search'></i></button>
						</form>
					</div>
				</div>
				<nav id="mobile_dropdown">
					<ul>
						<li><a href="{{route('anasayfa')}}" style="font-weight: bold">Anasayfa</a>
						@foreach($kategoriler as $kategori)

							<li class="current drop"><a style="color: #bbbfc3" href= @if($kategori->altkategori->count() > 0) '#' @else "/kategori/{{$kategori->id}}/{{$kategori->slug}}"  @endif>{{$kategori->baslik}}</a>
								@if($kategori->altkategori->count())
									<ul>
										@foreach($kategori->altkategori as $altkategori)
											<li><a href="/kategori/{{$altkategori->id}}/{{$altkategori->slug}}">{{$altkategori->baslik}}</a></li>
										@endforeach
									</ul>
								@endif
							</li>
							@endforeach
						@foreach($sayfalar as $sayfa)
							<li><a href="/sayfa/{{$sayfa->id}}/{{$sayfa->slug}}" style="font-weight: bold">{{$sayfa->baslik}}</a></li>
						@endforeach
							<li><a href="{{route('galerim.formu')}}" style="font-weight: bold">GALERİM</a></li>
						<li><a href="{{route('motivasyon.formu')}}" style="font-weight: bold">MOTİVE EDİCİ SÖZLER</a></li>
						<li><a href="{{route('iletisim.formu')}}" style="font-weight: bold">İLETİŞİM</a></li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</header>
