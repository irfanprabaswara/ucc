<?php
/*
 * Analyst App helper. By Nur Hardyanto for Undip Career Center
 * -------------------------------------------------------------
 * 
 */

	date_default_timezone_set ( "Asia/Jakarta" );
	
	ini_set('display_errors', 0);
	if (version_compare(PHP_VERSION, '5.3', '>=')) {
		error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
	} else {
		error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
	}
	
	define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
	define('FCPATH', str_replace(SELF, '', __FILE__));
	define('APP_PATH', FCPATH.'/application');
	
	define('APPVER', 'v0.1');
	
	if (!session_id()) session_start();
	
	global $mysqli;
	require_once(APP_PATH.'/configs.php');
	require_once(APP_PATH.'/helpers/global_helper.php');
	
	$data = array();
	
	$pageSlug = null;
	if (isset($_GET['p'])) $pageSlug = $_GET['p'];
	
	if ($pageSlug == "task.start") {
		header('Content-Type: application/json');
		require(APP_PATH."/controllers/task_process.php");
	} else if ($pageSlug == "task.abort") {
		header('Content-Type: application/json');
		require_once APP_PATH.'/helpers/task_helper.php';
		
		$idTask = @$_POST['id'];
		
		if (!empty($idTask)) {
			if (task_check($idTask)) {
				task_abort($idTask);
				
				echo json_encode([
						'status' => 'ok',
						'message' => 'Abort message has been sent.'
				]); // send the response
				exit();
			}
			
			echo json_encode([
					'status' => 'error',
					'message' => 'Task ID does not exist.'
			]); // send the response
			exit();
		}
		
		echo json_encode([
				'status' => 'error',
				'message' => 'Task ID expected.'
		]); // send the response
		
	} else {
		require APP_PATH."/views/home.php";
	}