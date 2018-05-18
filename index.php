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

	<title>Attendance System</title>
	
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/animate.min.css" rel="stylesheet"/>
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

	<script src="<?php echo $url; ?>assets/js/jquery-1.10.2.js"></script>
	<script src="<?php echo $url; ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo $url; ?>assets/js/bootstrap-notify.js"></script>
	<script src="<?php echo $url; ?>assets/js/variables.js"></script>
</head>
<body>
	<br>
	<div class="container-fluid">

		<div id="clock_display"></div>

	</div>
	<?php 

		if(date('l') == 'Sunday'){
			include('apps/views/home/home.php');
		}else{
			include('apps/views/home/no-service.php');
		}

		include('apps/views/footer.php');
	?>
	
<script>
    home.clock('clock_display');
</script>
</body>
</html>