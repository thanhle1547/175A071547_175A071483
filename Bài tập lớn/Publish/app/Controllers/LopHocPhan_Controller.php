<?php
defined('PATH_SYSTEM') || die("Bad request!");

class LopHocPhan_Controller extends Base_Controller {
    public function index() {
        $data['title'] = "Lớp học phần";
        $data['page'] = "lop-hoc-phan";
        $this->load_layout('lop-hoc-phan', $data);
    }
}
