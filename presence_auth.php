<?php

	session_start();
	header('Content-Type: application/json');
	require_once('pusher_info.php');
	
	if(!isset($_SESSION['user_id']))
	{
		$_SESSION['user_id'] = time();
	}
	
	echo $_pusher->presence_auth($_POST['channel_name'], $_POST['socket_id'], $_SESSION['user_id'], array('id' => $_SESSION['user_id']));
	
?>