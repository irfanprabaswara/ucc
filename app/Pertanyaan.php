<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    // Initialization
    protected $table = 'tbl_pertanyaan';

    // Get opsi for each question
    public function opsi(){
    	return $this->belongsTo('App\Opsi', 'id_opsi');
    }

    
    public function jawaban_bebas(){
    	return $this->hasMany('App\ResponList', 'id_pertanyaan');
    }

    public function respon_list(){
    	return $this->hasMany('App\ResponList', 'id_pertanyaan');
    }
}
