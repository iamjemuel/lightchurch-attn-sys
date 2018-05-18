
var attendee = {

	Delete: function(id){
		var r = confirm('Are you sure?');
		if(r){
			$.ajax({
				url: url + 'apps/controllers/admin/action.controller.php',
				type: 'POST',
				data: {
					id: id, action: 'delete'
				},
				dataType: 'json'
			}).done(function(response){
				if(response.success){
					helper.showNotification('bottom', 'left', 0, 1, response.note);
	                setTimeout(function(){
	                    location.href = a;
	                }, 1500);
				}else{
					helper.showNotification('bottom', 'left', 2, 0, 'Invalid authentication.');
                // console.log(response);
				}
			}).fail(function(jqXHR, responseText){
				console.log(responseText);
            	alert('Error: Please contact your webmaster.');
            	location.href = a;
			});
		}
	}
}