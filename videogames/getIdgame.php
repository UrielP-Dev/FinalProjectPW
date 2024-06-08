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
        $game = $GameModelo->getById($id);
        
        if ($game) {
            header('Content-Type: application/json');
            $data = array(); 
            $data['game'] = $game; // Asegúrate de que $game esté bien asignado
            
            echo json_encode($data);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'No se encontró el juego con ese ID.']);
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
