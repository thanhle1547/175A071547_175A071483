<?php
defined('PATH_SYSTEM') || die("Bad request!");

class BaseController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function load_header()
    {
        $this->view->load('header');
    }

    public function load_nav() {
        $this->view->load('nav');
    }

    public function __destruct()
    {
        $this->view->render();   
    }
}
?>