<?php 
include('apps/model/services.class.php');
include('apps/variables.php');

$services = new Services();

$info = $services->getAttendee($id[4]);

$logs_content = '';
if($services->getAttendeeLogs($id[4])){
    $logs = $services->getAttendeeLogs($id[4]);
    
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