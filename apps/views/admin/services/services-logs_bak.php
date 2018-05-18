<?php 
include('apps/controllers/admin/services.controller.php');
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-8 col-md-8">
			<div class="card">
				<div class="content">
					<div class="row">
						<div class="col-lg-4 col-md-4">
							<form action="<?php echo $url; ?>admin/services-logs/" method="GET" name="search">
								<small><b>FROM:</b></small><br>
								<?php 
									if(isset($_GET['from']) && isset($_GET['to'])){
										echo '<input type="date" class="form-control" name="from" id="from" value="'.$_GET['from'].'"><br>';
									}else{
										echo '<input type="date" class="form-control" name="from" id="from"><br>';
									}
								?>
								<small><b>TO:</b></small><br>
								<?php 
									if(isset($_GET['from']) && isset($_GET['to'])){
										echo '<input type="date" class="form-control" name="to" id="to" value="'.$_GET['to'].'">';
									}else{
										echo '<input type="date" class="form-control" name="to" id="to">';
									}
								?>
								
							</form>
						</div>
						<div class="col-lg-4 col-md-4"></div>
						<div class="col-lg-4 col-md-4"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-4">
			<!-- <div class="card">
				<div class="content">
					<center>
						<small><b>ACTIONS</b></small>
                    	<hr>
                    	<a href="<?php echo $url; ?>admin/add-backlogs/"><i class="fa fa-plus"></i> BACK LOGS</a>
                    </center>
				</div>
			</div> -->
		</div>
	</div>
	
	<div class="card">
		<div class="content">
			<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="services">
                <thead>
                    <tr>
                        <th>Fullname</th>
                        <th>Network Leader</th>
                        <th>Type</th>
                        <th>Timeslot</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody id="result">
                    <?php echo $content; ?>
                </tbody>

            </table>
		</div>
	</div>
</div>
<script>
	$('#to').change(function(){
        if($('#from').val() != ''){
        	if(helper.convertMilli($('#to').val()) > helper.convertMilli($('#from').val())){
        		document.search.submit();
        	}else{
        		helper.showNotification('bottom', 'left', 2, 0, 'Wrong range of dates.');
        	}
        }else{
        	helper.showNotification('bottom', 'left', 2, 0, 'Choose FROM date.');
        }
        
    });
    $('#from').change(function(){
    	if($('#to').val() != ''){
	    	if(helper.convertMilli($('#to').val()) > helper.convertMilli($('#from').val())){
	        	document.search.submit();
	        }else{
	        	helper.showNotification('bottom', 'left', 2, 0, 'Wrong range of dates.');
	        }
	   	}
    });
    $('#services').DataTable();
</script>