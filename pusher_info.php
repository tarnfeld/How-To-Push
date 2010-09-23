<?php

/* 
	How To Push
	===========
	A simple implementation of Pusher App for learning purposes

	Copyright 2010, Tom Arnfeld. With a little help from Max Williams at @pusherapp!
	http://github.com/tarnfeld/How-To-Push

*/

	// Include pusher library
	require_once('lib/pusher-php/Pusher.php');

	// Define constants for the pusher api info
	define('PUSHER_API_KEY', YOUR_PUSHER_API_KEY);
	define('PUSHER_API_SECRET', YOUR_PUSHER_API_SECRET);
	define('PUSHER_APP_ID', YOUR_PUSHER_APP_ID);
	
	// Creating a connection to Pusher for other files to use
	$_pusher = new Pusher(PUSHER_API_KEY, PUSHER_API_SECRET, PUSHER_APP_ID);