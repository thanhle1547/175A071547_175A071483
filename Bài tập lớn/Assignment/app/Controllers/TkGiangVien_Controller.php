<?php
defined('PATH_SYSTEM') || die("Bad request!");

class TkGiangVien_Controller extends Base_Controller {
    public function index() {
        $data['title'] = "Tài khoản giảng viên";
        $this->load_layout('tk-giangvien', $data);
    }
}
