<?php
include('apps/model/current.class.php');
include('apps/model/services.class.php');
include('apps/variables.php');

$current = new Current();
$services = new Services();

date_default_timezone_set('Asia/Manila');
$today = date('Y-m-d');
$members = 0;
$visitors = 0;
$total = 0;
$content = '';
$selected = 'selected';


if(isset($_GET['s'])){
	if($_GET['network'] == 'all'){
		if($current->getCurrentLogss($today, $_GET['timeslot'])){
		    $data = $current->getCurrentLogss($today, $_GET['timeslot']); 
		    for($i = 0; $i <= count($data)-1; $i++){
		    	$info = $services->getAttendee($data[$i]['attendee_id']);
		        $content .= '<tr>
			                    <td>'.$info['firstname'].' '.$info['lastname'].'</td>
			                    <td>'.$leader[$info['network']].'</td>
			                    <td>'.$type[$data[$i]['type']].'</td>
			                    <td>'.$slots[$data[$i]['timeslot']].'</td>
			                    <td>'.date('F j, Y', strtotime($data[$i]['created'])).'</td>
			            </tr>';
			    if($data[$i]['type']){
		    		$visitors++;
		    	}else{
		    		$members++;
		    	}
		    	$total++;
		    }
		}else{
		    $content = 'No results found';
		}	
	}else{
		if($current->getCurrentLogss($today, $_GET['timeslot'])){
		    $data = $current->getCurrentLogss($today, $_GET['timeslot']); 
		    for($i = 0; $i <= count($data)-1; $i++){
		    	$info = $services->getAttendee($data[$i]['attendee_id']);
		    	if($info['network'] == $_GET['network']){
			    	$content .= '<tr>
			                    <td>'.$info['firstname'].' '.$info['lastname'].'</td>
			                    <td>'.$leader[$info['network']].'</td>
			                    <td>'.$type[$data[$i]['type']].'</td>
			                    <td>'.$slots[$data[$i]['timeslot']].'</td>
			                    <td>'.date('F j, Y', strtotime($data[$i]['created'])).'</td>
			            </tr>';
				    if($data[$i]['type']){
			    		$visitors++;
			    	}else{
			    		$members++;
			    	}
			    	$total++;
		    	}
		        
		    }
		}else{
		    $content = 'No results found';
		}
	}
	
}else{
	if($current->getAllLogs()){
	    $data = $current->getAllLogs(); 
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
	    		$content .= '<tr>
			                    <td>'.$info['firstname'].' '.$info['lastname'].'</td>
			                    <td>'.$leader[$info['network']].'</td>
			                    <td>'.$type[$data[$i]['type']].'</td>
			                    <td>'.$slots[$data[$i]['timeslot']].'</td>
			                    <td>'.date('F j, Y', strtotime($data[$i]['created'])).'</td>
			            </tr>';
	    	}

	    	if($data[$i]['type']){
	    		$visitors++;
	    	}else{
	    		$members++;
	    	}
	    	$total++;
	        
	    }
	}else{
	    $content = 'No results found';
	}
}
?>