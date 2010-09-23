<?php

/* 
	How To Push
	===========
	A simple implementation of Pusher App for learning purposes

	Copyright 2010, Tom Arnfeld. With a little help from Max Williams at @pusherapp!
	http://github.com/tarnfeld/How-To-Push
	
*/

	session_start();
	header('Content-Type: application/json');
	require_once('pusher_info.php');
	
	if(!isset($_SESSION['user_id']))
	{
		$_SESSION['user_id'] = time();
	}
	
	echo $_pusher->presence_auth($_POST['channel_name'], $_POST['socket_id'], $_SESSION['user_id'], array('id' => $_SESSION['user_id']));