<?php
// Incluye los archivos necesarios
include '../Context/orm.php';
include '../DataBase/Connection.php';
include 'admin.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash de la contraseña

    // Conectar a la base de datos
    $database = new Database();
    $db = $database->getConnection();

    // Crear una instancia de la clase Admin
    $admin = new Admin($db);

    // Datos a insertar
    $data = [
        'nombre' => $nombre,
        'apellido' => $apellido,
        'email' => $email,
        'password' => $password,
    ];

    // Insertar los datos en la tabla admins
    $success = $admin->insert($data);

    if ($success) {
        echo "Success"; // Mensaje que el JavaScript interpretará como éxito
    } else {
        echo "Error"; // Mensaje que el JavaScript interpretará como error
    }
} else {
    echo "Invalid request method.";
}
?>
