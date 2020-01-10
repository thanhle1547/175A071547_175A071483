<?php
defined('PATH_SYSTEM') || die("Bad request!");

class Dashboard_Controller extends Base_Controller {
    public function index() {
        $data['title'] = "Dashboard";
        $this->load_layout('dashboard', $data);
    }
}
