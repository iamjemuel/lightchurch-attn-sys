<?php 

class Current {

	public function getAllLogs($date){
		include('apps/config/connection.php');
		$data = array();
		$sql = "SELECT * FROM logs WHERE created = '$date' AND status = 1 ORDER BY date_created DESC";
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

	public function getSearchLogs($timeslot, $date){
		include('apps/config/connection.php');
		$data = array();
		$sql = "SELECT * FROM logs WHERE created = '$date' AND timeslot = '$timeslot' AND status = 1 ORDER BY date_created DESC";
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

	public function getAttendee($id){
		include('apps/config/connection.php');
		$data = array();
		$sql = "SELECT * FROM attendees WHERE id = '$id'";
		$result = $con->query($sql);
		// $stmt->bind_result($username, $token);
		// $stmt->fetch();

		if($result->num_rows === 0){
			return false;
		}else{
			return $result->fetch_assoc();
		}
	}
}

?>