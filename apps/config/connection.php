<?php
$HOST = 'localhost';
$USER = 'root';
$PASS = '';
$DB = 'db_attendance';

// $HOST = 'mysql.hostinger.ph';
// $USER = 'u300307657_sys';
// $PASS = 'Light@2018';
// $DB = 'u300307657_attn';

		$con = new mysqli($HOST, $USER, $PASS, $DB);

	    if ($con->connect_error) {
	        die("Not Connected" .$dbc->connect_error);
	    }else{
	        // echo "Connected to server";
	        return true;
	    }

?>
