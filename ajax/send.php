<?php

	date_default_timezone_set('Europe/London');

/* 
	How To Push
	===========
	A simple implementation of Pusher App for learning purposes

	Copyright 2010, Tom Arnfeld.
	
*/

	if($_POST)
	{

		// Include Pusher Library
		require_once('../lib/Pusher.php');
		
		// Security Credentials (These are obtained from pusherapp.com)
		$api_key = YOUR_API_KEY_HERE;
		$api_secret = YOUR_API_SECRET_HERE;
		$app_id = YOUR_APP_ID_HERE;
		
		// Settings
		$channel = 'test_channel'; // Channel Name
		$event = 'test_event'; // Type of event
		
		// Trigger Content
		$content = array(
						'title'=>$_POST['title'],
						'content'=>$_POST['content'],
						'time'=>date('jS M, Y \a\t g:i a',time())
					);
		
		// Creating a connection to Pusher
		$pusher = new Pusher($api_key, $api_secret, $app_id, $channel);
		
		// $pusher = new Pusher($api_key, $api_secret, $app_id, $channel, [Debug: true/false, HOST, PORT]);
		// Use this when debugging a whole pusher connection
		
		// Trigger a pusher event to the client with your content
		$pusher->trigger($event, $content);
		
		// $pusher->trigger($event, $channel, true);
		// Use this to turn on debugging for a specifc trigger
		
		
		// Echo onto the page to tell the AJAX script that nothing went wrong
		echo(1);
	
	}
	else
	{
		// If no POST data (not AJAX) then tell the user this...
		die('No POST Data!');
	}

?>