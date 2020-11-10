<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoriler';
    protected $guarded = [];

/*    protected $fillable = ['baslik','aciklamasi','slug','ust_id'];*/


	public function yazilar() {

	return $this->hasMany('App\Yazi','kategori');



	}

	public function anakategori() {

	return $this->belongsto('App\Kategori','id');


	}

	public function altkategori() {

		return $this->hasMany('App\Kategori','ust_id');


	}


}
