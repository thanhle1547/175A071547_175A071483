<?php
class Entity_Loader {
    public function load($route, $entity){
        include_once $route . '/Entities/' . $entity . '_Entity.php';
    }
}
