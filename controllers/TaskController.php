<?php

class TaskController extends Controller {

	private $pageTpl = '/views/task.tpl.php';


	public function __construct() {
		$this->model = new TaskModel();
		$this->view = new View();
	}


	public function index() {

		$this->pageData['title'] = "Задачи";

        $this->pageData['taskList'] = $this->model->getTask();
        $this->view->render($this->pageTpl, $this->pageData);
	}

	public function addTask() {

		if(!empty($_POST) && !empty($_POST['name']) && !empty($_POST['mail']) && !empty($_POST['text'])) {
			$newName = $_POST['name'];
			$newMail = $_POST['mail'];
			$newText = $_POST['text'];
			$is_ready = 0;
			$was_edited = 0;

			if($this->model->addTask($newUser, $newLogin, $newEmail, $newPassword, $newRole)) {
				echo json_encode(array("success" => true, "text" => "Пользователь добавлен"));
				$this->sendRegisterEmail($newUser, $newLogin, $passwordForEmail, $newEmail);
			} else {
				echo json_encode(array("success" => false, "text" => "Ошибка добавления"));
			}

		} else {
			echo json_encode(array("success" => false, "text" => "Некорректные данные"));
		}
	}

} 
