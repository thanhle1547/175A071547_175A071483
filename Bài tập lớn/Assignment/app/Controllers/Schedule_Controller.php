<?php
defined('PATH_SYSTEM') || die("Bad request!");

class Schedule_Controller extends Base_Controller
{
    public function index()
    {
        $data['title'] = "lịch trình giảng dạy";
        $data['page'] = 'scheulde';
        $this->load_layout(['schedule'], $data);
    }
}
