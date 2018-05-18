
	$( "#login_form" ).submit(function(e) {
        console.log('Submit fired!');
        
        var formData = {
            'username': $('input[name=username]').val(),
            'password': $('input[name=password]').val(),
            'action': 'login'
        };

        $.ajax({
            url: url + 'apps/controllers/login/login.controller.php',
            type: 'POST',
            data: formData,
            dataType: 'json'
        }).done(function(response){
            if(response.success){
                // console.log(response.data);
                
                location.href = a;
            }else{
                helper.showNotification('bottom', 'left', 2, 0, 'Invalid authentication.');
                $('input[name=password]').val('');
                // console.log(response.note);
            }
            

        }).fail(function (jqXHR, textStatus){
            console.log(jqXHR.responseText);
            alert('Error: Please contact your webmaster.');
            location.href = a;
        });

        e.preventDefault();
    });
