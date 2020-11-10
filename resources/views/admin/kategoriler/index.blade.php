@extends('admin/template')
@section('icerik')
<div style="float:right;margin:15px 0 5px 0;"><a href="{{route('kategoriler.create')}}" class="btn btn-success">Kategori Ekle</a></div>
<div style="clear:both;"></div>
	<div class="widget-box">
		<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
			<h5>Kategori Yönetimi</h5>
		</div>
		<div class="widget-content nopadding">
			<table class="table table-bordered data-table">
				<thead>
				<tr>
					<th>Kategori Başlık</th>
					<th>Kategori Türü</th>
					<th>Kategori Açıklama</th>
					<th>Düzenle</th>
					<th>Sil</th>
				</tr>
				</thead>
				<tbody>

		@foreach($kategoriler as $kategori)

				<tr class="gradeX">
					<td>{{$kategori->baslik}}</td>
					<td>
					@if(!empty($kategori->ust_id))
					Alt Kategori
						@else
						Ana Kategori
						@endif


					</td>
					<td>{{$kategori->aciklama}}</td>
					<td class="center"><a href="{{route('kategoriler.edit',$kategori->id)}}" class="btn btn-success btn-mini">Düzenle</a></td>

					{!! Form::model($kategori,['route'=>['kategoriler.destroy',$kategori->id],'method'=>'DELETE']) !!}

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

	<script>

	$('.sil').on('click',function(e) {

	var inputData = $('#kategorisil').serialize();
	var dataId = $('#silbtn').attr('data-id');

	$.ajax({

        url: '{{url('yonetim/kategoriler')}}' + '/' + dataId,
        type: 'POST',
        data: inputData,
        success: function () {
            swal({
                title: "Kategori Silindi",
                text: "Lütfen Bekleyin...",
                type: "success",
                timer: 2000,
                showConfirmButton: false
            });
            setInterval('window.location.reload()',2500);
        }

    });
	return false;

});

	</script>

@endsection