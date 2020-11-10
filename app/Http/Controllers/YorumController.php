<?php

namespace App\Http\Controllers;

use App\Yorum;
use Illuminate\Http\Request;

class YorumController extends Controller
{

    public function index()
    {
        $yorumlar = Yorum::all();
        return view('admin.yorumlar.index',compact('yorumlar'));
    }


    public function onayla($id) {

    $yorum = Yorum::find($id);
    $yorum->onay = 1;
    $yorum->save();
        alert()
            ->success('Başarılı', 'Yorum Onaylandı.')
            ->autoClose(2000);
        return back();

    }

	public function onaykaldir($id) {

		$yorum = Yorum::find($id);
		$yorum->onay = 0;
		$yorum->save();
        alert()
            ->success('Başarılı', 'Yorum Onayı Kaldırıldı!')
            ->autoClose(2000);
		return back();

	}

    public function create()
    {

    }


    public function store(Request $request)
    {

    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $yorum = Yorum::find($id);
        return view('admin.yorumlar.edit',compact('yorum'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(request(),array('yorum'=>'required'));

        $yorum = Yorum::find($id);
        $yorum->yorum = request('yorum');
        $yorum->save();
        alert()
            ->success('Başarılı', 'Yorum Güncellendi')
            ->autoClose(2000);
	    return redirect()->route('yorumlar.index');
    }


    public function destroy($id)
    {
        Yorum::destroy($id);
        alert()
            ->success('Başarılı', 'Yorum Silindi')
            ->autoClose(2000);
	    return redirect()->route('yorumlar.index');

    }
}
