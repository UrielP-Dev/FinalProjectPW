<?php
include '../Context/orm.php';
include '../DataBase/Connection.php';
include '../videogames/games.php';

$db = new Database();
$encontrado = $db->verificarDriver();

if ($encontrado) {
    $cnn = $db->getConnection();
    $GameModelo = new Game($cnn);
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $update = [];
        $update['titulo'] = $_POST['titulo'];
        $update['desarrollador'] = $_POST['desarrollador'];
        $update['fecha_lanzamiento'] = $_POST['fecha_lanzamiento'];
        $update['genero'] = $_POST['genero'];
        $update['plataformas'] = $_POST['plataformas'];
        $update['puntuacion'] = $_POST['puntuacion'];
        $update['descripcion'] = $_POST['descripcion'];
        $id = $_POST['id']; // ID del juego a actualizar
    
        if ($GameModelo->updateById($id, $update)) {
            echo "Juego actualizado exitosamente";
        } else {
            echo "Error al actualizar el juego";
        }
    }
    
}
?>
