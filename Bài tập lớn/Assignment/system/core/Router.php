<?php
defined('PATH_SYSTEM') || die('Bad request!');

class Router {
    protected $controller;
    protected $action;
    protected $params = [];
    protected $config = [];
    protected $url = [];
    protected $route;

    public function __construct()
    {
        $config = include_once PATH_SYSTEM . '/config/init.php';
    }

    private static function parseUrl()
    {
        if(isset($_GET['url']))
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
    }

    private static function getController() {
        return empty($this->url[1]) ? 
            $this->config['default_controller'] 
            // Chuyển đổi tên controller vì nó có định dạng là {Name}_Controller
            : ucfirst(strtolower($this->url[1]) ) . '_Controller';
    }

    private static function getAction() {
        return empty($this->url[2]) ?
            $this->config['default_action'] : strtolower($this->url[2]);
    }

    private static function include_Controller() {
        if (!file_exists("/$this->route/controller/$this->controller.php"))
            die('Không tìm thấy');
        // Include controller chính để các controller con nó kế thừa
        include_once PATH_SYSTEM . '/core/Controller.php';
        include_once "/$this->route/core/Base_Controller.php";
        
        require_once "/$this->route/core/$this->controller.php";
    }

    public static function load() {
        $this->url = self::parseUrl();

        $this->route = strtolower($this->url[0]);

        $this->controller = self::getController();
        $this->action = self::getAction();

        self::include_Controller();

        $controller = new $this->controller();

        if (! method_exists($controller, $this->action))
            die('Không tìm thấy');

        // unset 0, 1, 2 vì nếu có tham số thì nó sẽ là các gtri còn lại trong mảng
        unset($this->url[0], $this->url[1], $this->url[2]);
        $this->params = isset($url) ? array_values($this->url) : [];

        // Gọi method trong controller
        call_user_func_array([$this->controller, $this->action], $this->params);
    }
}
?>