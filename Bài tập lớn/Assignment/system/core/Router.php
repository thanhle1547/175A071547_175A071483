<?php
defined('PATH_SYSTEM') || die('Bad request!');

class Router {
    protected $controller;
    protected $action;
    protected $params = [];
    protected $config = [];
    protected $url = [];
    protected $route;

    public function __construct() { }

    private function parseUrl()
    {
        if(isset($_GET['url']))
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
    }

    private function getController() {
        // Chuyển đổi tên controller vì nó có định dạng là {Name}_Controller
        return ucfirst(strtolower(
            !empty($this->url[1]) ? $this->url[1] : $this->config['default_controller']  )) 
            . '_Controller';
    }

    private function getAction() {
        return empty($this->url[2]) ?
            $this->config['default_action'] : strtolower($this->url[2]);
    }

    private function include_Controller() {
        if (!file_exists(ROOT . '/' . $this->route . '/Controllers/' . $this->controller . '.php'))
            die('Không tìm thấy');
        // Include controller chính để các controller con nó kế thừa
        include_once PATH_SYSTEM . '/core/Controller.php';
        include_once ROOT . "/$this->route/core/Base_Controller.php";
        
        require_once ROOT . "/$this->route/Controllers/$this->controller.php";
    }

    public function load() {
        $this->url = $this->parseUrl();

        $this->route = isset($this->url[0]) ? strtolower($this->url[0]) : PATH_SITE;
        $this->config = include_once $this->route . '/config/init.php';

        $this->controller = $this->getController();
        $this->action = $this->getAction();

        $this->include_Controller();

        $controller = new $this->controller();

        if (! method_exists($controller, $this->action))
            die('Không tìm thấy');

        // unset 0, 1, 2 vì nếu có tham số thì nó sẽ là các gtri còn lại trong mảng
        unset($this->url[0], $this->url[1], $this->url[2]);
        $this->params = isset($url) ? array_values($this->url) : [];

        // Gọi method trong controller
        call_user_func_array([$controller, $this->action], $this->params);
    }
}
?>