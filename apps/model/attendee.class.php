<?php 

class Attendee {

	public function getAll(){
		include('apps/config/connection.php');
		$data = array();
		$result = $con->query("SELECT * FROM attendees WHERE status = 1");

		if($result->num_rows === 0){
			return false;
		}else{
			while($row = $result->fetch_assoc()){
				array_push($data, $row);
				
			}
			return $data;
		}
	}

	public function getRecord($id){
		include('apps/config/connection.php');
		$data = array();
		$stmt = $con->prepare("SELECT * FROM attendees WHERE id = ? AND status = 1");
		$stmt->bind_param('i', $id);
		$stmt->execute();
		$result = $stmt->get_result();
		// $stmt->bind_result($username, $token);
		// $stmt->fetch();

		if($result->num_rows === 0){
			return false;
		}else{
			return $result->fetch_assoc();
		}
	}

	public function getRecordServiceLogs($id){
		include('apps/config/connection.php');
		$data = array();
		$stmt = $con->prepare("SELECT * FROM logs WHERE attendee_id = ? AND status = 1 ORDER BY date_created DESC");
		$stmt->bind_param('i', $id);
		$stmt->execute();
		$result = $stmt->get_result();
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

	public function addMember($firstname, $middlename, $lastname, $contact, $network, $type, $invited){
		include('../../config/connection.php');
		$today = date('Y-m-d');
		$stmt = $con->prepare("INSERT INTO attendees (firstname, middlename, lastname, contact, network, type, invited_by, created) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param('ssssiiss', $firstname, $middlename, $lastname, $contact, $network, $type, $invited, $today);
		
		if($stmt->execute()){
			return $con->insert_id;
		}else{
			return false;
		}
	}

	public function addVisitor($firstname, $middlename, $lastname, $contact, $network, $type, $invited, $timeslot){
		include('../../config/connection.php');
		$stmt = $con->prepare("INSERT INTO attendees (firstname, middlename, lastname, contact, network, type, invited_by) VALUES (?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param('ssssiis', $firstname, $middlename, $lastname, $contact, $network, $type, $invited);
		
		if($stmt->execute()){
			return $con->insert_id;
		}else{
			return false;
		}
	}

	public function editRecord($id, $firstname, $middlename, $lastname, $contact, $network, $type, $invited){
		include('../../config/connection.php');
		$today = date('Y-m-d h:i:s');
		$stmt = $con->prepare("UPDATE attendees SET firstname = ?, middlename = ?, lastname = ?, contact = ?, network = ?, type = ?, invited_by = ?, updated = ? WHERE id = ?");
		$stmt->bind_param('ssssiissi', $firstname, $middlename, $lastname, $contact, $network, $type, $invited, $today, $id);
		
		if($stmt->execute()){
			return $id;
		}else{
			return false;
		}
	}

	public function deleteRecord($id){
		include('../../config/connection.php');
		$data = array();
		$today = date('Y-m-d h:i:s');
		$stmt = $con->prepare("UPDATE attendees SET status = 0, updated = ? WHERE id = ?");
		$stmt->bind_param('si', $today, $id);
		
		if($stmt->execute()){
			return $id;
		}else{
			return false;
		}
	}

	public function addLog($id, $timeslot, $type){
		include('../../config/connection.php');
		$today = date('Y-m-d');
		$stmt = $con->prepare("INSERT INTO logs (attendee_id, timeslot, type, created) VALUES (?, ?, ?, ?)");
		$stmt->bind_param('iiis', $id, $timeslot, $type, $today);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}

	public function trunc(){
		include('../../config/connection.php');
		$con->query("TRUNCATE TABLE attendees");
	}


}


?>