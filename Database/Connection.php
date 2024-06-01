<?php
class Database
{
    private $connection;
    public function __construct()
    {
    }

    public function verificarDriver()
    {
        $miArray = (PDO::getAvailableDrivers());
        $encontrado = false;
        foreach ($miArray as $n) {
            if ($n == 'mysql') {
                $encontrado = true;
                break;
            }
        }
        return $encontrado;
    }

    public function getConnection()
    {
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        $dsn = "mysql:host=localhost;dbname=vgstore";
        $user = "root";
        $password = "";
        $this->connection = new PDO($dsn, $user, $password, $options);
        $this->connection->exec("SET CHARACTER SET UTF8");
        return $this->connection;
    }
}
