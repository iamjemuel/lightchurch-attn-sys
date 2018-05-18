<?php
include('apps/model/services.class.php');
include('apps/variables.php');

$services = new Services();

$members = 0;
$visitors = 0;
$total = 0;
$content = '';
$selected = 'selected';

if(isset($_GET['network'])){

}

if(isset($_GET['s'])){
	if($_GET['network'] == 'all'){
		if($services->getSearchLogss($_GET['from'], $_GET['to'], $_GET['timeslot'])){
		    $data = $services->getSearchLogss($_GET['from'], $_GET['to'], $_GET['timeslot']); 
		    for($i = 0; $i <= count($data)-1; $i++){
		    	$info = $services->getAttendee($data[$i]['attendee_id']);
		        $content .= '<tr>
			                    <td>'.$info['firstname'].' '.$info['lastname'].'</td>
			                    <td>'.$slots[$data[$i]['timeslot']].'</td>
			                    <td>'.date('F j, Y', strtotime($data[$i]['created'])).'</td>
			            </tr>';
			    if($data[$i]['type']){
		    		$members++;
		    	}else{
		    		$visitors++;
		    	}
		    	$total++;
		    }
		}else{
		    $content = 'No results found';
		}	
	}else{
		if($services->getSearchLogss($_GET['from'], $_GET['to'], $_GET['timeslot'])){
		    $data = $services->getSearchLogss($_GET['from'], $_GET['to'], $_GET['timeslot']); 
		    for($i = 0; $i <= count($data)-1; $i++){
		    	$info = $services->getAttendee($data[$i]['attendee_id']);
		    	if($info['network'] == $_GET['network']){
			    	$content .= '<tr>
				                    <td>'.$info['firstname'].' '.$info['lastname'].'</td>
				                    <td>'.$slots[$data[$i]['timeslot']].'</td>
				                    <td>'.date('F j, Y', strtotime($data[$i]['created'])).'</td>
				            </tr>';
				    if($data[$i]['type']){
			    		$members++;
			    	}else{
			    		$visitors++;
			    	}
			    	$total++;
		    	}
		        
		    }
		}else{
		    $content = 'No results found';
		}
	}
	
}else{
	if($services->getAllLogs()){
	    $data = $services->getAllLogs(); 
	    for($i = 0; $i <= count($data)-1; $i++){

	    	$info = $services->getAttendee($data[$i]['attendee_id']);
	    	if($info['status']){
	    		$content .= '<tr>
		                    <td>'.$info['firstname'].' '.$info['lastname'].'</td>
		                    <td>'.$slots[$data[$i]['timeslot']].'</td>
		                    <td>'.date('F j, Y', strtotime($data[$i]['created'])).'</td>
		            </tr>';
	    	}else{
	    		$content .= '<tr style="color: red;">
		                    <td>'.$info['firstname'].' '.$info['lastname'].'</td>
		                    <td>'.$slots[$data[$i]['timeslot']].'</td>
		                    <td>'.date('F j, Y', strtotime($data[$i]['created'])).'</td>
		            </tr>';
	    	}

	    	if($data[$i]['type']){
	    		$members++;
	    	}else{
	    		$visitors++;
	    	}
	    	$total++;
	        
	    }
	}else{
	    $content = 'No results found';
	}
}
?>