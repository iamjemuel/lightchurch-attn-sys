<?php
session_start();
include('apps/variables.php');

if(isset($_SESSION['token'])){
	header('location: '.$url);
}

// echo $_SESSION['token'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <title>Login | Attendance System</title>

	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/animate.min.css" rel="stylesheet"/>
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/pe-icon-7-stroke.css" rel="stylesheet" />



</head>
<body>
	
	<?php 

		include('apps/views/login/login.php'); 

		include('apps/views/footer.php'); 

	?>

	<script src="<?php echo $url; ?>assets/js/jquery-1.10.2.js"></script>
	<script src="<?php echo $url; ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo $url; ?>assets/js/bootstrap-notify.js"></script>
	<script src="<?php echo $url; ?>assets/js/variables.js"></script>
	<script src="<?php echo $url; ?>assets/js/login.js"></script>
</body>
</html>