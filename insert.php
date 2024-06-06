<?php
class MiBaseDeDatos {
    private $host = 'localhost';  // Cambia esto si tu servidor de base de datos no está en el mismo servidor
    private $db = 'vgstore';
    private $user = 'root';  // Cambia esto por tu usuario de MySQL
    private $pass = '';  // Cambia esto por tu contraseña de MySQL
    private $charset = 'utf8mb4';
    private $pdo;

    public function __construct() {
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function insertarParametros($parametro1, $parametro2) {
        $sql = "INSERT INTO mi_tabla (parametro1, parametro2) VALUES (:parametro1, :parametro2)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['parametro1' => $parametro1, 'parametro2' => $parametro2]);
    }
}

// Ejemplo de uso
$db = new MiBaseDeDatos();
$db->insertarParametros('valor1', 'valor2');

