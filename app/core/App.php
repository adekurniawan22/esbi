<?php
error_reporting(0);
class App
{
	protected $controller = 'Auth';
	protected $method = 'login';
	protected $params = [];

	public function __construct()
	{
		$url = $this->parseURL();

		// controller
		if (file_exists('../app/controllers/' . $url[0] . '.php')) {
			$this->controller = $url[0];
			unset($url[0]);
		}

		require_once '../app/controllers/' . $this->controller . '.php';
		$this->controller = new $this->controller;

		// method
		if (isset($url[1])) {
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		} else {
			// Jika tidak ada method yang ditentukan dan controller bukan 'Auth', gunakan method "index" secara default
			if ($this->controller !== 'Auth') {
				$this->method = 'index';
			}
		}

		// parameters
		$this->params = $url ? array_values($url) : [];

		// Jalankan controller dan method, serta parameter jika ada
		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	public function parseURL()
	{
		if (isset($_GET['url'])) {
			$url = rtrim($_GET['url'], '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			return $url;
		}
		return [];
	}
}
