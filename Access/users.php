<?php

class User extends orm
{
    function __construct(PDO $connection)
    {
        parent::__construct('id', 'usuarios', $connection);
    }
}
