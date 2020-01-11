<?php
defined('PATH_SYSTEM') || die("Bad request!");

include PATH_APP . '/Entities/MonHoc_Entity.php';
include PATH_APP . '/Entities/NganhHoc_Entity.php';
include PATH_APP . '/Models/MonHoc_Model.php';

class MonHoc_Controller extends Base_Controller {
    public function index() {
        $data['title'] = "Môn học";
        $data['majors'] = $this->load_majors();
        $data['page'] = "mon-hoc";
        $this->load_layout('mon-hoc', $data);
    }

    public function load_subjects($maNganh){
        $maNganh = trim($maNganh);
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

    public function edit_subject($maMon, $maNganh, $tenMon, $maMonCu, $maNganhCu)
    {
        try {
            MonHoc_Model::edit_subject($maMon, $maNganh, $tenMon, $maMonCu, $maNganhCu);
        } catch (PDOException $e) {
            throw new Exception("Error Processing Request", 1);
        }
    }

    public function delete_subject($maNganh, $maMon)
    {
        try {
            MonHoc_Model::delete_subject($maNganh, $maMon);
        } catch (PDOException $e) {
            throw new Exception("Error Processing Request", 1);
        }
    }

    public function load_majors()
    {
        return MonHoc_Model::load_majors();
    }
}
?>