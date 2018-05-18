<?php 
include('apps/model/home.class.php');
include('apps/variables.php');
$home = new Home();

$list = $home->getLastNames();

if(isset($_GET['keyword'])){
	$result = $home->searchRecords($_GET['keyword']);
}

?>