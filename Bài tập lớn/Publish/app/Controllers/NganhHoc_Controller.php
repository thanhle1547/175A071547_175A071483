<?php
defined('PATH_SYSTEM') || die("Bad request!");

class NganhHoc_Controller extends Base_Controller {
    public function index() {
        $data['title'] = "Ngành học";
        $this->load_layout('nganh-hoc', $data);
    }
}
