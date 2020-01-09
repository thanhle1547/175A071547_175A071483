<?php
class Subjects_Model {
    public static function load_subjects(&$maNganh) {
        $params = array(
            new DB_Param(':maNganh', $maNganh, PDO::PARAM_STR, 10)
        );
        echo json_encode(
            DB::getInstance()->exec_fetchAll_to_class(
                "Select MaMon, TenMon from dh_thuyloi.MonHoc where MaNganh = ':maNganh'",
                'MonHoc',
                $params)
        );
    }

    public static function load_majors()
    {
        return DB::getInstance()->exec_fetchAll_to_class(
            'Select MaNganh, TenNganh from dh_thuyloi.NganhHoc',
            'NganhHoc'
        );
    }

    public static function add_subject(&$maMon, &$maNganh, &$tenMon)
    {
        return DB::getInstance()->exec_fetchAll_to_class(
            "Insert into dh_thuyloi.MonHoc values (MaMon = :maMon, MaNganh = :maNganh, TenMon = :tenMon)",
            'MonHoc',
            array(
                new DB_Param(':maMon', $maMon, PDO::PARAM_STR, 10),
                new DB_Param(':maNganh', $maNganh, PDO::PARAM_STR, 10),
                new DB_Param(':tenMon', $tenMon, PDO::PARAM_STR, 30)
            )
        );
    }
}
?>