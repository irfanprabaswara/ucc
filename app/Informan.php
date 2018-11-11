<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informan extends Model
{
    // Initialization
    protected $table = 'tbl_informan';

    public function respon() {
    	return $this->hasMany('App\Respon', 'id_informan');
    }
}
