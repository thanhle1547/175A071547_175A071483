<?php
defined('PATH_SYSTEM') || die("Bad request!");

include PATH_APP . '/Entities/MonHoc_Entity.php';
include PATH_APP . '/Entities/NganhHoc_Entity.php';
include PATH_APP . '/Models/MonHoc_Model.php';

class MonHoc_Controller extends Base_Controller {
    public function index() {
        $data['title'] = "Môn học";
        $data['majors'] = $this->load_majors();
        $this->load_layout('mon-hoc', $data);
    }

    public function load_subjects($maNganh){
        $data = json_encode(MonHoc_Model::load_subjects($maNganh), JSON_UNESCAPED_UNICODE);
        echo $data;
    }

    public function add_subject($maMon, $maNganh, $tenMon)
    {
        try {
            MonHoc_Model::add_subject($maMon, $maNganh, $tenMon);
        }
        catch (PDOException $e) {
            throw new Exception("Error Processing Request", 1);
        }
    }

    public function edit_subject($maMon, $maNganh, $tenMon)
    {
        return MonHoc_Model::add_subject($maMon, $maNganh, $tenMon);
    }

    public function delete_subject($maMon, $maNganh, $tenMon)
    {
        return MonHoc_Model::add_subject($maMon, $maNganh, $tenMon);
    }

    public function load_majors()
    {
        return MonHoc_Model::load_majors();
    }
}
?>