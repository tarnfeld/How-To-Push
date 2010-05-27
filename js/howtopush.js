$(document).ready(function(){
	
	// Make a socket connection with your PusherApp API Key and channel
	var socket = new Pusher(YOUR_API_KEY_HERE, 'test_channel');
	
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
			$.post('ajax/send.php', { title:title, content:content }, function(data)
			{
				if(data != 1)
				{
					// If the send.php file doesn't echo the number 1 onto the page to signify it all went well, alert the user there was an error, for the developer to debug
					alert('There was an error pushing your event!');
				}
			});
		}
	});
	
	$('.close').live('click',function()
	{
		var answer = confirm("Are you sure you want to delete this event?");
		if(answer)
		{
			$(this).parent('li').slideUp();
			setTimeout("$(this).parent('li').remove();",300);
		}
	});

});