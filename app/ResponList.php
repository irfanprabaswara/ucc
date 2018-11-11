<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResponList extends Model
{
    // Initialization
    protected $table = 'tbl_respon_list';

    public function opsi_list(){
    	return $this->belongsTo('App\OpsiList', 'id_opsi_list');
    }

    public function pertanyaan(){
    	return $this->belongsTo('App\Pertanyaan', 'id_pertanyaan');
    }
}
