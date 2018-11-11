<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertanyaan;
use App\Respon;
use Excel;
use CRUDBooster;

class BackgroundExportController extends Controller
{
    public function export($type = 'xls')
	{
    if(CRUDBooster::myId() === null) {
      CRUDBooster::insertLog(trans('crudbooster.log_try_view',['module'=>$module->name]));
      CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));
    }

		// Respon List
		$responses = Respon::has('respon_list')->with('respon_list.pertanyaan', 'respon_list.opsi_list', 'informan')->get();
		$responses_count = Respon::has('respon_list')->count();
		$questions = Pertanyaan::has('respon_list')->get();

		$data = [];
		$data['questions'] = $questions;
		$data['responses'] = $responses;
		$data['responses_count'] = $responses_count;

		return Excel::create('WCU-Reponses-'. date("d-m-Y"), function($excel) use ($data) {
			$excel->sheet('Responses', function($sheet) use ($data)
	        {
				$sheet->loadView('export_view', $data);

	        });
		})->download($type);

		// return view('export_view', array('questions' => $questions, 'responses' => $responses))->with($data);
	}
}
