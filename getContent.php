<?php
	require_once "ubb.php";
	$action = $_REQUEST['action'];
	if($action == 'add'){
		$content = htmlentities($_REQUEST['content']);
		// $content = htmlentities('[b]99899[/b][img]https://ss0.bdstatic.com/5aV1bjqh_Q23odCf/static/superman/img/logo_top_ca79a146.png[/img]');
		echo Ubbcode($content);
	}
?>