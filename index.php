<!DOCTYPE html>

<!-- 

	How To Push
	===========
	A simple implementation of Pusher App for learning purposes

	Copyright 2010, Tom Arnfeld.
	
-->

<html>
	<head>
	
		<title>How To Push</title>
		
		<link rel="stylesheet" href="css/howtopush.css">
		
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/howtopush.js"></script>
		<script type="text/javascript" src="js/swfobject.js"></script>
		<script type="text/javascript" src="js/FABridge.js"></script>
		<script type="text/javascript" src="js/web_socket.js"></script>
		<script type="text/javascript"src="http://pusherapp.com/js/v1/pusher.js"></script>
		<script type="text/javascript" charset="utf-8">
		 WebSocket.__swfLocation = "js/WebSocketMain.swf";
		</script>
		
	</head>
	<body>
		<div class="center">
			<h1>How To Push <p class="right"><a href="http://pusherapp.com/" target="_blank">Visit Pusher App</a></p></h1>
			<div class="box">
				<p>Hello there! It seems you have downloaded <b>How To Push</b>, probably because you are totally confused how to get going with the awesome <a href="http://pusherapp.com/" target="_blank">Pusher App</a>. This demo doesn't really do much, you can see this happen on one of the <a href="http://pusherapp.com/demos" target="_blank">Pusher App Demo's</a> but the code behind those is very complicated. If you view the source of these files they are littered with comments to help you understand how to use this fabulous service! If you have any questions, ask me <a href="http://twitter.com/tarnfeld/" target="_blank">@tarnfeld</a> or email the awesome guys at Pusher. <i>Yes, others can view this page and view your events in real-time :-)</i></p>
			</div>
			<div class="box"><p>To get going, just type in a title and some content and hit the <b>Push</b> button. Your event will pop up on the right.</p></div>
			<div class="pushes">
				<ul>
				</ul>
			</div>
			<div class="form">
				<p>
				    <label>Title</label><br />
				    <input type="text" value="Sample Event Title" id="eventTitle" />
				</p>
				<p>
				    <label>Content</label><br />
				    <textarea id="eventContent">Sample Event Content</textarea>
				</p>
				<p>
				    <input type="submit" value="Push" id="eventButton" />
				</p>
			</div>
			<br style="clear:both" />
		</div>
		<br style="clear:both" />
	</body>
</html>