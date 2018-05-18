<?php 
include('apps/controllers/admin/registered.controller.php');

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="card">
                <div class="content">
                    <p align="center">REGISTERED MEMBERS</p>
                    <h2 align="center"><?php echo $members; ?></h2>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="card">
                <div class="content">
                    <p align="center">REGISTERED VISITORS</p>
                    <h2 align="center"><?php echo $visitors; ?></h2>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="card">
                <div class="content">
                    <p align="center">ACTIONS</p>
                    <center>
                    	<table class="table text-center">
                    		<tr>
                    			<td>
                    				<a href="<?php echo $url; ?>admin/add-member/"><i class="fa fa-plus"></i> MEMBER</a>
                    			</td>
                    			<td>
                    				<a href="<?php echo $url; ?>admin/add-visitor/"><i class="fa fa-plus"></i> VISITOR</a>
                    			</td>
                    		</tr>
                    	</table>
                    </center>
                    <p align="center">OTHERS</p>
                    <small><i>**Upload bulk attendees. Download CSV file.</i></small>
                    <form id="upload_file">
                        <input class="btn btn-default form-control" type="file" name="file_csv" id="file_csv" required="">
                        <input type="hidden" name="action" value="uploadfile">
                        <center><button type="submit" class="btn btn-default" id="sub">Upload File</button></center>
                    </form>

                    <br>
                </div>
            </div>
            
        </div>
    </div>
    
	<div class="card">

		<div class="content">

			<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="members">

				<thead>
                    <tr>
                        <th>Fullname</th>
                        <th>Type</th>
                        <th>Network</th>
                        <th>Action</th>
                    </tr>
				</thead>

				<tbody id="result">
                    <?php echo $content; ?>
				</tbody>

			</table>
		</div>	

	</div>

</div>
<script src="<?php echo $url; ?>assets/js/attendee.js"></script>

<script>
    var url = '<?php echo $url; ?>';
    $('#members').DataTable();
    $('#upload_file').submit(function(e){
        
        $('#sub').text('Uploading file...');
                $.ajax({
                    url: url +'apps/controllers/admin/action.controller.php',
                    type: 'POST',
                    data: new FormData(this),
                    dataType: 'json',
                    processData: false,
                    contentType: false
                }).done(function(response){
                    if(response.success){
                            // console.log(response.note);
                            helper.showNotification('top', 'center', 0, 1, 'File uploaded! Sending to database...');
                            $('#sub').text('Upload File');
                            setTimeout(function(){
                                location.href = window.location.href;
                            }, 1500);
                        }else{
                            $('#sub').text('Upload File');
                            console.log(response.note);
                            helper.showNotification('bottom', 'left', 3, 0, response.note);
                        }
                }).fail(function(jqXHR, responseText){
                    alert('ERROR! Please contact your webmaster.');
                    location.href = window.location.href;
                });
        
        e.preventDefault();
    });
</script>

