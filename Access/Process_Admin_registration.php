<?php
// Incluye los archivos necesarios
include '../Context/orm.php';
include '../DataBase/Connection.php';
include 'admin.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validar que la contraseña tenga al menos 8 caracteres
    if (strlen($password) < 8) {
        echo "Error: La contraseña debe tener al menos 8 caracteres.";
        exit;
    }

    // Validar formato de correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Error: El formato del correo electrónico no es válido.";
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_BCRYPT); // Hash de la contraseña

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
        'password' => $hashed_password,
    ];

    // Insertar los datos en la tabla admins
    $success = $admin->insert($data);

    if ($success) {
        echo "Success"; // Mensaje que el JavaScript interpretará como éxito
    } else {
        echo "Error: No se pudo registrar el administrador. Por favor, intente nuevamente.";
    }
} else {
    echo "Error: Método de solicitud inválido.";
}
?>
