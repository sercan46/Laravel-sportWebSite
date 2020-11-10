<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'yonetim','middleware'=>'admin'],function(){
Route::get('/','YonetimController@index')->name('yonetim.index');
Route::get('cikis','YonetimController@cikis')->name('yonetim.cikis');
Route::resource('ayarlar','AyarController');
Route::resource('kategoriler','KategoriController');
Route::resource('yazilar','YaziController');
Route::get('kullanicilar','YonetimController@kullanicilar')->name('kullanici.index');
Route::get('kullaniciekle','YonetimController@kullaniciekle')->name('kullanici.ekle');
Route::post('kullanicikayit','YonetimController@kullanicikayit')->name('kullanici.kayit');
Route::get('kullaniciduzenle/{id}','YonetimController@kullaniciduzenle')->name('kullanici.duzenle');
Route::post('kullaniciguncelle/{id}','YonetimController@kullaniciguncelle')->name('kullanici.guncelle');
Route::delete('kullanicisil/{id}','YonetimController@kullanicisil')->name('kullanici.sil');
Route::resource('sayfalar','SayfaController');
Route::resource('yorumlar','YorumController');
Route::get('onayla/{id}','YorumController@onayla')->name('yorum.onayla');
Route::get('onaykaldir/{id}','YorumController@onaykaldir')->name('yorum.onaykaldir');
Route::get('iletisim','YonetimController@iletisim')->name('iletisim');
Route::post('iletisim','YonetimController@iletisimgonder')->name('iletisim.gonder');
Route::get('reklam','YonetimController@reklamgoster')->name('reklam.goster');
Route::put('reklam','YonetimController@reklam')->name('reklam.guncelle');
Route::resource('ceviri','CeviriController');

});
Auth::routes(['verify' => true]);


Route::get('/', 'HomeController@index')->name('anasayfa');
Route::get('kategori/{id}/{slug}','HomeController@kategori')->name('kategori.goster');
Route::get('yazi/{id}/{slug}','HomeController@yazidetay')->name('yazi.goster');
Route::get('sayfa/{id}/{slug}','HomeController@sayfa')->name('sayfa.goster');
Route::get('cikisyap','HomeController@cikis')->name('kullanici.cikis');
Route::post('yorumgonder','HomeController@yorumgonder')->name('yorum.gonder');
Route::post('arama','HomeController@arama')->name('arama.yap');
Route::get('arama', ['as' => 'arama.yap', 'uses' => 'HomeController@arama']);
Route::get('kullanici','HomeController@profilim')->name('profil.duzenle')->middleware('verified');
Route::post('kullanici/{id}','HomeController@profilguncelle')->name('profil.guncelle')->middleware('verified');
Route::post('aboneol','HomeController@aboneol')->name('abone.ol');
Route::get('iletisim','HomeController@iletisim')->name('iletisim.formu');
Route::get('galerim','HomeController@galerim')->name('galerim.formu');
Route::get('motivasyon','HomeController@motivasyon')->name('motivasyon.formu');

Route::post('iletisim','HomeController@iletisimkaydet')->name('iletisim.gonder');
    Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'HomeController@dildegistir']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
