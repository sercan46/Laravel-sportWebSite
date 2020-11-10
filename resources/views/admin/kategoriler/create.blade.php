@extends('admin/template')
@section('icerik')

	<div class="row-fluid">
		<div class="span12">
			<div class="widget-box">
				<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
					<h5>Yeni Kategori Ekle</h5>
				</div>

				<div class="widget-content nopadding">
				<form action="{{route('kategoriler.store')}}" method="POST" class="form-horizontal" onsubmit="return ajaxekle();" id="ajax-form">
{{csrf_field()}}
					<div class="control-group">
						<label class="control-label">Üst Kategori</label>
						<div class="controls">
							<select name="ust_id" class="span11">
<option value="" selected>Üst Kategori</option>
						@foreach($kategoriler as $kategori)

						<option value="{{$kategori->id}}">{{$kategori->baslik}}</option>


							@endforeach


							</select>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Kategori Başlık</label>
						<div class="controls">
							<input type="text" class="span11" name="baslik"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Site Açıklama</label>
						<div class="controls">
							<input type="text" class="span11" name="aciklama"/>
						</div>
					</div>

					<div class="form-actions">
						<button type="submit" class="btn btn-success">Kategori Ekle</button>
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
	<script>
	function ajaxekle(){
	var form = $("#ajax-form");
	var form_data = $("#ajax-form").serialize();
    $.ajaxSetup({
	headers: {
     'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
     }
     });
     $.ajax({
     type:"POST",
     url:"{{route('kategoriler.store')}}",
     data : form_data,
     success: function() {
     swal({
     title: "Kategori Eklendi",
     text: "Lütfen Bekleyin...",
     type:"success",
     timer: 2000,
     showConfirmButton: false
      });
     document.getElementById("ajax-form").reset();

 }
});
return false;
}

</script>

<script src="https://code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

@endsection