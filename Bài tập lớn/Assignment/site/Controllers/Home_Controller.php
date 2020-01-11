<?php
defined('PATH_SYSTEM') || die("Bad request!");

include PATH_SITE . '/Entities/BaiViet_Entity.php';
include PATH_SITE . '/Models/News_Model.php';

class Home_Controller extends Base_Controller
{
    public function index()
    {
        $data['title'] = 'Trang chủ';
        $data['page'] = 'home';
        $data['posts'] = News_Model::load_top_3_posts();
        $this->load_layout(['carousel', 'news'], $data);
    }
}
