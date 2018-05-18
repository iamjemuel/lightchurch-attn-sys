<?php 

    include('apps/model/attendee.class.php');
    include('apps/variables.php');
    $attendee = new Attendee();

    $e_firstname = '';
    $e_middlename = '';
    $e_middlename = '';
    $e_types = '';
    $e_contact = '';
    $e_network = '';
    $e_invited = '';

    if($attendee->getRecord($id[4])){
        $data = $attendee->getRecord($id[4]);
    }

?>