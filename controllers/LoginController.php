<?php

class LoginController extends Controller {

	private $pageTpl = '/views/login.tpl.php';


	public function __construct() {
		$this->model = new LoginModel();
		$this->view = new View();
	}


	public function index() {
		$this->pageData['title'] = "Авторизация";
		if(!empty($_POST)) {
			if(!$this->login()) {
				$this->pageData['error'] = "Неправильный пароль или имя";
			}
		}

		$this->view->render($this->pageTpl, $this->pageData);
	}

	public function login() {
		if(!$this->model->checkUser()) {
			return false;
		}
	}
} 
