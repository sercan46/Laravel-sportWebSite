<!--Standart Form Yöntemiyle Post İşlemi-->

<form action="{{route('kategoriler.store')}}" method="POST" class="form-horizontal">
    {{csrf_field()}}
      <div class="control-group">
        <label class="control-label">Kategori Başlık</label>
        <div class="controls">
            <input type="text" class="span11" name="baslik"/>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-success">Kategori Ekle</button>
    </div>
</form>

<!-- yazı düzenleme sayfası için controllerdan gelen id değeri ile edit.blade sayfasındaki form yapısı-->

<form action="{{route('kategoriler.update',$post->id)}}" method="PUT" class="form-horizontal">
    {{csrf_field()}}
    <div class="control-group">
        <label class="control-label">Kategori Başlık</label>
        <div class="controls">
            <input type="text" class="span11" name="baslik" value="{{$post->baslik}}"/>
        </div>
    </div>


    <div class="form-actions">
        <button type="submit" class="btn btn-success">Kategori Ekle</button>
    </div>
</form>

<!-- herhangi bir yazıyı silmek için yine sil butonuna tıkladığımızda gidecek olan silme işlemi için id değeri belirtme-->

<form action="{{route('kategoriler.destroy',$post->id)}}" method="DELETE" class="form-horizontal">
    {{csrf_field()}}

    <div class="form-actions">
        <button type="submit" class="btn btn-success">Sil</button>
    </div>
</form>

<!-- içerisinde resim yükleme işlemi olan bir form için mutlaka multipart eklemelisiniz-->

<form action="{{route('kategoriler.store'}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="control-group">
        <label class="control-label">Resim Seçiniz</label>
        <div class="controls">
            <input type="file" class="span11" name="baslik"/>
        </div>
    </div>


    <div class="form-actions">
        <button type="submit" class="btn btn-success">Gönder</button>
    </div>
</form>