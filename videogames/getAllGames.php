<?php
include '../Context/orm.php';
include '../DataBase/Connection.php';
include '../videogames/games.php';

$db = new Database();
$encontrado = $db->verificarDriver();

if ($encontrado) {
    $cnn = $db->getConnection();
    $GameModelo = new Game($cnn);
    $games = $GameModelo->getAll();
    
    $data = array(); // Inicializa $data como un array
    $data['games'] = $games; // Asigna el contenido de $games a $data
    
    echo json_encode($data);
}
?>
