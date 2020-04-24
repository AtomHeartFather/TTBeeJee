<?php


class Routing {
	public static function buildRoute() {
		/* контроллер и action по умолчанию */
		$controllerName = "IndexController";
		$modelName = "IndexModel";
		$action = "index";

		$route = explode("/", $_SERVER['REQUEST_URI']);

		/* определяем контроллер */
		if($route[2] != '') { //проверить позицию в массиве при перезде на хостинг
			$controllerName = ucfirst($route[2]. "Controller");
			$modelName = ucfirst($route[2]. "Model");
		}

		include CONTROLLER_PATH . $controllerName . ".php";
		include MODEL_PATH . $modelName . ".php";

		if(isset($route[3]) && $route[3] !='') { //проверить позицию в массиве при перезде на хостинг
			$action = $route[3]; 
		}

		$controller = new $controllerName();
		$controller->$action();
	}

	public function errorPage() {

	}
}
