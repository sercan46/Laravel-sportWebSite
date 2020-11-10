@extends('anasayfa/template')
@section('icerik')
	<section id="page-content" class="page-wrapper">
		<!-- Start contact address area  -->
		<div class="zm-section bg-white ptb-65">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-6 col-lg-4 col-sm-8">
						<div class="section-title-2 mb-40">
							<h3 class="inline-block uppercase">İLETİŞİM FORMU</h3>
							<p>Aşağıdaki formu kullanarak bize ulaşabilirsiniz</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-4">
						<div class="single-address text-center">
							<i class="fa fa-home" aria-hidden="true"></i>
							<h4>ADRES</h4>
							<p>{{$ayar->adres}}</p>

						</div>
					</div>
					<div class="col-md-4 col-sm-4 xs-mt-30">
						<div class="single-address text-center">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<h4 class="uppercase">E-MAİL ADRESİ</h4>
							<p>{{$ayar->email}}</p>

						</div>
					</div>
					<div class="col-md-4 col-sm-4 xs-mt-30">
						<div class="single-address text-center">
							<i class="fa fa-phone" aria-hidden="true"></i>
							<h4 class="uppercase">Telefon</h4>
							<p>{{$ayar->telefon}}</p>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="zm-section">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="google-map">
							<div id="googleMap" style="width:100%;height:600px;"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="zm-section bg-white pt-60 pb-40">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-4">
						<div class="section-title-2 mb-40">
							<h3 class="inline-block uppercase">İLETİŞİM FORMU</h3>
						</div>
					</div>
				</div>
				<div class="message-box">
					<form action="{{route('iletisim.gonder')}}"  id="contact-form" method="post">
						{{csrf_field()}}
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="adsoyad" placeholder="Adınız Soyadınız">
								<input type="email" name="email" placeholder="Email Adresiniz*">
								<input type='tel' name="phone" pattern="^\d{11}$" title='11 Haneli Olacak Şekilde Giriniz' placeholder="      Telefon Numaranız*" style="width: 100%;height: 48px;">


                            </div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea name="mesaj" placeholder="Mesajınız..."></textarea>
                                <button id="button" class="submit-button" type="submit" ><i class="fa fa-check-circle"></i> Gönder</button>
							</div>
						</div>
					</form>
					<p class="form-messege"></p>
				</div>
			</div>
		</div>
		<!-- End contact message area -->
	</section>

@endsection

@section('css')

@endsection

@section('js')
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIVeErlZaaAwruruTK1YVDXoByfnqRF4c"></script>
	<script>
		// When the window has finished loading create our google map below
		google.maps.event.addDomListener(window, 'load', init);

		function init() {
			// Basic options for a simple Google Map
			// For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
			var mapOptions = {
				// How zoomed in you want the map to start at (always required)
				zoom: 12,

				scrollwheel: false,

				// The latitude and longitude to center the map (always required)
				center: new google.maps.LatLng(23.7286, 90.3854), // New York

				// How you would like to style the map.
				// This is where you would paste any style found on Snazzy Maps.
				styles: [
					{
						"featureType": "water",
						"elementType": "geometry",
						"stylers": [
							{
								"color": "#e9e9e9"
							},
							{
								"lightness": 17
							}
						]
					},
					{
						"featureType": "landscape",
						"elementType": "geometry",
						"stylers": [
							{
								"color": "#f5f5f5"
							},
							{
								"lightness": 20
							}
						]
					},
					{
						"featureType": "road.highway",
						"elementType": "geometry.fill",
						"stylers": [
							{
								"color": "#ffffff"
							},
							{
								"lightness": 17
							}
						]
					},
					{
						"featureType": "road.highway",
						"elementType": "geometry.stroke",
						"stylers": [
							{
								"color": "#ffffff"
							},
							{
								"lightness": 29
							},
							{
								"weight": 0.2
							}
						]
					},
					{
						"featureType": "road.arterial",
						"elementType": "geometry",
						"stylers": [
							{
								"color": "#ffffff"
							},
							{
								"lightness": 18
							}
						]
					},
					{
						"featureType": "road.local",
						"elementType": "geometry",
						"stylers": [
							{
								"color": "#ffffff"
							},
							{
								"lightness": 16
							}
						]
					},
					{
						"featureType": "poi",
						"elementType": "geometry",
						"stylers": [
							{
								"color": "#f5f5f5"
							},
							{
								"lightness": 21
							}
						]
					},
					{
						"featureType": "poi.park",
						"elementType": "geometry",
						"stylers": [
							{
								"color": "#dedede"
							},
							{
								"lightness": 21
							}
						]
					},
					{
						"elementType": "labels.text.stroke",
						"stylers": [
							{
								"visibility": "on"
							},
							{
								"color": "#ffffff"
							},
							{
								"lightness": 16
							}
						]
					},
					{
						"elementType": "labels.text.fill",
						"stylers": [
							{
								"saturation": 36
							},
							{
								"color": "#333333"
							},
							{
								"lightness": 40
							}
						]
					},
					{
						"elementType": "labels.icon",
						"stylers": [
							{
								"visibility": "off"
							}
						]
					},
					{
						"featureType": "transit",
						"elementType": "geometry",
						"stylers": [
							{
								"color": "#f2f2f2"
							},
							{
								"lightness": 19
							}
						]
					},
					{
						"featureType": "administrative",
						"elementType": "geometry.fill",
						"stylers": [
							{
								"color": "#fefefe"
							},
							{
								"lightness": 20
							}
						]
					},
					{
						"featureType": "administrative",
						"elementType": "geometry.stroke",
						"stylers": [
							{
								"color": "#fefefe"
							},
							{
								"lightness": 17
							},
							{
								"weight": 1.2
							}
						]
					}
				]
			};

			// Get the HTML DOM element that will contain your map
			// We are using a div with id="map" seen below in the <body>
			var mapElement = document.getElementById('googleMap');

			// Create the Google Map using our element and options defined above
			var map = new google.maps.Map(mapElement, mapOptions);

			// Let's also add a marker while we're at it
			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(38.466224, 27.221287),
				map: map,
				title: 'Sports Training!',
				animation:google.maps.Animation.BOUNCE

			});
			var contentString = '<div id="content">'+
					'<div id="siteNotice">'+
					'</div>'+
					'<div id="bodyContent">'+
					'<h4>Ofis Adresi</h4>'+
					'<p>NO:23 Erzene</p>'+
					'</div>'+
					'</div>';
			var infowindow = new google.maps.InfoWindow({
				content: contentString
			});
			infowindow.open(map, marker);
		}
	</script>
@endsection