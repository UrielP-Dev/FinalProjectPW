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
    $insertar['titulo'] = 'Among Us';
    $insertar['desarrollador'] ='InnerSloth';
    $insertar['fecha_lanzamiento']= '2018-06-15';
    $insertar['genero'] = 'Party, Multijugador';
    $insertar['plataformas'] ='PC, iOS, Android, Nintendo Switch';
    $insertar['puntuacion']= 8.5;
    $insertar['descripcion']= 'Un juego multijugador en el que los jugadores asumen el papel de tripulantes en una nave espacial, completando tareas mientras intentan descubrir a los impostores entre ellos que intentan sabotear y matar a la tripulación.';

    if ($GameModelo->insert($insertar)) {
        echo "<br> game insertado";
    }
}
?>