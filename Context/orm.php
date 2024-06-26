<?php
class orm
{
    protected $id;
    protected $table;
    protected $db;

    function __construct($id, $table, PDO $conn)
    {
        $this->id = $id;
        $this->table = $table;
        $this->db = $conn;
    }

    function getAll()
    {
        $sql = "SELECT * FROM {$this->table}";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }
    public function getHalf()
    {
        $sql = "SELECT id, titulo, desarrollador, fecha_lanzamiento FROM {$this->table}";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function getById($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id={$id}";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetch();
    }

    function DeleteById($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id={$id}";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        if ($stm->rowCount() > 0) {
            $succes = true;
            return $succes;
        }
    }

    function updateById($id, $data)
    {
        $sql = "UPDATE {$this->table} SET";
        foreach ($data as $key => $value) {
            $sql .= " {$key} = :{$key}, ";
        }

        $fin = strrpos("$sql", ",");
        $sql = substr($sql, 0, $fin);
        $sql .= " WHERE id = :id";

        $data['id'] = $id;
        $stm = $this->db->prepare($sql);

        $succes = false;
        try {
            $succes = $stm->execute($data);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $succes;
    }

    function insert($data)
    {
        $sql = "INSERT INTO {$this->table} (";
        foreach ($data as $key => $value) {
            $sql .= " {$key}, ";
        }

        $fin = strrpos("$sql", ",");
        $sql = substr($sql, 0, $fin);
        $sql .= ") VALUES (";
        foreach ($data as $key => $value) {
            $sql .= ":{$key}, ";
        }
        $fin = strrpos("$sql", ",");
        $sql = substr($sql, 0, $fin);
        $sql .= ")";
        $stm = $this->db->prepare($sql);
        $succes = false;
        try {
            $succes = $stm->execute($data);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $succes;
    }

    function getByData($data)
    {
        $sql = "SELECT * FROM ($this->table) WHERE " . $data;
        $stm = $this->db->prepare($sql);
        try {
            $stm->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $stm->fetch();
    }
}
