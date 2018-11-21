<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpsiList extends Model
{
    // Initialization
    protected $table = 'tbl_opsi_list';

    public function respon_list_count(){
    	return $this->hasMany('App\ResponList', 'id_opsi')
    		->select(DB::raw('id_pertanyaan, id_opsi_list, count(id_pertanyaan) as aggregate'))
    		->groupBy('id_pertanyaan', 'id_opsi_list');
    }    
}
