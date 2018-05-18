<?php 
include('apps/model/attendee.class.php');
include('apps/variables.php');
$attendee = new Attendee();

$id = explode('/', $uri);
$fullname = '';
$middle = '';
$types = '';
$contact = '';
$network = '';
$invited_by = '';
$date_joined = '';

if($attendee->getRecord($id[4])){
    $data = $attendee->getRecord($id[4]);
    $middle = ($data['middlename'] == '') ? '' : $data['middlename'];
    $fullname = $data['firstname'].' ' .$middle. ' ' . $data['lastname'];
    $types = $type[$data['type']];
    $contact = ($data['contact'] == '') ? 'No contact number' : '(+63) '.$data['contact'];
    $network = $leader[$data['network']];
    $invited_by = ($data['invited_by'] == '') ? 'N/A' : $data['invited_by'];
}else{
    $fullname = 'No result found';
    $type = '';
    $contact = '';
    $network = '';
    $invited_by = '';
    $date_joined = '';
}

$logs_content = '';
if($attendee->getRecordServiceLogs($id[4])){
    $logs = $attendee->getRecordServiceLogs($id[4]);
    
    for($j = 0; $j <= count($logs)-1; $j++){
        $logs_content .= '<tr>
                        <td>'.date('F j, Y', strtotime($logs[$j]['created'])).'</td>
                        <td>'.$slots[$logs[$j]['timeslot']].'</td>
        </tr>';
    }
    // print_r($logs);
}else{
    $logs_content = 'No result';
}
?>