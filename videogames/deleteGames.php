<?php
include '../Context/orm.php';
include '../DataBase/Connection.php';
include 'games.php';

$db = new Database();
$encontrado = $db->verificarDriver();

if ($encontrado) {
    $cnn = $db->getConnection();
    $GameModelo = new Game($cnn);
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $resultado = $GameModelo->deleteById($id);
        
        header('Content-Type: application/json');
        
        if ($resultado) {
            echo json_encode(['success' => 'Juego eliminado exitosamente.']);
        } else {
            echo json_encode(['error' => 'No se encontró el juego con ese ID o no se pudo eliminar.']);
        }
    } else {
        header('Content-Type: application/json');
        echo json_encode(['error' => 'ID no especificado.']);
    }
} else {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Fallo la conexión a la base de datos.']);
}
?>

