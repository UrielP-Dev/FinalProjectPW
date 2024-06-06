<?php
// Incluye los archivos necesarios
include '../Context/orm.php';
include '../DataBase/Connection.php';
include 'users.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibe los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash de la contraseña

    // Conectar a la base de datos
    $database = new Database();
    $db = $database->getConnection();

    // Crear una instancia de la clase User
    $user = new User($db);

    // Datos a insertar
    $data = [
        'nombre' => $nombre,
        'apellido' => $apellido,
        'email' => $email,
        'password' => $password
    ];

    // Insertar los datos en la tabla users
    $succes = $user->insert($data);

    if ($succes) {
        header("Location: SignUpSuccess.php");
        exit();
    } else {
        echo "Error al registrar el usuario.";
    }
} else {
    echo "Método de solicitud no válido.";
}

