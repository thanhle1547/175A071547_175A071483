<?php
class MonHoc_Model {
    private static $params = NULL;

    public static function load_subjects(&$maNganh) {
        self::$params = array(
            new DB_Param(':maNganh', $maNganh, PDO::PARAM_STR, 10)
        );
        return DB::getInstance()->query_fetchAll_to_class(
                "Select * from dh_thuyloi.MonHoc where MaNganh = :maNganh",
                'MonHoc',
                self::$params
            );
    }

    public static function load_majors()
    {
        return DB::getInstance()->query_fetchAll_to_class(
            'Select MaNganh, TenNganh from dh_thuyloi.NganhHoc',
            'NganhHoc'
        );
    }

    public static function add_subject(&$maNganh, &$maMon, &$tenMon)
    {
        // https://stackoverflow.com/a/42594833
        // All parameters to bind_param must be passed by reference. A string is a primitive value, and cannot be passed by reference.
        // You can fix this by creating a variable and passing that as a parameter instead:
        self::$params = array(
            new DB_Param(':maMon', $maMon, PDO::PARAM_STR, 10),
            new DB_Param(':maNganh', $maNganh, PDO::PARAM_STR, 10),
            new DB_Param(':tenMon', $tenMon, PDO::PARAM_STR, 30)
        );

        try {
            DB::getInstance()->exec_query(
                "Insert into dh_thuyloi.MonHoc values (:maMon, :maNganh, :tenMon)",
                self::$params
            );
        } catch (PDOException $e) {
            throw new Exception("Error Processing Request", 1);
        }
    }

    public static function edit_subject(&$maNganh, &$maMon, &$tenMon, &$maMonCu, &$maNganhCu)
    {
        self::$params = array(
            new DB_Param(':maMon', $maMon, PDO::PARAM_STR, 10),
            new DB_Param(':maNganh', $maNganh, PDO::PARAM_STR, 10),
            new DB_Param(':tenMon', $tenMon, PDO::PARAM_STR, 30),
            new DB_Param(':maMonCu', $maMonCu, PDO::PARAM_STR, 10),
            new DB_Param(':maNganhCu', $maNganhCu, PDO::PARAM_STR, 10)
        );

        try {
            DB::getInstance()->exec_query(
                "Update dh_thuyloi.MonHoc set MaMon = :maMon, MaNganh = :maNganh, TenMon = :tenMon Where MaMon = :maMonCu and MaNganh = :maNganhCu",
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
?>