<?php 
include('apps/model/services.class.php');
include('apps/variables.php');

$services = new Services();
$content = '';
if(isset($_GET['from']) && isset($_GET['to'])){
	if($services->getSearchLogs($_GET['from'], $_GET['to'])){
	    $data = $services->getSearchLogs($_GET['from'], $_GET['to']); 
	    for($i = 0; $i <= count($data)-1; $i++){

	    	$info = $services->getAttendee($data[$i]['attendee_id']);

	        $content .= '<tr>
		                    <td>'.$info['firstname'].' '.$info['lastname'].'</td>
		                    <td>'.$leader[$info['network']].'</td>
		                    <td>'.$type[$data[$i]['type']].'</td>
		                    <td>'.$slots[$data[$i]['timeslot']].'</td>
		                    <td>'.date('F j, Y', strtotime($data[$i]['created'])).'</td>
		            </tr>';
	    }
	}else{
	    $content = 'No results found';
	}
}else{
	if($services->getAllLogs()){
	    $data = $services->getAllLogs(); 
	    for($i = 0; $i <= count($data)-1; $i++){

	    	$info = $services->getAttendee($data[$i]['attendee_id']);
	    	if($info['status']){
	    		$content .= '<tr>
		                    <td>'.$info['firstname'].' '.$info['lastname'].'</td>
		                    <td>'.$leader[$info['network']].'</td>
		                    <td>'.$type[$data[$i]['type']].'</td>
		                    <td>'.$slots[$data[$i]['timeslot']].'</td>
		                    <td>'.date('F j, Y', strtotime($data[$i]['created'])).'</td>
		            </tr>';
	    	}else{
	    		$content .= '<tr style="color: red;">
		                    <td>'.$info['firstname'].' '.$info['lastname'].'</td>
		                    <td>'.$leader[$info['network']].'</td>
		                    <td>'.$type[$data[$i]['type']].'</td>
		                    <td>'.$slots[$data[$i]['timeslot']].'</td>
		                    <td>'.date('F j, Y', strtotime($data[$i]['created'])).'</td>
		            </tr>';
	    	}
	        
	    }
	}else{
	    $content = 'No results found';
	}
}
?>