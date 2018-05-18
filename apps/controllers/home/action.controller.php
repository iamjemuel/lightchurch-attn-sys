<?php

include('../../model/home.class.php');
include('../../variables.php');
date_default_timezone_set('Asia/Manila');
$today = date('Y-m-d');

$home = new Home();

if(isset($_POST['action'])){

	switch($_POST['action']){
		case 'searchrecord':
			$result = $home->searchRecord($_POST['keyword']);
			if($result){
				$arr = array(
					'success' => true,
					'result' => $result,
					'note' => 'Search successful!'
				);
			}else{
				$arr = array(
					'success' => false,
					'note' => 'Search unsuccessful. Please try again.'
					);
			}
			break;
		case 'login':
			if($_POST['datein']){
				$check = $home->checkLogin($_POST['id'], $_POST['datein']);
			}else{
				$check = $home->checkLogin($_POST['id'], $today);
			}
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