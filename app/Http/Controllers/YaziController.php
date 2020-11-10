<?php

namespace App\Http\Controllers;

use App\Etiket;
use App\Kategori;
use App\Yazi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class YaziController extends Controller
{

    public function index()
    {
        $yazilar = Yazi::all();
        return view('admin.yazilar.index', compact('yazilar'));
    }

    public function create()
    {
        $kategoriler = Kategori::all();
        return view('admin.yazilar.create', compact('kategoriler'));
    }

    public function store(Request $request)
    {
     /* dd(request('etiket'));*/

        $this->validate(request(), array(

            'baslik' => 'required',
            'icerik' => 'required',
            'kategori' => 'required',

        ));

        $yazi = new Yazi();
        $yazi->baslik = request('baslik');
        $yazi->icerik = request('icerik');
        $yazi->user_id = Auth::user()->id;
        $yazi->kategori = request('kategori');
        $yazi->slider = request('slider');
        $yazi->video = request('video');
        $yazi->slug = str_slug(request('baslik'));


        if (request()->hasFile('resim')) {

            $this->validate(request(), array('resim' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));

        }


        $resim = request()->file('resim');
        $dosya_adi = time() . '.' . $resim->extension();

        if ($resim->isValid()) {

            $hedef_klasor = 'uplaods/dosyalar';
            $dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
            $resim->move($hedef_klasor, $dosya_adi);
            $yazi->resim = $dosya_yolu;
        }
        $yazi->save();

        if ($yazi) {

            alert()
                ->success('Başarılı', 'Yazı Eklendi.')
                ->autoClose(2000);
            return back();

        } else {
            alert()
                ->error('Hata', 'Yazı Eklenemedi!')
                ->autoClose(2000);
            return back();

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $yazi = Yazi::find($id);
        $kategoriler = Kategori::where('id', '!=', $yazi->kategori)->get();
        return view('admin.yazilar.edit', compact('yazi', 'kategoriler'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate(request(), array(

            'baslik' => 'required',
            'icerik' => 'required',
            'kategori' => 'required',

        ));

        $yazi = Yazi::find($id);
        $kullanici = $yazi->user_id;
        $yazi->baslik = request('baslik');
        $yazi->icerik = request('icerik');
        $yazi->user_id = $kullanici;
        $yazi->kategori = request('kategori');
        $yazi->slider = request('slider');
        $yazi->slug = str_slug(request('baslik'));
        $yazi->video = request('video');


        if (request()->hasFile('resim')) {

            $this->validate(request(), array('resim' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));


            /*	$resim->extension = resim uzantısını alır
                $resim->getclientOrijinalName() = resmin orjinal ismini alır
                rasgele isim üretir = hashName();*/

            $resim = request()->file('resim');
            $dosya_adi = time() . '.' . $resim->extension();

            if ($resim->isValid()) {

                $hedef_klasor = 'uplaods/dosyalar';
                $dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
                $resim->move($hedef_klasor, $dosya_adi);
                $yazi->resim = $dosya_yolu;
            }
        }
        $yazi->save();




            if ($yazi) {

                alert()
                    ->success('Başarılı', 'Yazı Güncellendi.')
                    ->autoClose(2000);
                return redirect()->route('yazilar.index');

            } else {
                alert()
                    ->error('Hata', 'Yazı Güncellenemedi!')
                    ->autoClose(2000);
                return back();

            }


        }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sil = Yazi::destroy($id);
        alert()
            ->success('Başarılı', 'Yazı Silindi.')
            ->autoClose(2000);
        return back();
    }


}
