@extends('admin/template')
@section('icerik')
	<div style="float:right;margin:15px 0 5px 0;"><a href="{{route('kullanici.ekle')}}" class="btn btn-success">Kullanıcı Ekle</a></div>
	<div style="clear:both;"></div>
	<div class="widget-box">
		<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
			<h5>Kullanıcı Yönetimi</h5>
		</div>
		<div class="widget-content nopadding">
			<table class="table table-bordered data-table">
				<thead>
				<tr>
					<th>Kullanıcı Adı</th>
					<th>Kullanıcı E-Mail</th>
					<th>Kullanıcı Yetki</th>
					<th>Düzenle</th>
					<th>Sil</th>
				</tr>
				</thead>
				<tbody>

				@foreach($kullanicilar as $kullanici)

					<tr class="gradeX">
						<td>{{$kullanici->name}}</td>
						<td>
							{{$kullanici->email}}

						</td>
						<td>

					@if($kullanici->yetki=="admin")

							Admin

						@else

							Standart Kullanıcı

						@endif



						</td>
						<td class="center"><a href="{{route('kullanici.duzenle',$kullanici->id)}}" class="btn btn-success btn-mini">Düzenle</a></td>

<form action="{{route('kullanici.sil',$kullanici->id)}}" method="POST">
	{{csrf_field()}}
	{{method_field('DELETE')}}
{{--	{{method_field('PATCH')}}--}}

						<td class="center">

							<button type="submit" class="btn btn-danger btn-mini">Sil</button>

						</td>
</form>

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