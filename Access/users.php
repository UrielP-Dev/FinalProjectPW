<?php

class User extends orm
{
    function __construct(PDO $connection)
    {
        parent::__construct('id', 'usuarios', $connection);
    }

    function check_login($data)
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
