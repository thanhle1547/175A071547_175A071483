<?php
defined('PATH_SYSTEM') || die("Bad request!");

class Subjects_Controller extends Base_Controller {
    public function index() {
        $this->load_layout('subjects');
    }
}
?>