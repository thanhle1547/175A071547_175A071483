<?php
defined('PATH_SYSTEM') || die("Bad request!");

class NganhHoc_Controller extends Base_Controller {
    public function index() {
        $data['title'] = "Ngành học";
        $data['page'] = "nganh-hoc";
        $this->load_layout('nganh-hoc', $data);
    }

    public function add_major($maNganh, $tenNganh, $chiTiet)
    {
        try {
            NganhHoc_Model::add_major($maNganh, $tenNganh, $chiTiet);
        } catch (PDOException $e) {
            throw new Exception("Error Processing Request", 1);
        }
    }

    public function edit_major($maNganh, $tenNganh, $chiTiet, $maNganhCu)
    {
        try {
            NganhHoc_Model::edit_major($maNganh, $tenNganh, $chiTiet, $maNganhCu);
        } catch (PDOException $e) {
            throw new Exception("Error Processing Request", 1);
        }
    }
}
