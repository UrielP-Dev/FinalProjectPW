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
        $insertar = [];
        $insertar['titulo'] = $_POST['titulo'];
        $insertar['desarrollador'] = $_POST['desarrollador'];
        $insertar['fecha_lanzamiento'] = $_POST['fecha_lanzamiento'];
        $insertar['genero'] = $_POST['genero'];
        $insertar['plataformas'] = $_POST['plataformas'];
        $insertar['puntuacion'] = $_POST['puntuacion'];
        $insertar['descripcion'] = $_POST['descripcion'];

        if ($GameModelo->insert($insertar)) {
            echo "Juego insertado exitosamente";
        } else {
            echo "Error al insertar el juego";
        }
    }
} else {
    echo "Fallo la conexión a la base de datos.";
}
?>
