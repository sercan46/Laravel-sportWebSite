<?php

namespace App\Http\Controllers;

use Spatie\TranslationLoader\LanguageLine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CeviriController extends Controller
{

    public function index()
    {
        $ceviriler = LanguageLine::all();
        return view('admin.ceviri.index',compact('ceviriler'));
    }

    public function create()
    {
       return view('admin.ceviri.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),array(
        'group'=>'required',
        'key'=>'required',
        'tr'=>'required',
        'en'=>'required',


        ));

     if($validator->fails()){

      return back()->withErrors($validator)->withInput();

     }else{

       $kaydet =  LanguageLine::create([
             'group' => request('group'),
             'key' => request('key'),
             'text' => ['en' => request('en'), 'tr' => request('tr')],
         ]);


     }

     if($kaydet){

         alert()
             ->success('Başarılı', 'Çeviri Eklendi')
             ->autoClose(2000);
         return redirect()->route('ceviri.index');



     }else{

         alert()
             ->error('Hata', 'Çeviri Eklenemedi')
             ->autoClose(2000);
         return redirect()->route('ceviri.index');
     }
    }

    public function show($id)
    {

    }


    public function edit($id)
    {
        $kelime = LanguageLine::find($id);
        $veriler = array_values($kelime->text);
        $turkce = $veriler[1];
        $ingilizce = $veriler[0];
        return view('admin.ceviri.edit',compact('kelime','turkce','ingilizce'));
    }

    public function update(Request $request, $id)
    {
       $kelime = LanguageLine::find($id);
       $veriler = [
           'group' => request('group'),
           'key' => request('key'),
           'text' => ['en' => request('en'), 'tr' => request('tr')],
       ];
       $kaydet = $kelime->update($veriler);

        if($kaydet){

            alert()
                ->success('Başarılı', 'Çeviri Eklendi')
                ->autoClose(2000);
            return redirect()->route('ceviri.index');



        }else{

            alert()
                ->error('Hata', 'Çeviri Eklenemedi')
                ->autoClose(2000);
            return redirect()->route('ceviri.index');



        }


    }

    public function destroy($id)
    {
        $sil = LanguageLine::destroy($id);
        if($sil){

            alert()
                ->success('Başarılı', 'Çeviri Silindi')
                ->autoClose(2000);
            return redirect()->route('ceviri.index');



        }else{

            alert()
                ->error('Hata', 'Çeviri Silinemedi')
                ->autoClose(2000);
            return redirect()->route('ceviri.index');



        }

    }
}
