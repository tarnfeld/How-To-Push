<?php

	// Include pusher library
	require_once('lib/pusher-php/Pusher.php');

	// Define constants for the pusher api info
	define('PUSHER_API_KEY', 'b5bce1a78e6d2d0067b0');
	define('PUSHER_API_SECRET', 'fa0148adcd66cc062a36');
	define('PUSHER_APP_ID', '1181');
	
	// Creating a connection to Pusher for other files to use
	$_pusher = new Pusher(PUSHER_API_KEY, PUSHER_API_SECRET, PUSHER_APP_ID);

?>