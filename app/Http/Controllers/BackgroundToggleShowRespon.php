<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShowResponses;
use CRUDBooster;

class BackgroundToggleShowRespon extends Controller
{
    //
    public function toggleShowRespon(){
      //First, Add an auth
			if(CRUDBooster::myId() === null) {
				CRUDBooster::insertLog(trans('crudbooster.log_try_view',['module'=>$module->name]));
				CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
			}
      $showResponses = ShowResponses::find(1);
      if($showResponses->is_show)
        $showResponses->is_show = 0;
      else
        $showResponses->is_show = 1;

      $showResponses->save();

      return back();
    }
}
