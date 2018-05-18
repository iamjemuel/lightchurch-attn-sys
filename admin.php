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

	<title>Admin | Attendance System</title>
	
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/bootstrap_dashboard.css">
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/animate.min.css" rel="stylesheet"/>
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/dataTables.css" rel="stylesheet"/>
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

	<script src="<?php echo $url; ?>assets/js/jquery-1.10.2.js"></script>
	<script src="<?php echo $url; ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo $url; ?>assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo $url; ?>assets/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo $url; ?>assets/js/bootstrap-notify.js"></script>
    <script src="<?php echo $url; ?>assets/js/light-bootstrap-dashboard.js"></script>
    <script src="<?php echo $url; ?>assets/js/variables.js"></script>
</head>
<body>
	<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="<?php echo $url; ?>assets/img/template.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    <i class="fa fa-user"></i>&nbsp;<?php echo $_SESSION['user'].' (ADMIN)'; ?>
                </a>
            </div>
            <?php 
                include('apps/views/admin/navigation.php');
            ?>
            
        </div>
    </div>

    <div class="main-panel">
        <?php 
            include('apps/views/admin/menu.php');
        ?>
        
        <div class="content">
            <?php 
            	if(strpos($uri, 'current-logs')){
			        include('apps/views/admin/current/current-logs.php');
			    }elseif(strpos($uri, 'search-logs')){
			        include('apps/views/admin/services/services-logs.php');
			    }elseif(strpos($uri, 'registered-attendees')){
			        include('apps/views/admin/registered/registered-attendees.php');
			    }elseif(strpos($uri, 'add-member/')){
			        include('apps/views/admin/registered/add-member.php');
			    }elseif(strpos($uri, 'add-visitor/')){
                    include('apps/views/admin/registered/add-visitor.php');
                }elseif(strpos($uri, 'view/')){
                    include('apps/views/admin/registered/view-attendee.php');
                }elseif(strpos($uri, 'edit/')){
                    include('apps/views/admin/registered/edit-attendee.php');
                }elseif(strpos($uri, 'add-backlogs/')){
                    include('apps/views/admin/services/add-backlogs.php');
                // }elseif(strpos($uri, 'search/')){
                //     include('apps/views/admin/search/search.php');
                }elseif(strpos($uri, 'logout/')){
                    include('apps/views/admin/logout.php');
			    }else{
			        include('apps/views/admin/404.php');
			        // include('apps/views/admin/current/current-logs.php');
			    }
			    include('apps/views/footer.php');
            ?>
        </div>
        
    </div>
</div>
<form action="<?php echo $url; ?>preview/" method="GET" name="preview" id="preview" target="_blank">
    <input type="hidden" name="p_timeslot" id="p_timeslot">
    <input type="hidden" name="p_network" id="p_network">
    <input type="hidden" name="p_member" id="p_member">
    <input type="hidden" name="p_visitor" id="p_visitor">
    <input type="hidden" name="p_total" id="p_total">
    <input type="hidden" name="view" id="view">
</form>
<script>
	helper.clock('display_clock');
</script>
</body>
</html>