<?php
class View_Loader {
    private $content = array();

    public function load($view, $data = array()){
        extract($data);

        ob_start();
        require_once PATH_APP . '/view/' . $view . '.php';
        $this->content = ob_get_clean();
    }

    public function render()
    {
        foreach($this->content as $html)
            echo $html;
    }
}
?>