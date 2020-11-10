@extends('admin/template')
@section('icerik')

	<div class="row-fluid">
		<div class="span12">
			<div class="widget-box">
				<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
					<h5>Reklam Ayarları</h5>
				</div>
				<div class="widget-content nopadding">
					<form action="{{route('reklam.guncelle'),1}}" method="POST" class="form-horizontal">
						{{csrf_field()}}
						{{method_field('PUT')}}
					<div class="control-group">
						<label class="control-label">Header Reklam Linki</label>
						<div class="controls">
							<input type="text" class="span11" name="link1" value="{{$reklam->link1}}" />
						</div>
					</div>
						<div class="control-group">
							<label class="control-label">Header Reklam Kodları</label>
							<div class="controls">
								<textarea class="span11" name="reklam1" rows="5"/>{{$reklam->reklam1}}</textarea>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">Footer Reklam Linki</label>
							<div class="controls">
								<input type="text" class="span11" name="link2" value="{{$reklam->link2}}" />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Footer Reklam Kodları</label>
							<div class="controls">
								<textarea class="span11" name="reklam2" rows="5"/>{{$reklam->reklam2}}</textarea>
							</div>
						</div>

					<div class="form-actions">
						<button type="submit" class="btn btn-success">Kaydet</button>
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