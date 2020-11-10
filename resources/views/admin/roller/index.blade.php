@extends('admin/template')
@section('icerik')
    <div style="float:right;margin:15px 0 5px 0;"><a href="{{route('rol.ekle')}}" class="btn btn-success">Yeni Rol Ekle</a></div>
    <div style="clear:both;"></div>
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Kullanıcı Rol Yönetimi</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    <th>Rol İsmi</th>
                    <th>Düzenle</th>
                    <th>Sil</th>
                </tr>
                </thead>
                <tbody>

                @foreach($roller as $rol)

                    <tr class="gradeX">
                        <td>{{$rol->name}}</td>
                        <td class="center"><a href="{{route('rol.duzenle',$rol->id)}}" class="btn btn-success btn-mini">Düzenle</a></td>

                        {!! Form::model($rol,['route'=>['rol.sil',$rol->id],'method'=>'DELETE']) !!}

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