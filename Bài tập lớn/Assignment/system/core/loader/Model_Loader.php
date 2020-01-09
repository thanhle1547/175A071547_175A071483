<?php
class Model_Loader {
    public function load($route, $model){
        include_once $route . '/Models/' . ucfirst(strtolower($model)) . '_Model.php';
    }
}
