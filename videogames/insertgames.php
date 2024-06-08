<?php
include '../Context/orm.php';
include '../DataBase/Connection.php';
include '../videogames/games.php';

$db=new Database();
$encontrado = $db->verificarDriver();

if ($encontrado){
    $cnn = $db->getConnection();
    $GameModelo = new Game($cnn);
    $insertar=[];
    $insertar['titulo'] = 'The Witcher 3: Wild Hunt';
    $insertar['desarrollador'] ='CD Projekt Red';
    $insertar['fecha_lanzamiento']= '2015-05-19';
    $insertar['genero'] = 'RPG';
    $insertar['plataformas'] ='PC, PS4, Xbox One';
    $insertar['puntuacion']= 9.5;
    $insertar['descripcion']= 'Un juego de rol ambientado en un vasto mundo de fantasía, donde los jugadores controlan al cazador de monstruos Geralt de Rivia, explorando diversas regiones, tomando decisiones morales y luchando contra enemigos poderoso';

    if ($GameModelo->insert($insertar)) {
        echo "<br> game insertado";
    }
}
?>