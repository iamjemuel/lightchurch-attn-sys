<?php 
include('apps/model/current.class.php');
include('apps/variables.php');

$current = new Current();

date_default_timezone_set('Asia/Manila');
$today = date('Y-m-d');
$content = '';
$member = 0;
$visitor = 0;
$total = 0;
	if($current->getAllLogs($today)){
	    $data = $current->getAllLogs($today); 
	    for($i = 0; $i <= count($data)-1; $i++){

	    	$info = $current->getAttendee($data[$i]['attendee_id']);
	    	if($info['status']){
	    		$content .= '<tr>
	                    <td>'.$info['firstname'].' '.$info['lastname'].'</td>
	                    <td>'.$leader[$info['network']].'</td>
	                    <td>'.$type[$info['type']].'</td>
	                    <td>'.$slots[$data[$i]['timeslot']].'</td>
	            </tr>';
	    	}else{
	    		$content .= '<tr style="color: red;">
	                    <td>'.$info['firstname'].' '.$info['lastname'].'</td>
	                    <td>'.$leader[$info['network']].'</td>
	                    <td>'.$type[$info['type']].'</td>
	                    <td>'.$slots[$data[$i]['timeslot']].'</td>
	            </tr>';
	    	}
	        

	        $total++;
	        if($info['type'] == 0){
	            $member++;
	        }else{
	            $visitor++;
	        }
	    }
	}else{
	    $content = 'No results found';
	}

?>