<?php
class Account_Model {
    private static $params = NULL;

    public static function login(&$username) {
        self::$params = array(
            new DB_Param(':username', $username, PDO::PARAM_STR, 20)
        );
        return DB::getInstance()->query_fetchAll_to_class(
            "Select MaND, HoTen, Password, Salt, MaCV From dh_thuyloi.NguoiDung Where Username = :username and Active = 1",
            'NguoiDung',
            self::$params
        );
    }
}
