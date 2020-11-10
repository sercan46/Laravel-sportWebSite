@extends('admin/template')
@section('icerik')

	<div class="row-fluid">
		<div class="span12">
			<div class="widget-box">
				<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
					<h5>Sayfa Ekle</h5>
				</div>

				<div class="widget-content nopadding">
					{!! Form::open(['route'=>'ceviri.store','method'=>'POST','class'=>'form-horizontal']) !!}


					<div class="control-group">
						<label class="control-label">Grup (Türkçe Karakter Kullanmıyoruz)</label>
						<div class="controls">
							<input type="text" class="span11" name="group" required/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Kelime (Türkçe Karakter Kullanmıyoruz)</label>
						<div class="controls">
							<input type="text" class="span11" name="key" required/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Türkçesi</label>
						<div class="controls">
							<input type="text" class="span11" name="tr" required/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">İngilizcesi</label>
						<div class="controls">
							<input type="text" class="span11" name="en" required/>
						</div>
					</div>


					<div class="form-actions">
						<button type="submit" class="btn btn-success">Çeviri Ekle</button>
					</div>
					{!! Form::close() !!}
				</div>
			</div>

		</div>

	</div>

@endsection

@section('css')

@endsection

@section('js')

	<script src="/admin/tinymce/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'textarea' });</script>

@endsection