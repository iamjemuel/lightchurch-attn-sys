<?php 

class Services {
	public function getAllLogs(){
		include('apps/config/connection.php');
		$data = array();
		$sql = "SELECT * FROM logs WHERE status = 1 ORDER BY created DESC";
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

	public function getSearchLogs($from, $to){
		include('apps/config/connection.php');
		$data = array();
		$sql = "SELECT * FROM logs WHERE created BETWEEN '$from' AND '$to' AND status = 1 ORDER BY created DESC";
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

	public function getSearchLogss($from, $to, $timeslot){
		include('apps/config/connection.php');
		$data = array();
		if($timeslot == 0){
			$sql = "SELECT * FROM logs WHERE created BETWEEN '$from' AND '$to' AND status = 1 ORDER BY created DESC";
		}else{
			$sql = "SELECT * FROM logs WHERE created BETWEEN '$from' AND '$to' AND timeslot = '$timeslot' AND status = 1 ORDER BY created DESC";
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

	public function getSearchNetworkLogss($from, $to, $timeslot){
		include('apps/config/connection.php');
		$data = array();
		if($timeslot == 0){
			$sql = "SELECT * FROM logs WHERE created BETWEEN '$from' AND '$to' AND status = 1 ORDER BY created DESC";
		}else{
			$sql = "SELECT * FROM logs WHERE created BETWEEN '$from' AND '$to' AND timeslot = '$timeslot' AND status = 1 ORDER BY created DESC";
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

	public function getAttendeeLogs($id){
		include('apps/config/connection.php');
		$data = array();
		$result = $con->query("SELECT * FROM logs WHERE attendee_id = '$id' AND status = 1");

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