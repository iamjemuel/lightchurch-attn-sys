<?php 
include('apps/controllers/admin/backlogs.controller.php');
?>

<div class="container-fluid">
	<div class="card">
		<div class="content">
			<h5><i class="fa fa-list"></i>&nbsp;&nbsp;&nbsp;<?php echo $info['firstname'].' '.$info['lastname']; ?></h5>
            <hr>
            <form action="<?php echo $url.'admin/add-backlogs/'.$id[4]; ?>" id="add_form">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <label for="b_date">DATE:</label>
                        <input type="date" class="form-control" name="b_date" id="b_date" required="">
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <center>
                            <label for="b_timeslot">TIMESLOT:</label><br>
                            <input type="radio" class="slot_form" name="slot_form" value="1" required=""> 7AM |
                            <input type="radio" class="slot_form" name="slot_form" value="2"> 9AM |
                            <input type="radio" class="slot_form" name="slot_form" value="3"> 11AM |
                            <input type="radio" class="slot_form" name="slot_form" value="4"> 2PM <br>
                            <input type="radio" class="slot_form" name="slot_form" value="5"> 4PM |
                            <input type="radio" class="slot_form" name="slot_form" value="6"> 6PM |
                            <input type="radio" class="slot_form" name="slot_form" value="7"> 8PM |&nbsp;
                            <input type="radio" class="slot_form" name="slot_form" value="8"> 10PM <br><br>
                            <button type="submit" class="btn btn-info btn-fill center-block">Save</button>
                        </center>

                    </div>
                    <div class="col-lg-4 col-md-4"></div>
                    
                </div>
            </form>
            
		</div>
	</div>
	<div class="card">
		<div class="content">
			<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="backlogs">
		    	<thead>
		    		<tr>
		    			<td>Date</td>
		    			<td>Timeslot</td>
		    		</tr>
		    	</thead>
		    	<tbody>
		    		<?php echo $logs_content; ?>
		    	</tbody>
		    </table>
		</div>
	</div>
</div>

<script>
	$('#backlogs').DataTable();

    $( "#add_form" ).submit(function(e) {

        console.log('Submit fired!');
        
        var formData = {
            'datein': $('input[name=b_date]').val(),
            'timeslot': $("input[type='radio'][name='slot_form']:checked").val(),
            'type': '<?php echo $info["type"]; ?>',
            'id': '<?php echo $id[4]; ?>',
            'action': 'login'
        };
        // console.log(formData);
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
                    location.href = a;
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