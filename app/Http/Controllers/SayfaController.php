<?php

namespace App\Http\Controllers;

use App\Sayfa;
use Illuminate\Http\Request;

class SayfaController extends Controller
{

    public function index()
    {
        $sayfalar = Sayfa::all();
        return view('admin.sayfalar.index',compact('sayfalar'));
    }


    public function create()
    {
        return view('admin.sayfalar.create');
    }

    public function store(Request $request)
    {
        $this->validate(request(),array(
        'baslik'=>'required',
	    'icerik'=>'required',

        ));

        $sayfa = new Sayfa();
        $sayfa->baslik = request('baslik');
        $sayfa->icerik = request('icerik');
        $sayfa->slug = str_slug(request('baslik'));
        $sayfa->save();

	    if ($sayfa) {

            alert()
                ->success('Başarılı', 'Sayfa Eklendi.')
                ->autoClose(2000);
		    return back();

	    } else {
            alert()
                ->error('Hata', 'Sayfa Eklenemedi!')
                ->autoClose(2000);
		    return back();

	    }



    }

    public function show($id)
    {

    }


    public function edit($id)
    {
        $sayfa = Sayfa::find($id);
        return view('admin.sayfalar.edit',compact('sayfa'));
    }


    public function update(Request $request, $id)
    {

	    $this->validate(request(),array(
		    'baslik'=>'required',
		    'icerik'=>'required',

	    ));

	    $sayfa = Sayfa::find($id);
	    $sayfa->baslik = request('baslik');
	    $sayfa->icerik = request('icerik');
	    $sayfa->slug = str_slug(request('baslik'));
	    $sayfa->save();

	    if ($sayfa) {

            alert()
                ->success('Başarılı', 'Sayfa Güncellendi.')
                ->autoClose(2000);
		    return back();

	    } else {
            alert()
                ->error('Hata', 'Sayfa Güncellenemedi!')
                ->autoClose(2000);
		    return back();

	    }



    }
    
    public function destroy($id)
    {
        $sil = Sayfa::destroy($id);
	    if ($sil) {

            alert()
                ->success('Başarılı', 'Sayfa Silindi.')
                ->autoClose(2000);
		    return back();

	    } else {
            alert()
                ->error('Hata', 'Sayfa Silinemedi!')
                ->autoClose(2000);
		    return back();

	    }
    }
}
