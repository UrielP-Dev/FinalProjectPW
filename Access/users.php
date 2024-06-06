<?php

class User extends orm {
function __construct(PDO $dbName){
    parent::__construct('id','users', $dbName);
}

}