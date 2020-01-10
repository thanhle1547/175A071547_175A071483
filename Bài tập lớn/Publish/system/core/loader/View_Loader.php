<?php
class View_Loader {
    private $content = array();

    public function load($route, $view, $data = array()){
        extract($data);

        ob_start();
        include_once $route . '/Views/' . $view . '.php';
        $this->content[] = ob_get_clean();
    }

    public function render()
    {
        foreach($this->content as $html)
            echo $html;
    }
}
?>