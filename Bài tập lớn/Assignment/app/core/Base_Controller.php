<?php
defined('PATH_SYSTEM') || die("Bad request!");

class Base_Controller extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function load_layout($content, $content_data = array())
    {
        $this->load_header();
        $this->load_nav();
        $this->load_content($content, $content_data);
    }

    public function load_header()
    {
        $this->view->load('header');
    }

    public function load_nav() {
        $this->view->load('nav');
    }

    public function load_content($content, $content_data = array())
    {
        $this->view->load($content, $content_data);
    }

    public function __destruct()
    {
        $this->view->render();   
    }
}
?>