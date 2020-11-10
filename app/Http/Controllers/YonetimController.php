<?php

namespace App\Http\Controllers;

use App\Ayar;
use App\Mail\iletisimformu;
use App\Reklam;
use App\User;
use App\Yazi;
use App\Yorum;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class YonetimController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$yazilar = Yazi::orderby('created_at','desc')->take(5)->get();
    	$yorumlar =Yorum::orderby('created_at','desc')->take(5)->get();
        return view('admin.index',compact('yazilar','yorumlar'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function kullanicilar() {

    $kullanicilar = User::all();
    return view('admin.kullanicilar.index',compact('kullanicilar'));

    }

    public function kullaniciekle() {

    return view('admin.kullanicilar.create');


    }

    public function kullanicikayit(request $request) {

    $this->validate(request(),array(
    'name'=>'required',
    'email'=>'required',
	'password'=>'required',
	'password_confirmation' =>'required',
 ));

    $kullanici = new User();
    $kullanici->name = request('name');
    $kullanici->email = request('email');
	    $kullanici->yetki = request('yetki');
    if(request('password') != request('password_confirmation')) {

        alert()
            ->error('Hata', 'Şifreler Eşleşmiyor')
            ->autoClose(2000);
  return back();

 }else {

    $kullanici->password = Hash::make(request('password'));

    }

	    if (request()->hasFile('avatar')) {

		    $this->validate(request(), array('avatar' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));



	    /*	$resim->extension = resim uzantısını alır
			$resim->getclientOrijinalName() = resmin orjinal ismini alır
			rasgele isim üretir = hashName();*/

	    $resim = request()->file('avatar');
	    $dosya_adi = 'avatar' . '-' . time() . '.' . $resim->extension();

	    if ($resim->isValid()) {

		    $hedef_klasor = 'uplaods/dosyalar';
		    $dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
		    $resim->move($hedef_klasor, $dosya_adi);
		    $kullanici->avatar = $dosya_yolu;
	    }
	    }

	$kullanici->save();

	    if ($kullanici) {

            alert()
                ->success('Başarılı', 'Kullanıcı Eklendi.')
                ->autoClose(2000);
		    return back();

	    } else {
            alert()
                ->error('Hata', 'Kullanıcı Eklenemedi!')
                ->autoClose(2000);
		    return back();

	    }
    }


    public function kullaniciduzenle($id) {
            $kullanici = User::find($id);
            return view('admin.kullanicilar.edit',compact('kullanici'));
    }


	public function kullaniciguncelle($id) {

		$this->validate(request(),array(
			'name'=>'required',
			'email'=>'required',
		));


		$kullanici = User::find($id);
		$kullanici->name = request('name');
		$kullanici->email = request('email');
		$kullanici->yetki = request('yetki');
		if(request('password') != request('password_confirmation')) {

            alert()
                ->error('Hata', 'Şifreler Eşleşmiyor!')
                ->autoClose(2000);
			return back();

		}else {

			$kullanici->password = Hash::make(request('password'));

		}

		if (request()->hasFile('avatar')) {

			$this->validate(request(), array('avatar' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));

		$resim = request()->file('avatar');
		$dosya_adi = 'avatar' . '-' . time() . '.' . $resim->extension();

		if ($resim->isValid()) {

			$hedef_klasor = 'uplaods/dosyalar';
			$dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
			$resim->move($hedef_klasor, $dosya_adi);
			$kullanici->avatar = $dosya_yolu;
		}
		}

		$kullanici->save();

		if ($kullanici) {

            alert()
                ->success('Başarılı', 'Kullanıcı Güncellendi.')
                ->autoClose(2000);
			return back();

		} else {
            alert()
                ->error('Başarılı', 'Kullanıcı Güncellenemedi!')
                ->autoClose(2000);
			return back();

		}


	}

	public function kullanicisil($id) {

    $sil = User::find($id)->delete();
		if ($sil) {

            alert()
                ->success('Başarılı', 'Kullanıcı Silindi.')
                ->autoClose(2000);
			return back();

		} else {
            alert()
                ->error('Hata', 'Kullanıcı Silinemedi!')
                ->autoClose(2000);
			return back();

		}


	}

	public function cikis() {

	auth()->logout();
	return redirect('/');


	}

	public function iletisim() {

    return view('admin.iletisimformu');


	}

	public function iletisimgonder(request $request) {

	$this->validate(request(),array(

	'adsoyad'=>'required',
	'email'=>'required',
	'mesaj'=>'required',

	));

	$ayar = Ayar::find(1);
	$adres = $ayar->baslik;
	$mailadresim = $ayar->email;

	$bilgiler = array(

	'adsoyad'=>request('adsoyad'),
	'email'=>request('email'),
	'mesaj'=>request('mesaj'),
	'sitebaslik'=>$adres,

	);

Mail::to($mailadresim)->send(new iletisimformu($bilgiler));

        alert()
            ->success('Başarılı', 'Email Gönderildi')
            ->autoClose(2000);
	return back();



	}

	public function reklamgoster() {

		$reklam = Reklam::find(1);
		return view('admin.reklam',compact('reklam'));


	}


	public function reklam(request $request) {

    $reklam = Reklam::find(1);
    $reklam->update($request->all());
        alert()
            ->success('Başarılı', 'Kaydedildi')
            ->autoClose(2000);
		return back();

	}
}
