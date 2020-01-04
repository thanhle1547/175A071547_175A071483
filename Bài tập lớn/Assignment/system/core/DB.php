<?php
defined('PATH_SYSTEM') || die("Bad requested");
// require_once '../config/config.php';

class DB extends PDO {
    protected static $instance = NULL;

    public static function getInstance() {
        if (!isset(self::$instance))
            self::__construct();
        return self::$instance;
    }

    private function __construct ()
    {
        try {
            // charset = utf8mb4 not working with PHP versions before 5.3.6
            self::$instance = new PDO(
                'mysqli:host = ' . DB_SERVER .
                '; dbname = ' . DB_NAME .
                '; charset = utf8mb4',
                DB_USERNAME, DB_PASSWORD,
            array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ));
        } catch (PDOException $e) {
            die("ERROR: Could not connect. " . $e->getMessage());
        }
    }

    /* public function exec_fetchAll_to_class(PDOStatement &$stmt, $className) {
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, $className);
    } */
}

?>