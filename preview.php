<?php 
session_start();
include('apps/variables.php');

if(!isset($_SESSION['token'])){
	header('location: '.$url.'login/');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<title>Preview | Attendance System</title>
	
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/animate.min.css" rel="stylesheet"/>
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	<style>
		@media print {
			body * {
		        visibility: hidden;
		    }
		    #section-to-print, #section-to-print * {
		    	visibility: visible;
		    }
		}
	</style>

	
</head>
<body>
	<br>
	<div class="container">
		<center>
	        <label for="">This is a preview only</label><br>
	        <button class="btn btn-primary btn-fill" onclick="javascript: window.print()">Print</button>
	    </center>
	</div>
	<hr>
	<div class="container" id="section-to-print">
		<center>
			<img src="<?php echo $url; ?>assets/img/light-web-logo.jpg" class="img-responsive">
	        <h3>ATTENDANCE REPORT</h3> 
	        <h5>
	        	<?php
	        		$from = '';
	        		$to = '';
	        		$datein = '';
	        		$network = '';
	        		$timeslot = '';
	        		$content = '';
	        		if($_GET['view'] == 'current'){
	        			$datein = date('F j, Y', strtotime($_GET['p_date']));
	        		}else{
		        		if($_GET['p_from'] == ''){
		        			$from = 'All dates';
		        		}else{
		        			$from = date('F j, Y', strtotime($_GET['p_from']));
		        		}
		        		if($_GET['p_to'] == ''){
		        			$to = '';
		        		}else{
		        			$to = date('F j, Y', strtotime($_GET['p_to']));
		        		}	
	        		}
	        		
	        		if($_GET['p_network'] == 'all'){
	        			$network = 'All';
	        		}else{
	        			$network = $leader[$_GET['p_network']]."'s";
	        		}
	        		if($_GET['p_timeslot'] == 0){
	        			$timeslot = 'All';
	        		}else{
	        			$timeslot = $slots[$_GET['p_timeslot']];
	        		}

	        		if($_GET['view'] == 'current'){
	        			echo $datein.' &middot; '.$timeslot.' Service &middot; '.$network.' Network';
	        		}else{
		        		if($_GET['p_from'] != ''){
		        			echo $from.' to '.$to.' &middot; '.$timeslot.' Service &middot; '.$network.' Network';
		        		}else{
		        			echo $from.' &middot; '.$timeslot.' Service &middot; '.$network.' Network'; 
		        		}	
	        		}
	        		
	        		
	        	?>
	        			
	        </h5>
		</center>
		<br>
	        <div class="row">
	        	<div class="col-sm-4 col-xs-4"></div>
	        	<div class="col-sm-4 col-xs-4">
	        		<table class="table">
	        			<tr>
	        				<td>MEMBER</td>
	        				<td>VISITOR</td>
	        				<td>TOTAL</td>
	        			</tr>
	        			<tr>
	        				<td><b><?php echo $_GET['p_member']; ?></b></td>
	        				<td><b><?php echo $_GET['p_visitor']; ?></b></td>
	        				<td><b><?php echo $_GET['p_total']; ?></b></td>
	        			</tr>
	        		</table>
	        	</div>
	        	<div class="col-sm-4 col-xs-4"></div>
	        </div>
			<?php if(isset($_GET['p_result'])) : ?>
	        
	        <table class="table">
	        	<thead>
		        	<tr>
		        		<td>FULLNAME</td>
		        		<td>NETWORK LEADER</td>
		        		<td>TYPE</td>
		        		<td>TIMESLOT</td>
		        		<td>DATE ATTENDED</td>
		        	</tr>
	        	</thead>
	        	
	        	<tbody>
	        		<?php echo $_GET['p_result']; ?>
	        	</tbody>
	        </table>

	    	<?php endif ?>
		 
	</div>
	<?php 
		
		include('apps/views/footer.php');
	?>
<script src="<?php echo $url; ?>assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo $url; ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo $url; ?>assets/js/bootstrap-notify.js"></script>
<script src="<?php echo $url; ?>assets/js/variables.js"></script>
</body>
</html>