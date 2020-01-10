<?php
defined('PATH_SYSTEM') || die("Bad request!");

class Home_Controller extends Base_Controller
{
    public function index()
    {
        $data['title'] = 'Trang chủ';
        $data['page'] = 'home';
        $this->load_layout(['carousel', 'news'], $data);
    }
}
