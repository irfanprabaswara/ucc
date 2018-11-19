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
    // $items = DB::table('items')
    //          ->select('id', 'ref_code', 'name', 'price')
    //          ->where('ref_code','=', $request->ref_code)
    //          ->first();
    public function GetAspekByTujuan($tujuan)
    {
    	$aspek = DB::table('tbl_aspek')
             	->select('topik', 'deskripsi')
             	->where('tujuan','=', $tujuan)
             	->get();
    	return $aspek;
    }

    public function GetRegisteras($registeras)
    {
    	$registeras = DB::table('users')
             	->select('registeras')
             	->where('registeras','=', $registeras)
             	->get();
    	return $registeras;
    }
}
