<?php 
include('apps/variables.php');
session_start();
session_destroy();
header('Location: '.$url);
?>