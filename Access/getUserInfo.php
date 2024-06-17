<?php
session_start();

if (isset($_SESSION['usr'])) {
    echo json_encode($_SESSION['usr']);
} else {
    echo json_encode(array('error' => 'No hay información de usuario disponible.'));
}

