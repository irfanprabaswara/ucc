<?php

	require_once APP_PATH.'/helpers/task_helper.php';
	
	// Begin task process...
	task_init();
	
	ob_start();
	
	// do initial processing here
	$taskData = task_create();
	
	// send the response
	if ($taskData) {
		echo json_encode([
				'status' => 'ok',
				'id' => $taskData['id'],
				'feed_url' => _base_url($taskData['feed_url'])
		]); 
	} else {
		echo json_encode([
				'status' => 'error',
				'message' => 'Cannot create task.'
		]); // send the response
	}
	
	header('Connection: close');
	header('Content-Length: '.ob_get_length());
	ob_end_flush();
	ob_flush();
	flush();
	
	//-- Tutup stream session
	session_write_close();
		
	//-- Check if run on CGI...
	$sapi_type = php_sapi_name();
	if ((substr($sapi_type, 0, 3) == 'fpm') || (substr($sapi_type, 0, 3) == 'cgi')) {
		fastcgi_finish_request();
	}
	
	if (!$taskData) {
		exit();
	}
	
	$isAborted = false;
	$abortMessage = '';
	$idTask = $taskData['id'];
	
	//----------- BEGIN BACKGROUND PROCESS -----------
	$rowCount = 0;
	$progress = 0;
	
	// Ambil record yang aktif saja...
	//$whereQuery = "(jenis_kelamin IS NOT NULL) AND (id_pddk = 0)";
	$whereQuery = "(jenis_kelamin IS NOT NULL)";
	$countQueryResult = mysqli_query($mysqli, "SELECT COUNT(*) AS jumlah FROM member_dtl WHERE ".$whereQuery);
	$countQueryRow = mysqli_fetch_assoc($countQueryResult);
	
	$rowCount = $countQueryRow['jumlah'];
	
	$currentRowCount = 0;
	
	$chunkRowCount = 0;
	$chunkLength = 25;
	$chunkOffset = 0;
	
	$feedTime = 0.0;
	do {
		$tmpQuery = sprintf("SELECT * FROM member_dtl LEFT JOIN bahasa_inggris ON member_dtl.id_member=bahasa_inggris.id_member WHERE %s LIMIT %d, %d", $whereQuery, $chunkOffset, $chunkLength);
		$chunkQueryResult = mysqli_query($mysqli, $tmpQuery);
		
		$chunkProcessStart = microtime(true);
		
		if ($chunkQueryResult) {
			$chunkRowCount = mysqli_num_rows($chunkQueryResult);
			while ($row = mysqli_fetch_assoc($chunkQueryResult)) {
				/*
				//------------------ BEGIN STUB ---------------------
				//- Ambil pendidikan terakhir
				$eduQuery = sprintf("SELECT * FROM pendidikan WHERE id_member=%d ORDER BY thn_lulus DESC", $row['id_member']);
				$eduQueryResult = mysqli_query($mysqli, $eduQuery);
				if (!$eduQueryResult) {
					$abortMessage = 'Internal error: Get education query failed.';
					$isAborted = true;
					break;
				}
				
				$lastEduYear = 0;
				$lastEduRow = null;
				while ($eduRow = mysqli_fetch_assoc($eduQueryResult)) {
					if ($lastEduYear < $eduRow['thn_lulus']) {
						$lastEduYear = $eduRow['thn_lulus'];
						$lastEduRow = $eduRow;
					}
				}
				
				if (!empty($lastEduRow)) {
					$updateEduQuery = sprintf("UPDATE member_dtl SET id_pddk=%d WHERE id_member=%d",
							$lastEduRow['id_pddk'], $row['id_member']);
					mysqli_query($mysqli, $updateEduQuery);
				}
				//------------------ END STUB ---------------------
				*/
				$orgQuery = sprintf("SELECT * FROM organisasi WHERE id_member=%d ORDER BY tgl_masuk DESC", $row['id_member']);
				$orgQueryResult = mysqli_query($mysqli, $orgQuery);
				if (!$orgQueryResult) {
					$abortMessage = 'Internal error: Get organization query failed.';
					$isAborted = true;
					break;
				}
				
				$lastEduYear = 0;
				$lastEduRow = null;
				$orgCount = mysqli_num_rows($orgQueryResult);
				//while ($eduRow = mysqli_fetch_assoc($eduQueryResult)) {
				//	if ($lastEduYear < $eduRow['thn_lulus']) {
				//		$lastEduYear = $eduRow['thn_lulus'];
				//		$lastEduRow = $eduRow;
				//	}
				//}
				
				//if (!empty($lastEduRow)) {
					$updateEduQuery = sprintf("UPDATE member_dtl SET _orgcount=%d, _toeflscore=%d, _toeflyear=%d WHERE id_member=%d",
							$orgCount, $row['nilai_toefl'], $row['thn_toefl'], $row['id_member']);
					$queryResult = mysqli_query($mysqli, $updateEduQuery);
					
					if (!$queryResult) {
						$abortMessage = 'Internal error: Update query failed.';
						$isAborted = true;
						break;
					}
				//}
				
				$currentRowCount++;
			}
			
			//-- Calculate progress
			$progress = floor($currentRowCount * 100 / $rowCount);
		} else {
			$abortMessage = 'Internal error: Chunk query failed.';
			$isAborted = true;
			break;
		}
		
		$chunkProcessFinish = microtime(true);
		
		$feedTime += ($chunkProcessFinish - $chunkProcessStart);
		if ($feedTime >= 2.0) { // Update the feed every defined secs
			//-- Check abort flag
			if (task_check_abort_flag($idTask)) {
				$abortMessage = 'Operation aborted by user.';
				$isAborted = true;
				break;
			} else {
				//-- Report progress
				task_report_progress($idTask, $progress, "Processing {$currentRowCount} of {$rowCount} record.");
			}
			$feedTime = 0.0;
		}
			
		$rowOffset += $queryLimit;
		$chunkOffset += $chunkLength;
	} while (($chunkRowCount > 0) && !$isAborted);
	
	if ($isAborted) {
		task_finish($idTask, [
			'message' => 'Operation aborted by user.'
		], 'aborted');
	} else {
		task_finish($idTask, [
			'message' => 'Operation finished. '.$rowCount.' rows processed.'
		]);
	}
	
