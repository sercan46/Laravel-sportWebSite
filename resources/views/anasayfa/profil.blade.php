@extends('anasayfa/template')

@section('icerik')
	<section id="page-content" class="page-wrapper">

	<form method="POST" action="{{ route('profil.guncelle',Auth::user()->id) }}" enctype="multipart/form-data">
		@csrf
		<div class="zm-section bg-white pt-40 pb-70" >
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-5">
						<div class="section-title-2 mb-40">
							<h3 class="inline-block uppercase">Profil Düzenle : {{$profilim->name}}</h3>

						</div>
					</div>
				</div>
				<div class="row">

				</div>
				<div class="registation-form-wrap">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="single-input">
								<label>Adınız Soyadınız</label>
								<input id="email" type="text" class="form-control" name="name" value="{{$profilim->name}}" required>


							</div>
							<div class="single-input">
								<label>E-Mail ADRESİ</label>
								<input id="email" type="email" class="form-control" name="email" value="{{$profilim->email}}" required>


							</div>
							<div class="single-input">
								<label>ŞİFRENİZ</label>
								<input id="password" type="password" class="form-control" name="password" placeholder="Şifrenizi Değiştirmek İsterseniz Tekrardan Şifre Girişi Yapabilirsiniz.">

							</div>
							<div class="single-input">
								<label>ŞİFRENİZİ DOĞRULAYIN</label>
								<input id="password" type="password" class="form-control" name="password_tekrar">

							</div>

							<div class="single-input">
							<img border="0" src="/{{$profilim->avatar}}" width="75" height="75">

							</div>




							<div class="single-input">
								<label>Avatar</label>
								<input type="file" class="form-control" name="avatar">

							</div>







						</div>

					</div>
					<div class="row">
						<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
							<div class="single-input">
								<button class="submit-button mt-20 inline-block" type="submit">PROFİLİ GÜNCELLE</button>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>

	</form>
	</section>
@endsection
