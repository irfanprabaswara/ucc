<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respon extends Model
{
    // Initialization
    protected $table = 'tbl_respon';

    public function respon_list(){
    	return $this->hasMany('App\ResponList', 'id_respon');
    }

    public function informan(){
    	return $this->belongsTo('App\Informan', 'id_informan');
    }
}
