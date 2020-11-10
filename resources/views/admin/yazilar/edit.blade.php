@extends('admin/template')
@section('icerik')

	<div class="row-fluid">
		<div class="span12">
			<div class="widget-box">
				<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
					<h5>İçerik Düzenle : {{$yazi->baslik}}</h5>
				</div>

				<div class="widget-content nopadding">
					{!! Form::model($yazi,['route'=>['yazilar.update',$yazi->id],'method'=>'PUT','class'=>'form-horizontal','files'=>'true'])!!}

					<div class="control-group">
						<label class="control-label">Kategori Seçin</label>
						<div class="controls">
							<select name="kategori" class="span11">
								<option value="{{$yazi->kategorisi->id}}" selected>{{$yazi->kategorisi->baslik}}</option>
								@foreach($kategoriler as $kategori)

									<option value="{{$kategori->id}}">{{$kategori->baslik}}</option>


								@endforeach

							</select>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">İçerik Başlık</label>
						<div class="controls">
							<input type="text" class="span11" name="baslik" value="{{$yazi->baslik}}"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">İçerik Açıklama</label>
						<div class="controls">
							<textarea name="icerik" class="span11">{!! $yazi->icerik !!}</textarea>
						</div>
					</div>


					<div class="control-group">
						<label class="control-label">Slider İçinde Göster</label>
						<div class="controls">
							<select name="slider" class="span11">

							@if($yazi->slider=="goster")

								<option value="goster" selected>Göster</option>
								<option value="gosterme">Gösterme</option>


								@else
									<option value="gosterme" selected>Gösterme</option>
									<option value="goster">Göster</option>


								@endif


							</select>
						</div>
					</div>
					<div class="control-group">
							<label class="control-label">Mevcut Resim</label>
						<div class="controls">
							<img border="0" src="/{{$yazi->resim}}" width="150" height="150">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Resim Seç</label>
						<div class="controls">
							<input type="file" class="span11" name="resim"/>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">İçerik Video</label>
						<div class="controls">
							<textarea name="video" class="span11">{{$yazi->video}}</textarea>
						</div>
					</div>




					<div class="form-actions">
						<button type="submit" class="btn btn-success">İçerik Kaydet</button>
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