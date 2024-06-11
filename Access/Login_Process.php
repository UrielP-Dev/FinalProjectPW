<?php

include('../Database/Connection.php');
include('../Context/orm.php');
include('users.php');
include('admin.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $db = new Database();
    $found = $db->verificarDriver();
    $response = array('status' => 0, 'message' => '');

    if (!$found) {
        return;
    }

    $conn = $db->getConnection();
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

    // Password encryption
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // If the checkbox is checked, the login would be as an admin
    $loginAsAdmin = filter_has_var(INPUT_POST, 'admin-login');

    $data = 'email = "' . $email . '" AND password = "' . $password . '"';

    if ($loginAsAdmin) {
        $user = $admin_model->getByData($data);
    } else {
        $user = $user_model->getByData($data);
    }

    if (!$user) {
        $response['status'] = 1;
        $response['message'] = 'El usuario especificado no se encuentra registrado';
        echo json_encode($response);
        exit; // The user does not exist in the database
    }

    // If the user exists, it has to be redirected to the home page for every
    // kind of user
    if ($loginAsAdmin) {
        $response['status'] = 0;
        $response['message'] = 'El usuario especificado es administrador';
        echo json_encode($response);
        exit; // The user exist in the database
    } else {
        $response['status'] = 0;
        $response['message'] = 'El usuario especificado es un usuario comun';
        echo json_encode($response);
        exit; // The user exist in the database
    }
}
