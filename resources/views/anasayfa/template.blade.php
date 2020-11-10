<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>{{$ayar->baslik}}</title>
	<meta name="description" content="{{$ayar->aciklama}}">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" sizes="96x96" href="/anasayfa/images/icons/favicon-96x96.png">
	<link rel="apple-touch-icon" href="apple-touch-icon.html">

	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">

	<link rel="stylesheet" href="/anasayfa/css/core.css">

	<link rel="stylesheet" href="/anasayfa/css/shortcode/shortcodes.css">

	<link rel="stylesheet" href="/anasayfa/style.css">

	<link rel="stylesheet" href="/anasayfa/css/responsive.css">

	<link rel="stylesheet" href="/anasayfa/css/custom.css">


	<link href="/anasayfa/css/star-rating.css" media="all" rel="stylesheet" type="text/css" />

	<link href="/anasayfa/krajee-svg/theme.css" media="all" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">

	@yield('css')


	<script src="/anasayfa/js/vendor/modernizr-2.8.3.min.js"></script>


</head>
<body>
<div id="preloader-wrapper">
	<div class="preloader-wave-effect"></div>
</div>
<div class="wrapper">

@include('anasayfa.header')

	@if(request()->route()->getName()=='anasayfa')

		@include('anasayfa.flash')
		@include('anasayfa.yenislider')

	@endif

	<section id="page-content" class="page-wrapper">

		@yield('icerik')

	</section>

@include('anasayfa.footer')

</div>

<script src="/anasayfa/js/vendor/jquery-1.12.1.min.js"></script>
<script src="/anasayfa/js/bootstrap.min.js"></script>
<script src="/anasayfa/js/owl.carousel.min.js"></script>
<script src="/anasayfa/js/plugins.js"></script>
<script src="/anasayfa/js/main.js"></script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
<script src="/anasayfa/js/star-rating.js" type="text/javascript"></script>
<script src="/anasayfa/krajee-svg/theme.js"></script>
<script>
    $("#input-id").rating();

    $("#input-id").rating({'size':'xs'});

</script>
@if (Session::has('alert.config'))
	<script>
        swal({!! Session::pull('alert.config') !!});
	</script>
@endif

<script>
	$(window).load(function() {
		$("#preloader-wrapper").fadeOut(1500).fadeOut("slow");
	})

</script>
@yield('js')

</body>
</html>