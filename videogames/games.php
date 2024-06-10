<?php

class Game extends orm {
function __construct(PDO $dbName){
    parent::__construct('id','videogames', $dbName);
}

}