
/* 
	How To Push
	===========
	A simple implementation of Pusher App for learning purposes

	Copyright 2010, Tom Arnfeld. With a little help from Max Williams at @pusherapp!
	http://github.com/tarnfeld/How-To-Push
	
*/

$(document).ready(function(){
	
	// Logging, don't enable in production environments
	Pusher.log = function() {
      if (window.console) window.console.log.apply(window.console, arguments);
    };
	
	// Make a Pusher connection with your PusherApp API Key
	Pusher.channel_auth_endpoint = './presence_auth.php';
	var socket = new Pusher('YOUR_PUSHER_API_KEY');

	
	// Presence Stuff - Subscribe to the channel
	var presenceChannel = socket.subscribe('presence-test_channel');
	
	// When the presence subscription successeded, get a list of the members currently attached to the channel and added them.
	presenceChannel.bind('pusher:subscription_succeeded', function(member_list){
	  $('#members').empty();
		for (var i = 0; i < member_list.length; i++) {
			var p = $('<p>', { html: "<span>UserID: </span>" + member_list[i].user_id, id: 'member_' + member_list[i].user_id, "class": 'member', "style": 'display:none;' } );
			$('#members').append(p);
			$('#member_' + member_list[i].user_id).slideDown();
			
		};
	});
	
	// Bind an event to slide down and show a member who has been added
	presenceChannel.bind('pusher:member_added', function(member){
		
    	var p = $('<p>', { html: "<span>UserID: </span>" + member.user_id, id: 'member_' + member.user_id, "class": 'member', "style": 'display:none;' } );
		$('#members').append(p);
		$('#member_' + member.user_id).slideDown();
		
	});
	
	// Bind an event to slide up a member and remove them
	presenceChannel.bind('pusher:member_removed', function(member){
		
		$('#member_'+ member.user_id).slideUp(200);
		setTimeout(function(){$('#member_'+ member.user_id).remove();}, 200);
		
	});
	
	// Subscribe to a specific type of event
	socket.bind('test_event',function(data)
	{
		// Create a new item
		var elm = '<li style="display:none;" class="new"><p class="time">'+data.time+'</p><div class="close"></div><p class="title">'+data.title+'</p><p class="content">'+data.content+'</p></li>';
		
		// Add the item to the list
		$('.pushes ul').prepend(elm);
		
		// Slide the item in
		$('.new').slideDown();
		$('.new').removeClass('new');
		
	});
	
	// Blue button click
	$('#eventButton').click(function()
	{
		// Get the title and contents of the event
		var title = $('#eventTitle').val();
		var content = $('#eventContent').val();
		
		// Validate they are both not empty
		if(title == '' || content == '')
		{
			// If they are empty, alert the user and don't carry on
			alert('Please enter an event title and some content!');
		}
		else
		{
			// Send a POST request to the file ajax/send.php carrying the title and content
			$.post('./ajax/send.php', { "title":title, "content":content }, function(data)
			{
				if(data != 1)
				{
					// If the send.php file doesn't echo the number 1 onto the page to signify it all went well, alert the user there was an error, for the developer to debug
					alert("There was an error pushing your event:\n\n" + data);
				}
			});
		}
	});
	
	// [X] button clicked slides up the notification
	$('.close').live('click',function()
	{
		$(this).parent('li').slideUp();
		setTimeout("$(this).parent('li').remove();",300);
	});

});