@extends('admin/template')
@section('icerik')
	<div style="float:right;margin:15px 0 5px 0;"><a href="{{route('ceviri.create')}}" class="btn btn-success">Çeviri Ekle</a></div>
	<div style="clear:both;"></div>
	<div class="widget-box">
		<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
			<h5>Çeviri Yönetimi</h5>
		</div>
		<div class="widget-content nopadding">
			<table class="table table-bordered data-table">
				<thead>
				<tr>
					<th width="20%">Grup</th>
					<th width="20%">Kelime</th>
					<th width="20%">İngilizce</th>
					<th width="20%">Türkçe</th>
					<th width="5%">Düzenle</th>
					<th width="5%">Sil</th>
				</tr>
				</thead>
				<tbody>

			@foreach($ceviriler as $kelime)

					<tr class="gradeX">
						<td>{{$kelime->group}}</td>

						<td>{{$kelime->key}}</td>
@foreach($kelime->text as $key=>$yazi)
						<td>
						{{$yazi}}


						</td>

						@endforeach
						<td class="center"><a href="{{route('ceviri.edit',$kelime->id)}}" class="btn btn-success btn-mini">Düzenle</a></td>

						{!! Form::model($kelime,['route'=>['ceviri.destroy',$kelime->id],'method'=>'DELETE']) !!}

						<td class="center">

							<button type="submit" class="btn btn-danger btn-mini">Sil</button>

						</td>

						{!! Form::close() !!}



					</tr>

				@endforeach


				</tbody>
			</table>
		</div>
	</div>

	{{--	<form action="{{route('kategoriler.destroy',$kategori->id)}}" method="DELETE">
		{{csrf_field()}}
	</form>--}}

@endsection

@section('css')
	<link rel="stylesheet" href="/admin/css/uniform.css" />
	<link rel="stylesheet" href="/admin/css/select2.css" />
@endsection

@section('js')
	<script src="/admin/js/excanvas.min.js"></script>
	<script src="/admin/js/jquery.min.js"></script>
	<script src="/admin/js/jquery.ui.custom.js"></script>
	<script src="/admin/js/bootstrap.min.js"></script>

	<script src="/admin/js/jquery.dataTables.min.js"></script>
	<script src="/admin/js/matrix.tables.js"></script>

@endsection