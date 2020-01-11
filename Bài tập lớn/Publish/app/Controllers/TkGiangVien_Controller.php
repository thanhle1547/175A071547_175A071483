<?php
defined('PATH_SYSTEM') || die("Bad request!");

class TkGiangVien_Controller extends Base_Controller {
    public function index() {
        $data['title'] = "Tài khoản giảng viên";
        $data['page'] = "tk-giangvien";
        $this->load_layout('tk-giangvien', $data);
    }
}
