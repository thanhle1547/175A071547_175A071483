<?php
defined('PATH_SYSTEM') || die("Bad request!");

class LopHocPhan_Controller extends Base_Controller {
    public function index() {
        $data['title'] = "Lớp học phần";
        $this->load_layout('lop-hoc-phan', $data);
    }
}
