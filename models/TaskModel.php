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
} 
