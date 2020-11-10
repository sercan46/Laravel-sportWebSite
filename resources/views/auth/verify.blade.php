@extends('anasayfa.template')

@section('icerik')
    <div class="zm-section bg-white ptb-70">
        <div class="container">
            <div class="row mb-40">
                 <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                    <div class="section-title">
                        <h2 class="h6 header-color inline-block uppercase">{{ __('LÜTFEN E-MAİL ADRESİNİZİ ONAYLAYABİLMEMİZ İÇİN AKTİVASYON BUTONUNA TIKLAYINIZ!') }}</h2>
                    </div>
                </div>
            </div>
                <div class="row" style="padding-left: 20px">

                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Yeni bir onay talebiniz mail adresinize gönderilmiştir. Lütfen Mail Adresinize Giderek Aktivasyon Kodunu Onaylayınız. Teşekkürler!') }}
                        </div>
                    @endif
                  <a href="{{ route('verification.resend') }}" style="border-width: 2px;font-weight: bold;font-size: 25px;color: blue"> Aktivasyon Yapmak İçin Tıklayınız!</a>
                </div>
            </div>
        </div>

@endsection
