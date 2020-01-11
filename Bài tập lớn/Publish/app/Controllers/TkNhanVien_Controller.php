<?php
defined('PATH_SYSTEM') || die("Bad request!");

class TkNhanVien_Controller extends Base_Controller {
    public function index() {
        $data['title'] = "Tài khoản nhân viên";
        $data['page'] = "tk-nhanvien";
        $this->load_layout('tk-nhanvien', $data);
    }
}
