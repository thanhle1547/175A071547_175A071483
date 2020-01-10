<?php
defined('PATH_SYSTEM') || die("Bad requested!");

class Controller {
    protected $model = NULL;
    protected $view = NULL;
    protected $entity = NULL;

    public function __construct()
    {
        require_once PATH_SYSTEM . '/core/loader/View_Loader.php';
        $this->view = new View_Loader;

        require_once PATH_SYSTEM . '/core/loader/Model_Loader.php';
        $this->model = new Model_Loader;

        require_once PATH_SYSTEM . '/core/loader/Entity_Loader.php';
        $this->entity = new Entity_Loader;
    }
}
?>