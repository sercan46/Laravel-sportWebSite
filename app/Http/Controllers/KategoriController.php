<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
		$kategoriler = Kategori::all();
    	return view('admin.kategoriler.index',compact('kategoriler'));
    }


    public function create()
    {
	    $kategoriler = Kategori::where('ust_id',null)->get();
	    return view('admin.kategoriler.create',compact('kategoriler'));
    }

    public function store(Request $request)
    {
    $this->validate(request(),array(
    'baslik'=>'required',
	 'aciklama'=>'required',

    ));

    $kategori = new Kategori();
    $kategori->baslik = request('baslik');
    $kategori->aciklama = request('aciklama');
    $kategori->slug = str_slug(request('baslik'));
    $kategori->ust_id = request('ust_id');
    $kategori->save();

	return Response()->json(['success'=>$kategori]);


    }

    public function show($id)
    {

    }


    public function edit($id)
    {
    	$kategori = Kategori::find($id);
    	$tumkategoriler = Kategori::all();
    	return view('admin.kategoriler.edit',compact('kategori','tumkategoriler'));

    }

    public function update(Request $request, $id)
    {
	    $this->validate(request(),array(
		    'baslik'=>'required',
		    'aciklama'=>'required',

	    ));

	    $kategori = Kategori::find($id);
	    $kategori->baslik = request('baslik');
	    $kategori->aciklama = request('aciklama');
	    $kategori->slug = str_slug(request('baslik'));
	    $kategori->ust_id = request('ust_id');
	    $kategori->save();
        return Response()->json(['success'=>$kategori]);

    }


    public function destroy($id)
    {
        $sil = Kategori::destroy($id);
        if ($sil) {

            alert()
                ->success('Başarılı', 'Kategori Silindi.')
                ->autoClose(2000);
            return back();

        } else {
            alert()
                ->error('Hata', 'Kategori Silinemedi!')
                ->autoClose(2000);
            return back();

        }

    }
}
