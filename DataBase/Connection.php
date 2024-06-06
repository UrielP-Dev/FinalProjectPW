<?php
class Database {
    private $connection;

    public function __construct() {
        // Constructor vacío
    }

    public function verificarDriver() {
        $miArray = PDO::getAvailableDrivers();
        return in_array('mysql', $miArray);
    }

    public function getConnection() {
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        $dsn = "mysql:host=roundhouse.proxy.rlwy.net;port=11643;dbname=railway";
        $user = "root";
        $password = "gbKMxgNyjUPfXFIKSxgXxeyoKxePXYxJ";
        
        try {
            $this->connection = new PDO($dsn, $user, $password, $options);
            $this->connection->exec("SET CHARACTER SET UTF8");
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }

        return $this->connection;
    }
}
?>