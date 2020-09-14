<?php

namespace App\Components;

use App\Config\Routes;

class Router
{
	private $routes;
	public $path_info;
	public function __construct()
	{
		$route = new Routes();
		$this->routes = $route->take_routes();
	}



	private function get_url()
	{
		if (!empty($_SERVER['REQUEST_URI'])) {
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}


	public function run()
	{

		$uri = $this->get_url();
		//Получение данных из файла Path
		foreach ($this->routes as $uriPattern => $path) {
			if (preg_match("~$uriPattern~", $uri)) {
				$params = array();
				$segments = explode('@', $path);
				$params['controller'] = ucfirst(array_shift($segments));
				$controller_name = $params['controller'] . 'Controller';
				$params['action'] = array_shift($segments);
				$action = $params['action'];
				$segments2 = explode('/', $this->get_url());
				$params['data'] = array_pop($segments2);
				$path =  'App\Controllers\\' . $controller_name;
				if (class_exists($path)) {
					$controller = new $path($params);
					$controller->$action();
				}
				break;
			}
		}
	}
}
