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

} 
