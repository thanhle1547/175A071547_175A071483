<?php
defined('PATH_SYSTEM') || die("Bad request!");

class Base_Controller extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->route = PATH_APP;
    }

    public function load_layout($content, $content_data = array())
    {
        $this->load_header($content_data);
        $this->load_nav();
        $this->load_content($content, $content_data);
    }

    public function load_header($content_data = array())
    {
        $this->load_view('header', $content_data);
    }

    public function load_nav() {
        $this->load_view('nav');
    }

    public function load_content($content, $content_data = array())
    {
        $this->load_view($content, $content_data);
    }

    public function load_view($content, $content_data = array())
    {
        $this->view->load('app', $content, $content_data);
    }

    public function load_model($model)
    {
        $this->model->load('app', $model);
    }

    public function include_entity($entity) {
        return $this->entity->load('app', $entity);
    }

    public function __destruct()
    {
        $this->view->render();   
    }
}
?>