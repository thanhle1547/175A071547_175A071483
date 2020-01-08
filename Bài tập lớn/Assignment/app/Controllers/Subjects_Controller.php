<?php
defined('PATH_SYSTEM') || die("Bad request!");

include PATH_APP . '/Entities/Subject_Entity.php';

class Subjects_Controller extends Base_Controller {
    public function index() {
        $this->load_layout('subjects');
    }

    public function load_subjects($maNganh){
        return Subjects_Model::load_subjects($maNganh);
    }
}
?>