<?php 

class Current {
	public function getAllLogs(){
		include('apps/config/connection.php');
		$data = array();
		$today = date('Y-m-d');
		$sql = "SELECT * FROM logs WHERE created = '$today' AND status = 1 ORDER BY created DESC";
		$result = $con->query($sql);
		// $stmt->bind_result($username, $token);
		// $stmt->fetch();

		if($result->num_rows === 0){
			return false;
		}else{
			while($row = $result->fetch_assoc()){
				array_push($data, $row);
			}
			return $data;
		}
	}

	public function getCurrentLogss($datein, $timeslot){
		include('apps/config/connection.php');
		$data = array();
		if($timeslot == 0){
			$sql = "SELECT * FROM logs WHERE created = '$datein' AND status = 1 ORDER BY created DESC";
		}else{
			$sql = "SELECT * FROM logs WHERE created = '$datein' AND timeslot = '$timeslot' AND status = 1 ORDER BY created DESC";
		}
		
		$result = $con->query($sql);
		// $stmt->bind_result($username, $token);
		// $stmt->fetch();

		if($result->num_rows === 0){
			return false;
		}else{
			while($row = $result->fetch_assoc()){
					array_push($data, $row);
				
			}
			return $data;
		}
	}

	
	
}

?>