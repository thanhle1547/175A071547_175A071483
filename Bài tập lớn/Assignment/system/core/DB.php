<?php
defined('PATH_SYSTEM') || die("Bad requested");
// require_once '../config/config.php';

class DB {
    private $pdo;
    protected static $instance = NULL;
    private $stmt;

    public static function getInstance() {
        if (self::$instance === NULL)
            self::$instance = new DB();
        return self::$instance;
    }

    private function __construct ()
    {
        try {
            // charset = utf8mb4 not working with PHP versions before 5.3.6
            $this->pdo = new PDO(
                'mysql:host = ' . DB_SERVER .
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

    public function exec_fetchAll_to_class($query, $className, &$params = array()) {
        if ($this->stmt = $this->pdo->prepare($query)) {
            if (!empty($params))
                foreach($params as $param)
                    $this->stmt->bindParam(
                        $param->parameter, 
                        $param->variable, 
                        $param->data_type, 
                        $param->length
                    );

            if ($this->stmt->execute())
                return $this->stmt->fetchAll(PDO::FETCH_CLASS, $className);
            return false;
        }
    }
}

?>