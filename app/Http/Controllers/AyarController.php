<?php

namespace App\Http\Controllers;
use App\Ayar;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
class AyarController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

	public function index()
	{
		$ayarlar = Ayar::find(1);
		return view('admin.ayarlar.create', compact('ayarlar'));
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

	}

	public function update(Request $request, $id)
	{
		$this->validate(request(), array(
			'baslik' => 'required',
			'aciklama' => 'required',
		));

		$ayar = Ayar::find(1);
		$ayar->baslik = request('baslik');
		$ayar->aciklama = request('aciklama');
		$ayar->email = request('email');
		$ayar->linkedin = request('linkedin');
		$ayar->instagram = request('instagram');
		$ayar->hakkimizda = request('hakkimizda');
		$ayar->adres = request('adres');
		$ayar->telefon = request('telefon');

		if (request()->hasFile('logo')) {

			$this->validate(request(), array('logo' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));

		$resim = request()->file('logo');
		$dosya_adi = 'logo' . '-' . time() . '.' . $resim->extension();

		if ($resim->isValid()) {

			$hedef_klasor = 'uplaods/dosyalar';
			$dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
			$resim->move($hedef_klasor, $dosya_adi);
			$ayar->logo = $dosya_yolu;
		}
		}
		$ayar->save();

        if($ayar) {
            alert()
                ->success('Başarılı', 'Güncelleme Başarılı.')
                ->autoClose(2000);
            return back();
        }else {

            alert()
                ->error('Hata', 'Güncelleme Başarısız!')
                ->autoClose(2000);
            return back();
        }

	}

	public function destroy($id)
	{

	}


}
