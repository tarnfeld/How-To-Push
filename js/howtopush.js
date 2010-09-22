$(document).ready(function(){
	
	// Logging, don't enable in production environments
	Pusher.log = function() {
      if (window.console) window.console.log.apply(window.console, arguments);
    };
	
	// Make a Pusher connection with your PusherApp API Key and channel
	Pusher.channel_auth_endpoint = '/presence/presence_auth.php';
	var socket = new Pusher(YOUR_PUBLIC_KEY);

	
	// Presence Stuff
	var presenceChannel = socket.subscribe('presence-test_channel');
	presenceChannel.bind('pusher:subscription_succeeded', function(member_list){
	  $('#members').empty();
		for (var i=0; i < member_list.length; i++) {
		  addMember(member_list[i]);
		};
	});
	presenceChannel.bind('pusher:member_added', function(member){
    addMember(member);
	});
	presenceChannel.bind('pusher:member_removed', function(member){
		removeMember(member)
	});
	function addMember(member){
	  var p = $('<p>', { text: member.user_info.id, id: 'member_' + member.user_id } );
	  $('#members').append( p );
	}
	function removeMember(member){
	  $('#member_'+ member.user_id).remove()
	}
	
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
		$(this).parent('li').slideUp();
		setTimeout("$(this).parent('li').remove();",300);
	});

});