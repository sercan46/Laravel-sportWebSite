@extends('admin/template')
@section('icerik')

	<div class="row-fluid">
		<div class="span12">
			<div class="widget-box">
				<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
					<h5>İçerik Ekle</h5>
				</div>

				<div class="widget-content nopadding">
					{!! Form::open(['route'=>'yazilar.store','method'=>'POST','class'=>'form-horizontal','files'=>'true']) !!}

					<div class="control-group">
						<label class="control-label">Kategori Seçin</label>
						<div class="controls">
							<select name="kategori" class="span11">
								<option value="" selected>Kategori Seçin</option>
								@foreach($kategoriler as $kategori)

									<option value="{{$kategori->id}}">{{$kategori->baslik}}</option>


								@endforeach

							</select>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">İçerik Başlık</label>
						<div class="controls">
							<input type="text" class="span11" name="baslik"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">İçerik Açıklama</label>
						<div class="controls">
							<textarea name="icerik" class="span11 my-editor"></textarea>
						</div>
					</div>


					<div class="control-group">
						<label class="control-label">Slider İçinde Göster</label>
						<div class="controls">
							<select name="slider" class="span11">

<option value="goster">Göster</option>
								<option value="gosterme">Gösterme</option>


							</select>
						</div>
					</div>



					<div class="control-group">
						<label class="control-label">İçerik Resmi</label>
						<div class="controls">
							<input type="file" class="span11" name="resim"/>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">İçerik Video</label>
						<div class="controls">
							<textarea name="video" class="span11"></textarea>
						</div>
					</div>


					<div class="form-actions">
						<button type="submit" class="btn btn-success">İçerik Ekle</button>
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
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script>
        var editor_config = {
            path_absolute : "/",
            selector: "textarea.my-editor",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };

        tinymce.init(editor_config);
	</script>

@endsection