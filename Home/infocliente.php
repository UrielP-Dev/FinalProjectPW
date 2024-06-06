<?php
require_once('\DataBase\Connection.php');
require_once('\Context\orm.php');
require_once('\Access\users.php');

$db=new Database();
$encontrado = $db->verificarDriver();

if ($encontrado) {
    $cnn = $db->getConnection();
    $UserModelo = new users($cnn);
    $users = $UserModelo->getById(3);
    if($users == null)
    print("No hay un usuario con ese ID:");
    else{
    foreach($materias as $mat){
        print("================<br>");
        print("Materia <br>");
        print("================<br>");
        print("ID: ".$materias['ID']."<br>");
        print("Nombre: ".$materias['nombre_mat']."<br>");
        print("Creditos: ".$materias['creditos']."<br>");
        print("Horas: ".$materias['horas_sem']."<br>");
    }
    }
}
