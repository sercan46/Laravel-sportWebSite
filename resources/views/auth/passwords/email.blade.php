@extends('anasayfa.template')

@section('icerik')
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="zm-section bg-white pt-40 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-5">
                        <div class="section-title-2 mb-40">
                                <h3 class="inline-block uppercase" style="color:red">KAYIP ŞİFRE TALEBİ</h3>

                        </div>
                    </div>
                </div>
                <div class="row">

                </div>
                <div class="registation-form-wrap">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="single-input">
                                <label STYLE="color: #1e242b;font-weight: bold">E-MAİL ADRESİNİZİ GİRİNİZ</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="E-Mail Adresiniz" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                    <div class="single-input">
                                        <button class="submit-button mt-20 inline-block" onclick="clickAlert()" type="submit">ŞİFREMİ GÖNDER</button>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

    </form>
@endsection
@section('js')

<script>
    function clickAlert() {
        Swal.fire('Şifreniz E-Mail Adresinize Gönderilmiştir.')
    }
</script>
    @endsection