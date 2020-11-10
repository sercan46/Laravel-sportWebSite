@extends('admin/template')
@section('icerik')

	<div class="row-fluid">
		<div class="span12">
			<div class="widget-box">
				<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
					<h5>Yeni Kullanıcı Ekle</h5>
				</div>

				<div class="widget-content nopadding">
					<form method="POST" action="{{ route('kullanici.kayit') }}" class="form-horizontal" enctype="multipart/form-data">
						@csrf
					<div class="control-group">
						<label class="control-label">Yetki</label>
						<div class="controls">
							<select name="yetki" class="span11">
								<option value="" selected>Standart Kullanıcı</option>

								<option value="admin">Admin</option>

							</select>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Kullanıcı İsmi</label>
						<div class="controls">
							<input id="name" type="text" class="span11{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

							@if ($errors->has('name'))
								<span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
							@endif
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">E-Mail Adresi</label>
						<div class="controls">
							<input id="email" type="email" class="span11{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

							@if ($errors->has('email'))
								<span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
							@endif
						</div>
					</div>

						<div class="control-group">
							<label class="control-label">Şifre</label>
							<div class="controls">
								<input id="password" type="password" class="span11{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

								@if ($errors->has('password'))
									<span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">Tekrar Şifre</label>
							<div class="controls">
								<input id="password-confirm" type="password" class="span11" name="password_confirmation" required>

							</div>
						</div>


						<div class="control-group">
							<label class="control-label">Avatar</label>
							<div class="controls">
								<input type="file" class="span11" name="avatar">

							</div>
						</div>



						<div class="form-actions">
						<button type="submit" class="btn btn-success">Kullanıcı Ekle</button>
					</div>
					</form>
				</div>
			</div>

		</div>

	</div>

@endsection

@section('css')

@endsection

@section('js')

@endsection