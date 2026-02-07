<?php
class Database {
    private $host = "localhost";
    private $db_name = "gardening_project";
    private $username = "alexis";
    private $password = "твой_пароль_здесь"; // ← замени на свой пароль!
    private $conn;

    public function getConnection() {
        $this->conn = null;
        
        try {
            $this->conn = new PDO(
                "pgsql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8",
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]
            );
        } catch(PDOException $exception) {
            error_log("Ошибка подключения к БД: " . $exception->getMessage());
            die("Ошибка подключения к базе данных. Проверьте логи.");
        }
        
        return $this->conn;
    }
}
?>