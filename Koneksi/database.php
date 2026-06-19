<?php

class Database
{
    private $host = "localhost";
    private $dbName = "db_simulasi_pbo_trpl1a_ahmadfakhriabdullah";
    private $username = "root";
    private $password = "";
    private $conn;

    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->dbName . ";charset=utf8mb4",
                $this->username,
                $this->password
            );

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo "Koneksi database gagal: " . $e->getMessage();
        }

        return $this->conn;
    }
}