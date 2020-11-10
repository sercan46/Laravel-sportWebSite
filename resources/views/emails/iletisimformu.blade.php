@component('mail::layout')
	{{-- Header --}}
	@slot('header')
		@component('mail::header', ['url' => config('app.url')])
			{{$gidecekler['sitebaslik']}}
		@endcomponent
	@endslot

	{{-- Body --}}
	**Gönderen:** {{$gidecekler['adsoyad']}}<br/>
	**E-Mail Adresi:** {{$gidecekler['email']}}<br/>
	**Telefon Numarası:** {{$gidecekler['phone']}}<br/>
	**Mesaj:** {{$gidecekler['mesaj']}}

	{{-- Subcopy --}}
	@isset($subcopy)
		@slot('subcopy')
			@component('mail::subcopy')
				{{ $subcopy }}
			@endcomponent
		@endslot
	@endisset

	{{-- Footer --}}
	@slot('footer')
		@component('mail::footer')
			{{$gidecekler['sitebaslik']}}
		@endcomponent
	@endslot
@endcomponent
