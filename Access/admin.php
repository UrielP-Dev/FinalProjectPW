<?php

class admin extends orm
{
    function __construct(PDO $dbName)
    {
        parent::__construct('id', 'admins', $dbName);
    }
}
