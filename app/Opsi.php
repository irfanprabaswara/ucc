<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opsi extends Model
{
    // Initialization
    protected $table = 'tbl_opsi';

    public function opsi_list(){
    	return $this->hasMany('App\OpsiList', 'id_opsi');
    }
}
