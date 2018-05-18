<?php 
include('apps/controllers/admin/view.controller.php');

?>

<div class="container-fluid">
	<div class="card">
		<div class="content">
			<div class="row">
				<div class="col-lg-2 col-md-2">
					<br><img src="<?php echo $url; ?>assets/img/attendee-default.png" alt="User default" class="img-responsive">
				</div>
				<div class="col-lg-10 col-md-10">
					<h2><?php echo $fullname; ?>&nbsp;<a href="<?php echo $url.'admin/edit/'.$data['id'].'/'; ?>"><i class="fa fa-pencil"></i></a></h2>
					<p>Type: <b><?php echo $types; ?></b></p>
					<p>Contact #: <b><?php echo $contact; ?></b></p>
					<p>Network Leader: <b><?php echo $network; ?></b></p>
					<p>Invited by: <b><?php echo $invited_by; ?></b></p>
				</div>
			</div>
			
			
		</div>
	</div>

	<div class="card">
		<div class="content">
			<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="logs_services">

				<thead>
                    <tr>
                        <th>Date</th>
                        <th>Timeslot</th>
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
	$('#logs_services').DataTable();
</script>