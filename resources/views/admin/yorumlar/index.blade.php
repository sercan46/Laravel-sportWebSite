@extends('admin/template')
@section('icerik')
	<div class="widget-box">
		<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
			<h5>Yorum Yönetimi</h5>
		</div>
		<div class="widget-content nopadding">
			<table class="table table-bordered data-table">
				<thead>
				<tr>
					<th>Yazan</th>
					<th>Yorum </th>
					<th>İçerik</th>
					<th>Tarih</th>
					<th>Durum</th>
					<th width="5%">Düzenle</th>
					<th width="5%">Sil</th>
				</tr>
				</thead>
				<tbody>

				@foreach($yorumlar as $yorum)

					<tr class="gradeX">
						<td>{{$yorum->kullanici->name}}</td>
						<td>{!! str_limit(strip_tags($yorum->yorum),$limit=100,$end='...') !!}</td>
						<td>{{$yorum->yazi->baslik}}</td>
						<td>{!! date('d-m-y',strtotime($yorum->created_at)) !!}</td>
<td>

	@if($yorum->onay==0)

		<a href="{{route('yorum.onayla',$yorum->id)}}" class="btn btn-success btn-mini">Onayla</a>


		@else


		<a href="{{route('yorum.onaykaldir',$yorum->id)}}" class="btn btn-danger btn-mini">Onay Kaldır</a>

	@endif


</td>



						<td class="center"><a href="{{route('yorumlar.edit',$yorum->id)}}" class="btn btn-success btn-mini">Düzenle</a></td>

						{!! Form::model($yorum,['route'=>['yorumlar.destroy',$yorum->id],'method'=>'DELETE']) !!}

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