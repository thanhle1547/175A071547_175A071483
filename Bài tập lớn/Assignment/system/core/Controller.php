<?php
defined('PATH_SYSTEM') || die("Bad requested!");

class Controller {
    protected $model = NULL;
    protected $view = NULL;

    public function __construct()
    {
        require_once PATH_SYSTEM . '/core/loader/View_Loader.php';
        $this->view = new View_Loader;
    }
}
?>