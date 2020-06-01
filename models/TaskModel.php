<?php


class TaskModel extends Model {

	public function getTask() {
		
		$sql = "SELECT task.id, task.text, task.is_ready, task.was_edited, user.mail as mail, user.name as name FROM task INNER JOIN user ON task.user_id = user.id";

		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		$result = array();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$result[$row['id']] = $row;
		}

		return $result;

	}


	public function addTask($name, $mail, $text, $is_ready, $was_edited) {
		/*$sql = "INSERT INTO user (name, mail)
				VALUES (:name :mail)
				";*/
				$sql = "INSERT INTO user (name, mail)
				VALUES (:name :mail)
				";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":login", $userLogin, PDO::PARAM_STR);
		$stmt->bindValue(":fullName", $userFullName, PDO::PARAM_STR);
		$stmt->bindValue(":email", $userEmail, PDO::PARAM_STR);
		$stmt->bindValue(":role_id", $userRole, PDO::PARAM_INT);
		$stmt->bindValue(":password", $userPassword, PDO::PARAM_STR);	
		$stmt->execute();
		return true;	
	


	}

	public function addUserGetId($name, $mail) {
		$sqlIn = "INSERT INTO user (name, mail) VALUES (:name :mail)";
		$stmt = $this->db->prepare($sqlIn);
		$stmt->bindValue(":name", $name, PDO::PARAM_STR);
		$stmt->bindValue(":mail", $mail, PDO::PARAM_STR);
		$stmt->execute();
		$id = $db->lastInsertId();
		return $id;
	}

} 
