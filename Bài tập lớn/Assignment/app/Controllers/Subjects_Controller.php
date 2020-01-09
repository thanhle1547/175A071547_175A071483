<?php
defined('PATH_SYSTEM') || die("Bad request!");

include PATH_APP . '/Entities/MonHoc_Entity.php';

class Subjects_Controller extends Base_Controller {
    public function index() {
        $this->include_entity('NganhHoc');
        $this->load_model('subjects');
        $data['majors'] = $this->load_majors();
        $this->load_layout('subjects', $data);
    }

    public function load_subjects($maNganh){
        $this->include_entity('MonHoc');
        $this->load_model('subjects');
        $data = Subjects_Model::load_subjects($maNganh);
        echo $data;
    }

    public function add_subject($maMon, $maNganh, $tenMon)
    {
        $this->include_entity('MonHoc');
        $this->load_model('subjects');
        return Subjects_Model::add_subject($maMon, $maNganh, $tenMon);
    }

    public function load_majors()
    {
        return Subjects_Model::load_majors();
    }
}
?>