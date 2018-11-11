<?php

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>UCC Data Analyst App</title>
	
	<!-- CSS -->
	<link href="<?php echo _base_url('/assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo _base_url('/assets/css/font-awesome.min.css'); ?>" rel="stylesheet" >
	<link href="<?php echo _base_url('/assets/css/global.css'); ?>" rel="stylesheet" >
	
	<!-- Jquery -->
	<script src="<?php echo _base_url('/assets/js/jquery.js'); ?>"></script>
	<script src="<?php echo _base_url('/assets/js/bootstrap.min.js'); ?>"></script>
	
	
</head>
<body>

<script>

	var TASKID = null;
	var TASKFEED_URL = null;
	
	function dolog(strLog) {
		$('#secondaryoutput').append(strLog+"\n");
	}
	
	function updateProgress() {
		$.ajax({
			type: 'GET',
			dataType: 'json',
			url: TASKFEED_URL+"?hash="+(Math.random()*10000000),
			success: function(response) {
				if (response.status == 'processing') {
					$('#mainprogressbar').css('width', response.counter+'%').html(response.counter+'%');
					$('#primaryoutput').html(response.label);
					$('#maindashboard').html(response.dashboard);
					setTimeout(updateProgress, 2000);
				} else if (response.status == 'finish') {
					$('#mainprogressbar').css('width', '100%').html('100%');
					$('#primaryoutput').html(response.data.message);
					$('#maindashboard').html(response.dashboard);
					dolog("- PROCESS FINISHED.");

					$('#actionbutton2').attr('disabled', 'disabled');
				} else {
					$('#primaryoutput').html(response.data.message);
					$('#maindashboard').html(response.dashboard);
					dolog("- PROCESS ABORTED.");

					$('#actionbutton2').attr('disabled', 'disabled');
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				setTimeout(updateProgress, 2000);
			},
			timeout: 2000
		}).always(function(){
			//--
		});;
	}
	
	function beginaction() {
		$.ajax({
			type: 'GET',
			dataType: 'json',
			url: "<?php echo _base_url('/?p=task.start'); ?>",
			data: null,
			success: function(data) {
				if (data.status == 'ok') {
					dolog("- success: REQUEST SUCCESS. BEGIN PROCESSING... status: "+data.status);

					TASKID = data.id;
					TASKFEED_URL = data.feed_url;
					
					setTimeout(updateProgress, 2000);
				} else {
					dolog("- error: REQUEST FAILED. Message: "+data.message);
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				if(textStatus === "timeout") {
					dolog("- error: REQUEST TIMEOUT!...");
				} else {
					dolog("- error: REQUEST ERROR: "+textStatus);
				}
			},
			timeout: 15000
		}).always(function(){
			dolog("- always: REQUEST FINISH...");
		});;
	}

	function abortaction() {
		var uConf = confirm("Abort current task process?");
		if (!uConf) {
			return false;
		}

		$('#actionbutton2').attr('disabled', 'disabled');
		dolog("- SENDING ABORT REQUEST...");
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: "<?php echo _base_url('/?p=task.abort'); ?>",
			data: {id: TASKID},
			success: function(response) {
				if (response.status == 'ok') {
					dolog("- ABORTING...");
				} else {
					dolog("- error: CANNOT ABORT. Message: "+response.message);
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				if(textStatus === "timeout") {
					dolog("- error: REQUEST TIMEOUT!...");
				} else {
					dolog("- error: REQUEST ERROR: "+textStatus);
				}
			},
			timeout: 15000
		}).always(function(){
			
		});;
	}
	
	$(document).ready(function(){
		$('#actionbutton1').click(function(){
			$('#actionbutton1').attr('disabled', 'disabled');
			$('#actionbutton2').removeAttr('disabled').show();
			dolog("- BEGIN REQUEST...");
			$('#primaryoutput').html("Requesting new task process...");
			
			beginaction();
			return false;
		});
		$('#actionbutton2').click(function(){
			abortaction();
			return false;
		});
	});
</script>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Data Processing Tools</h1><hr />
<div class="progress" style="margin-bottom:5px;">
  <div class="progress-bar" role="progressbar" style="width: 0%; min-width:2em;" id="mainprogressbar">
    0%
  </div>
</div>
			<div id="primaryoutput" style="margin-bottom:20px;"></div>
			<pre id="maindashboard" style="min-height:100px;"></pre>
			<pre id="secondaryoutput"></pre>
			<a href="#" id="actionbutton1" class="btn btn-primary">Start Task</a>
			<a href="#" id="actionbutton2" class="btn btn-danger" style="display:none;">Abort Process</a>
		</div>
	</div>
</div>
<!-- OTHER JS -->    
<script src="<?php echo _base_url('/assets/js/global.js'); ?>"></script>

</body>
</html>