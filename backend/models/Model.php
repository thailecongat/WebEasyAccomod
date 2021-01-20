<?php
require_once 'configs/database.php';

/**
 * Class Model đóng vai trò class Model cha
 */
class Model
{
    public $connection = null;

    public function __construct()
    {
        $this->connectDb();
    }

    public function connectDb()
    {
        try {
            $this->connection = new PDO(DB_DSN, DB_USERNAME,
                DB_PASSWORD);
        } catch (PDOException $e) {
            echo "KẾt nối thất bại: " . $e->getMessage();
        }
    }

    public function closeDb()
    {
        $this->connection = null;
    }
}