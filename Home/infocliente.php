<?php
include '../Context/orm.php';
include '../DataBase/Connection.php';
include '../Access/users.php';

$db = new Database();
$encontrado = $db->verificarDriver();

if ($encontrado) {
    $cnn = $db->getConnection();
    $UserModelo = new user($cnn);
    $user = $UserModelo->getById(1);
    if ($user == null) {
        print("No hay un usuario con ese ID:");
    } else {
        print("================<br>");
        print("Usuario <br>");
        print("================<br>");
        print("ID: " . $user['id'] . "<br>");
        print("Nombre: " . $user['nombre'] . "<br>");
        print("Apellido: " . $user['apellido'] . "<br>");
        print("Email: " . $user['email'] . "<br>");
    }
}
?>
