<?php

class LoginController extends Controller {

	private $pageTpl = '/views/login.tpl.php';


	public function __construct() {
		$this->model = new LoginModel();
		$this->view = new View();
	}


	public function index() {
		$this->pageData['title'] = "Авторизация";
		$this->view->render($this->pageTpl, $this->pageData);
	}

} 
