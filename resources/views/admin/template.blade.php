<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{$ayar->baslik}}</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="{{$ayar->aciklama}}">
	<link rel="stylesheet" href="/admin/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/admin/css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" href="/admin/css/matrix-style.css" />
	<link rel="stylesheet" href="/admin/css/matrix-media.css" />
	<link href="/admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link rel="stylesheet" href="/admin/css/jquery.gritter.css" />
	<link rel="icon" type="image/png" sizes="96x96" href="/anasayfa/images/icons/favicon-96x96.png">

	@yield('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<div class="header">
	<a href="/" target="_blank">
	<img src="/anasayfa/images/logo/admin.png" style="height: 86px;width: 220px">
	</a>
</div>


<div id="user-nav" class="navbar navbar-inverse">
	<p style="padding-top: 6px;color:darkgoldenrod;font-weight: bold ;"><i class="icon icon-user" style="padding-left: 10px;padding-top: 10px"></i> Merhaba, {{Auth::user()->name}}</p>

</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->

<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="{{route('yonetim.index')}}" class="visible-phone"><i class="icon icon-home"></i> Yönetim Anasayfa</a>
	<ul>
		<li class="{{ Request::is('yonetim') ? 'active' : '' }}" ><a href="{{route('yonetim.index')}}"><i class="icon icon-home"></i> <span>Yönetim Paneli Anasayfa</span></a> </li>
		<li class="{{ Request::is('yonetim*ayarlar') ? 'active' : '' }}"  ><a href="{{route('ayarlar.index')}}"><i class="icon icon-cog"></i> <span>Site Ayarları</span></a> </li>
		<li class="{{ Request::is('yonetim*kategoriler') ? 'active' : '' }}" ><a href="{{route('kategoriler.index')}}"><i class="icon icon-folder-open"></i> <span>Kategori Yönetimi</span></a> </li>
		<li class="{{ Request::is('yonetim*yazilar') ? 'active' : '' }}" ><a href="{{route('yazilar.index')}}"><i class="icon icon-pencil"></i> <span>İçerik Yönetimi</span></a> </li>
		<li class="{{ Request::is('yonetim*kullanicilar') ? 'active' : '' }}" ><a href="{{route('kullanici.index')}}"><i class="icon icon-user"></i> <span>Kullanıcı Yönetimi</span></a> </li>
		<li class="{{ Request::is('yonetim*sayfalar') ? 'active' : '' }}"><a href="{{route('sayfalar.index')}}"><i class="icon icon-copy"></i> <span>Sayfa Yönetimi</span></a> </li>
		<li class="{{ Request::is('yonetim*yorumlar') ? 'active' : '' }}" ><a href="{{route('yorumlar.index')}}"><i class="icon icon-comment"></i> <span>Yorum Yönetimi</span></a> </li>
		<li class="{{ Request::is('yonetim*reklam') ? 'active' : '' }}" ><a href="{{route('reklam.goster')}}"><i class="icon icon-link"></i> <span>Reklam Yönetimi</span></a> </li>
		<li class="{{ Request::is('yonetim*ceviri') ? 'active' : '' }}" ><a href="{{route('ceviri.index')}}"><i class="icon icon-picture"></i> <span>Çeviri Yönetimi</span></a> </li>
	</ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
	<!--breadcrumbs-->
	<div id="content-header">

		<a href="{{route('anasayfa')}}"target="_blank"><i class="icon-home" style="padding-left: 10px;padding-top: 10px"></i> Ana Sayfa</a>
		<a href="{{route('kullanici.duzenle',Auth::user()->id)}}"><i class="icon-user" style="padding-left: 10px"></i> Profilim</a>
		<a href="{{route('yonetim.cikis')}}"><i class="icon-key" style="padding-left: 10px"></i> Çıkış</a>

	</div>
	<!--End-breadcrumbs-->

	<!--Action boxes-->
	<div class="container-fluid">
		@yield('icerik')
	</div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
	<div id="footer" class="span12"> 2019 &copy; Sercan Özbek<a href="">|sercanozbek.net</a> </div>
</div>

<!--end-Footer-part-->

<script src="/admin/js/jquery.min.js"></script>
<script src="/admin/js/jquery.ui.custom.js"></script>
<script src="/admin/js/bootstrap.min.js"></script>
<script src="/admin/js/jquery.flot.min.js"></script>
<script src="/admin/js/jquery.flot.resize.min.js"></script>
<script src="/admin/js/matrix.js"></script>
<script src="/admin/js/jquery.gritter.min.js"></script>
<script src="/admin/js/jquery.uniform.js"></script>
<script src="/admin/js/select2.min.js"></script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
@if (Session::has('alert.config'))
	<script>
        swal({!! Session::pull('alert.config') !!});
	</script>
@endif

@yield('js')

</body>
</html>
