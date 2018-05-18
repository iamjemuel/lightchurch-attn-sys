<?php 

class User {

	public function login($user, $pass){
		include('../../config/connection.php');
		// $sql = "SELECT username, token FROM users WHERE username = ? AND password = ? AND status = 1";
		$stmt = $con->prepare("SELECT * FROM users WHERE username = ? AND password = ? AND status = 1");
		$stmt->bind_param('ss', $user, $pass);
		$stmt->execute();
		$result = $stmt->get_result();
		// $stmt->bind_result($username, $token);
		// $stmt->fetch();

		if($result->num_rows === 0){
			return false;
		}else{
			$row = $result->fetch_object();
			return $row;
		}
	}

}

?>