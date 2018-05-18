<?php

include('../../model/attendee.class.php');
include('../../model/home.class.php');
include('../../variables.php');

$attendee = new Attendee();
$home = new Home();

if(isset($_POST['action'])){

	switch($_POST['action']){
		case 'addmember':
			$result = $attendee->addMember($_POST['firstname'], $_POST['middlename'], $_POST['lastname'], $_POST['contact'], $_POST['network'], $_POST['type'], $_POST['invited_by']);
			if($result){
				$arr = array(
					'success' => true,
					'result' => $result,
					'note' => 'Add successful!'
				);
			}else{
				$arr = array(
					'success' => false,
					'note' => 'Add unsuccessful. Please try again.'
					);
			}
			break;
		case 'addvisitor':
			$result = $attendee->addVisitor($_POST['firstname'], $_POST['middlename'], $_POST['lastname'], $_POST['contact'], $_POST['network'], $_POST['type'], $_POST['invited_by'], $_POST['timeslot']);
			if($result){
				$logs = $attendee->addLog($result, $_POST['timeslot'], $_POST['type']);
				if($logs){
					$arr = array(
						'success' => true,
						'result' => $result,
						'note' => 'Add successful!'
					);
				}else{
					$arr = array(
						'success' => false,
						'note' => 'Error in inserting to logs. Please try again.'
					);
				}
			}else{
				$arr = array(
					'success' => false,
					'note' => 'Add unsuccessful. Please try again.'
					);
			}
			break;
		case 'login':
			$check = $home->checkLogin($_POST['id'], $_POST['datein']);
			if($check){
				$arr = array(
					'success' => false,
					'note' => 'Already logged in.'
				);
			}else{
				if($_POST['datein']){
					$result = $home->logIn($_POST['id'], $_POST['timeslot'], $_POST['type'], $_POST['datein']);
					if($result){
						$arr = array(
							'success' => true,
							'result' => $result,
							'note' => 'Login successful on datein!'
						);
					}else{
						$arr = array(
							'success' => false,
							'note' => 'Login unsuccessful on datein. Please try again.'
							);
					}
				}else{
					$result = $home->logIn($_POST['id'], $_POST['timeslot'], $_POST['type'], $today);
					if($result){
						$arr = array(
							'success' => true,
							'result' => $result,
							'note' => 'Login successful today!'
						);
					}else{
						$arr = array(
							'success' => false,
							'note' => 'Login unsuccessful today. Please try again.'
							);
					}
				}

			}
			break;
		case 'edit':
			$result = $attendee->editRecord($_POST['id'], $_POST['firstname'], $_POST['middlename'], $_POST['lastname'], $_POST['contact'], $_POST['network'], $_POST['type'], $_POST['invited_by']);
			if($result){
				$arr = array(
					'success' => true,
					'result' => $result,
					'note' => 'Edit successful!'
				);
			}else{
				$arr = array(
					'success' => false,
					'note' => 'Edit unsuccessful. Please try again.'
					);
			}
			break;
		case 'delete':
			$result = $attendee->deleteRecord($_POST['id']);
			if($result){
				$arr = array(
					'success' => true,
					'result' => $result,
					'note' => 'Deletion successful!'
				);
			}else{
				$arr = array(
					'success' => false,
					'note' => 'Delete unsuccessful. Please try again.'
					);
			}
			break;
		case 'getrecord':
			$result = $attendee->getRecord($_POST['id']);
			if($result){
				$arr = array(
					'success' => true,
					'result' => $result,
					'note' => 'Get record successful!'
				);
			}else{
				$arr = array(
					'success' => false,
					'note' => 'Get record unsuccessful. Please try again.'
					);
			}
			break;
		case 'uploadfile':
			if (is_uploaded_file($_FILES['file_csv']['tmp_name'])) {
	     		if($_FILES["file_csv"]["type"] == "application/vnd.ms-excel")  {
		            $type = $_FILES['file_csv']['type'];
		            if($type == 'application/vnd.ms-excel'){
		            	//open uploaded csv file with read only mode
		            	$attendee->trunc();
						
            			$csvFile = fopen($_FILES['file_csv']['tmp_name'], 'r');
            			//skip first line
            			fgetcsv($csvFile);

            			while(($line = fgetcsv($csvFile)) !== FALSE){
            				$result = $attendee->addMember($line[0], $line[1], $line[2], $line[3], $line[4], $line[5], $line[6]);
            			}
            			$arr = array(
							'success' => true,
							'note' => 'File upload successful!'
						);
		        	}else{
		        		$arr = array(
				        	'success' => false,
				        	'note' => 'File is not a csv or txt'
				        );
				        
		        	}
		        	
	        	}else{
	        		 // file was not on the criteria
	        		$arr = array(
				        'success' => false,
				        'note' => 'File is not a csv or xlsx'
				    );
				    
				}
		    }else{
		    	// if is_upload_file
		    	$arr = array(
				    'success' => false,
					'note' => 'Error in TMP'
				);
				
			}
			break;
		default: 
			$arr = array(
				'success' => false,
				'note' => 'Invalid action'
				);
	}

}else{
	$arr = array(
		'success' => false,
		'note' => 'Action not indicated'
		);
}

echo json_encode($arr);
?>