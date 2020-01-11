<?php
defined('PATH_SYSTEM') || die("Bad request!");

class GiangVien_Controller extends Base_Controller {
    public function index() {
        $data['title'] = "Giảng viên";
        $data['page'] = "giang-vien";
        $this->load_layout('giang-vien', $data);
    }
}
