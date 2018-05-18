<?php 
include('apps/controllers/admin/edit.controller.php');
?>

<div class="container-fluid">
	<div class="card">
		<div class="content">
			<h3><i class="fa fa-user"></i>&nbsp;Edit Profile</h3>
		</div>
	</div>

	<div class="card">
		<div class="content">
			<form action="<?php echo $url; ?>" id="edit_form">
				<div class="row">
					<div class="col-lg-4 col-md-4">
						<label for="e_firstname">First Name:</label>
						<input type="text" class="form-control" name="e_firstname" id="e_firstname" value="<?php echo $data['firstname']; ?>">
					</div>
					<div class="col-lg-4 col-md-4">
						<label for="e_middlename">Middle Name</label>
						<input type="text" class="form-control" name="e_middlename" id="e_middlename" value="<?php echo $data['middlename']; ?>">
					</div>
					<div class="col-lg-4 col-md-4">
						<label for="e_lastname">Last Name:</label>
						<input type="text" class="form-control" name="e_lastname" id="e_lastname" value="<?php echo $data['lastname']; ?>">
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-4 col-md-4">
						<label for="e_type">Type:</label>
						<select name="e_type" id="e_type" class="form-control">
							<?php 
								for($i = 0; $i <= count($type)-1; $i++){
									$a = '';
									if($i == $data['type']){
										$a = 'selected';
									}
									echo '<option value="'.$i.'" '.$a.'>'.$type[$i].'</option>';
								}
								echo $data['type'];
							?>

						</select>
					</div>
					<div class="col-lg-4 col-md-4">
						<label for="e_network">Network Leader:</label>
						<select name="e_network" id="e_network" class="form-control">
							<?php 
								for($i = 0; $i <= count($leader); $i++){
									$a = '';
									if($i == $data['network']){
										$a = 'selected';
									}
									echo '<option value="'.$i.'" '.$a.'>'.$leader[$i].'</option>';
								}
							?>

						</select>
					</div>
					<div class="col-lg-4 col-md-4"></div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-4">
						<label for="e_contact">Contact Number:</label>
						<input type="text" class="form-control" name="e_contact" id="e_contact" value="<?php echo $data['contact']; ?>">
					</div>
					<div class="col-lg-4 col-md-4">
						<label for="e_invited">Invited by:</label>
						<input type="text" class="form-control" name="e_invited" id="e_invited" value="<?php echo $data['invited_by']; ?>">
					</div>
					<div class="col-lg-4 col-md-4"></div>
				</div>
				<br>
				<button class="btn btn-warning" type="submit">Update</button>
			</form>
		</div>
	</div>
</div>

<!-- <script src="<?php echo $url; ?>assets/js/attendee.js"></script> -->
<script>
	$( "#edit_form" ).submit(function(e) {

        console.log('Submit fired!');
        
        var formData = {
            'firstname': $('input[name=e_firstname]').val(),
            'middlename': $('input[name=e_middlename]').val(),
            'lastname': $('input[name=e_lastname]').val(),
            'type': $('#e_type').val(),
            'network': $('#e_network').val(),
            'contact': $('input[name=e_contact]').val(),
            'invited_by': $('input[name=e_invited]').val(),
            'id': '<?php echo $id[4]; ?>',
            'action': 'edit'
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
                setTimeout(function(){
                    location.href = a;
                }, 1500);
            }
            

        }).fail(function (jqXHR, responseText){
            console.log(responseText);
            alert('Error: Please contact your webmaster.');
            location.href = a;
        });

        e.preventDefault();
    });
</script>