<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class wilayahController extends Controller
{
    protected function city($id){
        $kode=$id;
        $raw1= $kode.".%";
        $city = DB::table('wilayah_2018')->select('kode','nama')->whereRaw('CHAR_LENGTH(kode)=5 && kode like "'.$raw1.'"')->orderby('nama')->pluck('kode','nama');
        return json_encode($city);

    }
    protected function district($id){
        $kode=$id;
        $raw1= $kode.".%";
        $district = DB::table('wilayah_2018')->select('kode','nama')->whereRaw('CHAR_LENGTH(kode)=8 && kode like "'.$raw1.'"')->orderby('nama')->pluck('kode','nama');
        return json_encode($district);

    }
    protected function village($id){
        $kode=$id;
        $raw1= $kode.".%";
        $village = DB::table('wilayah_2018')->select('kode','nama')->whereRaw('CHAR_LENGTH(kode)=13 && kode like "'.$raw1.'"')->orderby('nama')->pluck('kode','nama');
        return json_encode($village);

    }
}
