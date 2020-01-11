<?php
defined('PATH_SYSTEM') || die("Bad request!");

include PATH_SITE . '/Entities/BaiViet_Entity.php';
include PATH_SITE . '/Models/News_Model.php';

class News_Controller extends Base_Controller
{
    public function index()
    {
        $data['title'] = "Tin tức";
        $data['page'] = 'news';
        $data['posts'] = News_Model::load_posts();
        $this->load_layout(['news'], $data);
    }

    public function detail($id)
    {
        $data['title'] = "Tin tức";
        $data['page'] = 'news';
        $data['post'] = News_Model::load_posts()[0];
        $this->load_layout(['news-detail'], $data);
    }
}
