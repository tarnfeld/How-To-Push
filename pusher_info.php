<?php

	// Include pusher library
	require_once('lib/pusher-php/Pusher.php');

	// Define constants for the pusher api info
	define('PUSHER_API_KEY', YOUR_PUBLIC_KEY);
	define('PUSHER_API_SECRET', YOUR_SECRET_KEY);
	define('PUSHER_APP_ID', YOUR_APP_ID);
	
	// Creating a connection to Pusher for other files to use
	$_pusher = new Pusher(PUSHER_API_KEY, PUSHER_API_SECRET, PUSHER_APP_ID);

?>