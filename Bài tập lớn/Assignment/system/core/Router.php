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
        if(isset($_GET['url']) && $_GET['url'] != 'index.php')
            return array_merge(
                explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL)),
                array_values($_POST)
            );
        return [];
    }

    private function getController() {
        // Chuyển đổi tên controller vì nó có định dạng là {Name}_Controller
        return (!empty($this->url[1]) ?
            implode(
                '',
                array_map(
                    'ucfirst',
                    (explode('-', strtolower($this->url[1])))
                )
            )
            : ucfirst($this->config['default_controller'])
            ). '_Controller';
        unset($c);
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

        // Nếu người dùng vào trang đăng nhập và đã đăng nhập trước đó thì tự động chuyển hướng đến trang dashboard
        if ($this->controller == 'Account_Controller' && $this->action == 'index')
        {
            if (isset($_SESSION['userId'])) {
                echo $_SESSION['userId'];
                header("location: dashboard");
                exit;
            }
        }

        if ($this->route == PATH_APP && $this->controller != 'Account_Controller' && $this->action !== 'login' && !isset($_SESSION['userId'])) {
            header("location: account");
            exit;
        }

        $this->include_Controller();

        $controller = new $this->controller();

        if (! method_exists($controller, $this->action))
            die('Không tìm thấy');

        // unset 0, 1, 2 vì nếu có tham số thì nó sẽ là các gtri còn lại trong mảng
        unset($this->url[0], $this->url[1], $this->url[2]);
        if (!empty($this->url[3]))
            $this->params = array_values($this->url);
        else if (isset($_POST))
            $this->params = $_POST;
        else
            $this->params = array();

        // Gọi method trong controller
        call_user_func_array([$controller, $this->action], $this->params);
        unset($this->url);
    }
}
?>