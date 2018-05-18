<div class="container-fluid">
	<div class="card">
		<div class="content">
			<h3><i class="fa fa-user-plus"></i>&nbsp;&nbsp;&nbsp;Visitor</h3>
		</div>
	</div>

	<div class="card">
		<div class="content">
			<form action="<?php echo $url; ?>" id="add_form">
				<div class="row">
					<div class="col-lg-4 col-md-4">
						<label for="a_firstname">First Name:</label>
						<input type="text" class="form-control" name="a_firstname" id="a_firstname" required="">
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
						<select name="a_type" id="a_type" class="form-control" disabled="">
							<option value="1">Visitor</option>
						</select>
					</div>
					<div class="col-lg-4 col-md-4">
						<label for="a_network">Network Leader:</label>
						<select name="a_network" id="a_network" class="form-control">
							<?php 
								for($i = 0; $i <= count($leader)-1; $i++){
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
						<input type="text" class="form-control" name="a_contact" id="a_contact">
					</div>
					<div class="col-lg-4 col-md-4">
						<label for="a_invited">Invited by:</label>
						<input type="text" class="form-control" name="a_invited" id="a_invited">
					</div>
					<div class="col-lg-4 col-md-4"></div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-4">
						<center>
						<label for="">Timeslot</label><br>
						<input type="radio" class="slot_form" name="slot_form" value="1" required=""> 7AM |
						<input type="radio" class="slot_form" name="slot_form" value="2"> 9AM |
						<input type="radio" class="slot_form" name="slot_form" value="3"> 11AM |
						<input type="radio" class="slot_form" name="slot_form" value="4"> 2PM <br>
						<input type="radio" class="slot_form" name="slot_form" value="5"> 4PM |
						<input type="radio" class="slot_form" name="slot_form" value="6"> 6PM |
						<input type="radio" class="slot_form" name="slot_form" value="7"> 8PM |&nbsp;
						<input type="radio" class="slot_form" name="slot_form" value="8"> 10PM 
						</center>
					</div>
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
            'timeslot': $("input[type='radio'][name='slot_form']:checked").val(),
            'action': 'addvisitor'
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
                helper.showNotification('bottom', 'left', 2, 0, 'Add unsuccessful. Please try again.');
                setTimeout(function(){
                    location.href = a;
                }, 1500);
            }
            

        }).fail(function (jqXHR, responseText){
            console.log(responseText);
            alert('Error: Please contact your webmaster.');
            // location.href = a;
        });
        // console.log(formData);
        e.preventDefault();
    });
</script>