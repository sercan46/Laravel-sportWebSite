@extends('anasayfa.template')

@section('icerik')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="zm-section bg-white pt-40 pb-70" style="width:700px;margin:0 auto;">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-5">
                        <div class="section-title-2 mb-40">
                            <h3 class="inline-block uppercase">Yeni Kullanıcı Kaydı</h3>
                            <p>Aşağıdaki formu Doldurarak Hızlıca Kayıt Olabilirsiniz</p>
                        </div>
                    </div>
                </div>
                <div class="registation-form-wrap">
                    <form action="#">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="single-input">
                                    <label>Adınız Soyadınız</label>
                                    <input id="name" type="text" class="{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="single-input">
                                    <label>Email</label>
                                    <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="single-input">
                                    <label>Şifreniz</label>
                                    <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="single-input">
                                    <label>Yeni Şifreniz</label>
                                    <input id="password-confirm" type="password" name="password_confirmation" required>
                                </div>



                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                <div class="single-input">
                                    <button class="submit-button mt-20 inline-block" type="submit">Kayıt OL</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </form>
@endsection
