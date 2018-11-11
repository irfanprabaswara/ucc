<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aspek extends Model
{
    // Initialization
    protected $table = 'tbl_aspek';

    // Get opsi for each question
    public function pertanyaan(){
    	return $this->hasMany('App\Pertanyaan', 'id_aspek');
    }
}
