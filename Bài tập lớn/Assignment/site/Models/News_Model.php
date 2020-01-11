<?php
class News_Model {
    private static $params = NULL;

    public static function load_posts()
    {
        return DB::getInstance()->query_fetchAll_to_class(
            "Select * from dh_thuyloi.BaiViet",
            'BaiViet'
        );
    }

    public static function load_top_3_posts()
    {
        return DB::getInstance()->query_fetchAll_to_class(
            "Select * from dh_thuyloi.BaiViet LIMIT 3",
            'BaiViet'
        );
    }

    public static function load_post(&$maBai)
    {
        self::$params = array(
            new DB_Param(':maBai', $maBai, PDO::PARAM_STR, 10)
        );
        return DB::getInstance()->query_fetchAll_to_class(
            "Select * from dh_thuyloi.BaiViet Where MaBai = :maBai",
            'BaiViet'
        );
    }
}
?>