<?php
defined('PATH_SYSTEM') || die("Bad request!");

class News_Controller extends Base_Controller
{
    public function index()
    {
        $data['title'] = "Tin tức";
        $data['page'] = 'news';
        $this->load_layout(['news'], $data);
    }
}
