<?php

namespace App;

use CyrildeWit\PageViewCounter\Traits\HasPageViewCounter;
use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Model;


class Yazi extends Model
{
    use Rateable;
	use HasPageViewCounter;

    protected $table = 'yazilar';
    protected $guarded = [];

    public function kullanici() {

    return $this->belongsTo('App\User','user_id');

    }

    public function kategorisi() {

    return $this->belongsTo('App\Kategori','kategori');


    }

	public function yorumlar() {

		return $this->hasMany('App\Yorum','yazi_id');


	}

    public function etiket() {

        return $this->belongsToMany(Etiket::class);

    }




}

