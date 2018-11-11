<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    // Initialization
    protected $table = 'tbl_post';

    public function category(){
    	return $this->belongsTo('App\Category', 'id_category');
    }

    public function user(){
    	return $this->belongsTo('App\CmsUser', 'cms_users_id');
    }
}
