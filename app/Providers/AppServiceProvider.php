<?php

namespace App\Providers;

use App\Ayar;
use App\Kategori;
use App\Reklam;
use App\Sayfa;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
	    Schema::defaultStringLength(191);
	   $ayar = Ayar::find(1);
	    $sayfalar = Sayfa::all();
	    $kategoriler = Kategori::where('ust_id','=',null)->get();
	    $reklam = Reklam::find(1);
	    View::share([

	    'ayar'=>$ayar,
		'sayfalar'=>$sayfalar,
		'kategoriler'=>$kategoriler,
		'reklam'=>$reklam,


	    ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
