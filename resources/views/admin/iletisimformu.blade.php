@extends('admin/template')
@section('icerik')

	<div class="row-fluid">
		<div class="span12">
			<div class="widget-box">
				<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
					<h5>İletişim Formu</h5>
				</div>

				<div class="widget-content nopadding">

<form action="{{route('iletisim.gonder')}}" method="POST" class="form-horizontal">
		{{csrf_field()}}

					<div class="control-group">
						<label class="control-label">Ad Soyad</label>
						<div class="controls">
							<input type="text" class="span11" name="adsoyad"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">E-Mail Adresi</label>
						<div class="controls">
							<input type="text" class="span11" name="email"/>
						</div>
					</div>
	<div class="control-group">
		<label class="control-label">Mesajınız</label>
		<div class="controls">
			<input type="text" class="span11" name="mesaj"/>
		</div>
	</div>

					<div class="form-actions">
						<button type="submit" class="btn btn-success">Formu gönder</button>
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