<?php
include '../Context/orm.php';
include '../DataBase/Connection.php';
include '../videogames/games.php';

$db = new Database();
$encontrado = $db->verificarDriver();

if ($encontrado) {
    $cnn = $db->getConnection();
    $GameModelo = new Game($cnn);
    $game = $GameModelo->getById(1);
    if ($game == null) {
        print("No hay un juego con ese ID:");
    } else {
        print("================<br>");
        print("Juego <br>");
        print("================<br>");
        print("ID: " . $game['id'] . "<br>");
        print("Nombre: " . $game['titulo'] . "<br>");
        print("Apellido: " . $game['desarrollador'] . "<br>");
        print("Email: " . $game['fecha_lanzamiento'] . "<br>");
    }
}

?>