<div class="container-fluid">
	<div class="card">
		<div class="content">
			<h3><i class="fa fa-user-plus"></i>&nbsp;&nbsp;&nbsp;Member</h3>
		</div>
	</div>

	<div class="card">
		<div class="content">
			<form action="<?php echo $url; ?>" id="add_form">
				<div class="row">
					<div class="col-lg-4 col-md-4">
						<label for="a_firstname">First Name:</label>
						<input type="text" class="form-control" name="a_firstname" id="a_firstname" required>
					</div>
					<div class="col-lg-4 col-md-4">
						<label for="a_middlename">Middle Name</label>
						<input type="text" class="form-control" name="a_middlename" id="a_middlename">
					</div>
					<div class="col-lg-4 col-md-4">
						<label for="a_lastname">Last Name:</label>
						<input type="text" class="form-control" name="a_lastname" id="a_lastname" required="">
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-4 col-md-4">
						<label for="a_type">Type:</label>
						<select name="a_type" id="a_type" class="form-control">
							<?php 
								for($i = 0; $i < count($type); $i++){
									echo '<option value="'.$i.'">'.$type[$i].'</option>';
								}
							?>

						</select>
					</div>
					<div class="col-lg-4 col-md-4">
						<label for="a_network">Network Leader:</label>
						<select name="a_network" id="a_network" class="form-control">
							<?php 
								for($i = 0; $i < count($leader); $i++){
									echo '<option value="'.$i.'">'.$leader[$i].'</option>';
								}
							?>

						</select>
					</div>
					<div class="col-lg-4 col-md-4"></div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-4">
						<label for="a_contact">Contact Number:</label>
						<input type="number" class="form-control" name="a_contact" id="a_contact">
					</div>
					<div class="col-lg-4 col-md-4">
						<label for="a_invited">Invited by:</label>
						<input type="text" class="form-control" name="a_invited" id="a_invited">
					</div>
					<div class="col-lg-4 col-md-4"></div>
				</div>
				<br>
				<button class="btn btn-warning" type="submit">Add</button>
			</form>
		</div>
	</div>
</div>

<script>
	$( "#add_form" ).submit(function(e) {

        console.log('Submit fired!');
        
        var formData = {
            'firstname': $('input[name=a_firstname]').val(),
            'middlename': $('input[name=a_middlename]').val(),
            'lastname': $('input[name=a_lastname]').val(),
            'type': $('#a_type').val(),
            'network': $('#a_network').val(),
            'contact': $('input[name=a_contact]').val(),
            'invited_by': $('input[name=a_invited]').val(),
            'action': 'addmember'
        };
        $.ajax({
            url: url + 'apps/controllers/admin/action.controller.php',
            type: 'POST',
            data: formData,
            dataType: 'json'
        }).done(function(response){
            if(response.success){
                // console.log(response);
                helper.showNotification('bottom', 'left', 0, 1, response.note);
                setTimeout(function(){
                    location.href = url + 'admin/view/'+response.result+'/';
                }, 1500);
                
            }else{
                helper.showNotification('bottom', 'left', 2, 0, response.note);
                // setTimeout(function(){
                //     location.href = a;
                // }, 1500);
            }
            

        }).fail(function (jqXHR, responseText){
            console.log(responseText);
            alert('Error: Please contact your webmaster.');
            // location.href = a;
        });

        e.preventDefault();
    });
</script>