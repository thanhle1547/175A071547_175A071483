<?php
class NganhHoc_Model {
    private static $params = NULL;

    public static function load_majors()
    {
        return DB::getInstance()->query_fetchAll_to_class(
            'Select MaNganh, TenNganh from dh_thuyloi.NganhHoc',
            'NganhHoc'
        );
    }

    public static function add_major(&$maNganh, &$tenNganh, &$chiTiet)
    {
        self::$params = array(
            new DB_Param(':chiTiet', $chiTiet, PDO::PARAM_STR, 1000),
            new DB_Param(':maNganh', $maNganh, PDO::PARAM_STR, 10),
            new DB_Param(':tenNganh', $tenNganh, PDO::PARAM_STR, 50)
        );

        try {
            DB::getInstance()->exec_query(
                "Insert into dh_thuyloi.NganhHoc values (:maNganh, :tenNganh, :chiTiet)",
                self::$params
            );
        } catch (PDOException $e) {
            throw new Exception("Error Processing Request", 1);
        }
    }

    public static function edit_major(&$maNganh, &$tenNganh, &$chiTiet, &$maNganhCu)
    {
        self::$params = array(
            new DB_Param(':chiTiet', $chiTiet, PDO::PARAM_STR, 1000),
            new DB_Param(':maNganh', $maNganh, PDO::PARAM_STR, 10),
            new DB_Param(':tenNganh', $tenNganh, PDO::PARAM_STR, 50),
            new DB_Param(':maNganhCu', $maNganhCu, PDO::PARAM_STR, 10),
        );

        try {
            DB::getInstance()->exec_query(
                "Update dh_thuyloi.NganhHoc set MaNganh = :maNganh, TenNganh = :tenNganh, ChiTiet = :chiTiet Where MaNganh = :maNganhCu",
                self::$params
            );
        } catch (PDOException $e) {
            throw new Exception("Error Processing Request", 1);
        }
    }

    public static function delete_subject(&$maNganh, &$maMon)
    {
        self::$params = array(
            new DB_Param(':maMon', $maMon, PDO::PARAM_STR, 10),
            new DB_Param(':maNganh', $maNganh, PDO::PARAM_STR, 10),
            new DB_Param(':tenMon', $tenMon, PDO::PARAM_STR, 30)
        );

        try {
            DB::getInstance()->exec_query(
                "Delete from dh_thuyloi.MonHoc where MaNganh = :maNganh",
                self::$params
            );
        } catch (PDOException $e) {
            throw new Exception("Error Processing Request", 1);
        }
    }
}
