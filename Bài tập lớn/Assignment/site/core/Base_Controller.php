<?php
defined('PATH_SYSTEM') || die("Bad request!");

class Base_Controller extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function load_layout($content, $content_data = array())
    {
        $this->load_header($content_data);
        foreach ($content as $c)
            $this->load_content($c, $content_data);
        $this->load_footer();
    }

    public function load_header($content_data = array())
    {
        $this->view->load('site', 'header', $content_data);
    }

    public function load_footer() {
        $this->view->load('site', 'footer');
    }

    public function load_content($content, $content_data = array())
    {
        $this->load_view($content, $content_data);
    }

    public function load_view($content, $content_data = array())
    {
        $this->view->load('site', $content, $content_data);
    }

    public function load_model($model)
    {
        $this->model->load('site', $model);
    }

    public function include_entity($entity)
    {
        return $this->entity->load('site', $entity);
    }

    public function __destruct()
    {
        $this->view->render();   
    }
}
?>