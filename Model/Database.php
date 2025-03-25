<?php

class Database
{
    private $conn = NULL;
    private $server = 'localhost';
    private $dbName = 'webct';
    private $user = 'root';
    private $password = '';

    // Hàm kết nối CSDL
    public function connect()
    {
        try {
            $dsn = "mysql:host={$this->server};dbname={$this->dbName};charset=utf8";
            $this->conn = new PDO($dsn, $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Kết nối CSDL thất bại: " . $e->getMessage());
        }
    }

    // Hàm đóng kết nối CSDL
    public function closeDatabase()
    {
        $this->conn = null; // Đặt $conn về null để đóng kết nối
    }

    // Hàm lấy đối tượng kết nối PDO
    public function getConnection()
    {
        return $this->conn;
    }
}