<?php

include '../DataBase/Connection.php';
include '../Context/orm.php';
include 'users.php';
include 'admin.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $database = new Database();
    $found = $database->verificarDriver();
    $response = array('status' => 0, 'message' => '');

    if (!$found) {
        $response['status'] = 1;
        $response['message'] = 'Error al conectar a la base de datos. Driver no encontrado';
        echo json_encode($response);
        exit; // Database error;
    }

    $conn = $database->getConnection();
    if (!$conn) {
        $response['status'] = 1;
        $response['message'] = 'Error al conectar a la base de datos.';
        echo json_encode($response);
        exit; // Database error;
    }

    $user_model = new User($conn);
    $admin_model = new Admin($conn);

    $email = $_POST['user-email'];

    // Validations for email value
    if (strlen($email) < 1) {
        $response['status'] = 1;
        $response['message'] = 'El correo electronico no puede estar vacio';
        echo json_encode($response);
        exit; // Email cant be empty
    }

    $userEmail = filter_var($email, FILTER_SANITIZE_EMAIL);

    if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        $response['status'] = 1;
        $response['message'] = 'El correo electronico proporcionado no es valido';
        echo json_encode($response);
        exit; // It is not a valid email
    }

    $password = $_POST['password'];

    // Validations for password value
    if (strlen($password) < 8) {
        $response['status'] = 1;
        $response['message'] = 'La contraseña debe de contener al menos 8 caracteres';
        echo json_encode($response);
        exit; // Password has to be greater than 8 characters
    }

    // If the checkbox is checked, the login would be as an admin
    $loginAsAdmin = filter_var($_POST['admin-login'], FILTER_VALIDATE_BOOLEAN);;

    $data = 'email = "' . $email . '"';

    if ($loginAsAdmin) {
        $user = $admin_model->getByData($data);
    } else {
        $user = $user_model->getByData($data);
    }

    if ($user == null) {
        $response['status'] = 1;
        $response['message'] = 'El usuario especificado no se encuentra registrado';
        echo json_encode($response);
        exit; // The user does not exist in the database
    }

    // Password check encryption
    $correctPassword = password_verify($password, $user['password']);

    // If password hash does not match, then password is incorrect
    if (!$correctPassword) {
        $response['status'] = 1;
        $response['message'] = 'La contraseña es incorrecta';
        echo json_encode($response);
        exit; // Password is not correct
    }

    // The session has to be created before return to main page
    $_SESSION['usr'] = array(
        'nombre' => $user['nombre'],
        'apellido' => $user['apellido'],
        'email' => $user['email']
    );

    // If the user exists, it has to be redirected to the home page for every
    // kind of user
    if ($loginAsAdmin) {
        $response['status'] = 0;
        $response['message'] = '';
        echo json_encode($response);
        exit; // The user exist in the database
    } else {
        $response['status'] = 0;
        $response['message'] = '';
        echo json_encode($response);
        exit; // The user exist in the database
    }
}
