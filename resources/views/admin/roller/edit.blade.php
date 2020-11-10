@extends('admin/template')
@section('icerik')

    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Rol Güncelle {{$rol->name}}</h5>
                </div>

                <div class="widget-content nopadding">
                    {!! Form::open(['route'=>['rol.guncelle',$rol->id],'method'=>'PUT','class'=>'form-horizontal']) !!}

                    <div class="control-group">
                        <label class="control-label">Rol İsmi</label>
                        <div class="controls">
                            <input type="text" class="span11" name="name" value="{{$rol->name}}"/>
                        </div>
                    </div>


                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Güncelle</button>
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

@endsection