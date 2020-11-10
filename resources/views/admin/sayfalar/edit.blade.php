@extends('admin/template')
@section('icerik')

	<div class="row-fluid">
		<div class="span12">
			<div class="widget-box">
				<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
					<h5>Sayfa Düzenle : {{$sayfa->baslik}}</h5>
				</div>

				<div class="widget-content nopadding">
					{!! Form::model($sayfa,(['route'=>['sayfalar.update',$sayfa->id],'method'=>'PUT','class'=>'form-horizontal'])) !!}


					<div class="control-group">
						<label class="control-label">Sayfa Başlık</label>
						<div class="controls">
							<input type="text" class="span11" name="baslik" value="{{$sayfa->baslik}}"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Sayfa İçerik</label>
						<div class="controls">
							<textarea name="icerik" class="span11">{!! $sayfa->icerik !!}</textarea>
						</div>
					</div>


					<div class="form-actions">
						<button type="submit" class="btn btn-success">Sayfa Güncelle</button>
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