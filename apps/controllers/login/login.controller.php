<?php 
include('../../model/user.class.php');

$user = new User();

if(isset($_POST['action'])){

	switch($_POST['action']){
		case 'login':
			$result = $user->login($_POST['username'], $_POST['password']);
			if($result){
				session_start();
				$_SESSION['user'] = $result->username;
				$_SESSION['token'] = $result->token;
				$arr = array(
					'success' => true,
					'note' => 'Login successful!'
				);
			}else{
				$arr = array(
					'success' => false,
					'note' => 'No result'
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