<?php

	define('SITE_PATH', '/apps');
	define('SITE_DOMAIN', 'https://archive.undip.cc');
	
	define('FEED_PATH', '/assets/json/');
	
	global $mysqli;
	$mysqli = new mysqli("127.0.0.1", "apps_archive", "jR5hw5tUbHfrzF2A", "archive_prod_20171211");
	
	/* check connection */
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
