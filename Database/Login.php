<?php

require_once('Connection.php');
require_once('../Context/orm.php');
require_once('../Access/users.php');

$db = new Database();
$found = $db->verificarDriver();

if (!$found) {
    return;
}

$conn = $db->getConnection();
$user_model = new User($conn);

$login = $_POST['username'];
$password = sha1($_POST['password']);
$data = 'login = "' . $login . '" AND pwd = "' . $password . '"';
$user = $user_model->check_login($data);

if (!$user) {
    require_once("../index.php");
    return;
}

$usr = $user['nombre'];
$_SESSION['usr'] = $usr;
$rol = $user['rol'];
if ($rol == 'Cliente') {
    require_once('../Home/HomeClient.php');
} else {
    require_once '../Home/HomeAdmin.php';
}
