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
		require_once('../pusher_info.php');
		
		// Settings
		$channel = 'test_channel'; // Channel Name
		$event = 'test_event'; // Type of event
		
		// Trigger Content
		$content = array(
						'title'=>$_POST['title'],
						'content'=>$_POST['content'],
						'time'=>date('jS M, Y \a\t g:i a',time())
					);
		
		// Trigger a pusher event to the client with your content
		$_pusher->trigger($channel, $event, $content);
		
		// Echo onto the page to tell the AJAX script that nothing went wrong
		echo(1);
	
	}
	else
	{
		// If no POST data (not AJAX) then tell the user this...
		die("<p><b>Error:</b> No post data!</p>");
	}

?>