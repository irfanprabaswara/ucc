<?php

	function task_init() {
		ignore_user_abort(true);
		set_time_limit ( 0 );
	}
	
	function task_create($initMessage = 'Initializing') {
		$unique = date('Ymd-His');
		$randomHash	= md5(uniqid(rand(), true));
		$randomPostFix = substr($randomHash, 1, 9);
		
		$newIdTask = sprintf('task-%s-%s', $unique, $randomPostFix);
		
		task_report_progress($newIdTask, 0, $initMessage);
		
		return [
			'id' => $newIdTask,
			'feed_url' => FEED_PATH.$newIdTask.'.json'
		];
	}
	
	function task_report_progress($idTask, $percentage, $txtLabel, $txtDashboard = '') {
		$jsonData = json_encode([
				'counter' => $percentage,
				'status' => 'processing',
				'label' => $txtLabel,
				'dashboard' => $txtDashboard,
				'timestamp' => time()
		]);
		
		$file = fopen(FCPATH.FEED_PATH.$idTask.'.json',"w");
		fwrite($file, $jsonData);
		fclose($file);
	}
	
	function task_abort($idTask) {
		$jsonData = json_encode([
				'id' => $idTask
		]);
		$file = fopen(FCPATH.FEED_PATH.$idTask.'.abort.json',"w");
		fwrite($file, $jsonData);
		fclose($file);
	}
	
	function task_check($idTask) {
		if (file_exists(FCPATH.FEED_PATH.$idTask.'.json')) {
			return true;
		}
		return false;
	}
	
	function task_check_abort_flag($idTask) {
		if (file_exists(FCPATH.FEED_PATH.$idTask.'.abort.json')) {
			return true;
		}
		return false;
	}
	
	function task_finish($idTask, $outputData, $finalStatus = 'finish', $txtDashboard = '') {
		$jsonData = json_encode([
				'counter' => 100,
				'status' => $finalStatus,
				'dashboard' => $txtDashboard,
				'data' => $outputData,
				'timestamp' => time()]);
		
		$file = fopen(FCPATH.FEED_PATH.$idTask.'.json',"w");
		fwrite($file, $jsonData);
		fclose($file);
	}
	