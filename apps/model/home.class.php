<?php 

class Home {

	public function getLastNames(){
		include('apps/config/connection.php');
		$data = array();
		$result = $con->query("SELECT DISTINCT lastname FROM attendees WHERE status = 1 ORDER BY lastname DESC");

		if($result->num_rows === 0){
			return false;
		}else{
			while($row = $result->fetch_assoc()){
				array_push($data, $row);
			}
			return $data;
		}
	}

	public function searchRecord($keyword){
		include('../../config/connection.php');
		$data = array();
		$query = "SELECT * FROM attendees WHERE (firstname LIKE '%$keyword%' OR lastname LIKE '%$keyword%') AND status = 1 ORDER BY firstname ASC";
		$result = $con->query($query);

		if($result->num_rows === 0){
			return false;
		}else{
			while($row = $result->fetch_assoc()){
				array_push($data, $row);
				
			}
			return $data;
		}
	}

	public function checkLogin($id, $datein){
		include('../../config/connection.php');
		date_default_timezone_set('Asia/Manila');
		$today = date('Y-m-d');
		$query = "SELECT * FROM logs WHERE attendee_id = ? AND created = ? AND status = 1";
		$stmt = $con->prepare($query);
		$stmt->bind_param('is', $id, $datein);
		$stmt->execute();
		$result = $stmt->get_result();

		if($result->num_rows === 0){
			return false;
		}else{
			return $result->fetch_assoc();
		}
	}

	public function logIn($id, $timeslot, $type, $datein){
		include('../../config/connection.php');
		
		$data = array();
		$stmt = $con->prepare("INSERT INTO logs (attendee_id, timeslot, type, created) VALUES (?, ?, ?, ?)");
		$stmt->bind_param('iiis', $id, $timeslot, $type, $datein);

		if($stmt->execute()){
			return $con->insert_id;
		}else{
			return false;
		}
	}
}


?>