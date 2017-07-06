<?php

include_once("../../../config/context.php");
require_once(FOLDER_PROJECT . "/model/Usuario.php");

$cedula = $_POST['cedula'];
$email = $_POST['email'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$estado="Activo";
$contrasena = $_POST['contrasena'];
$fecha = $_POST['fecha'];

print_r($_POST);

if (isset($_POST['registrar'])) {
    
    $usuario= new Usuario();
    
    try {
        $usuario->registrar($cedula, $nombres, $apellidos, $fecha, $email, $estado, $contrasena);
        echo "Registro exitoso";
    } catch (Exception $exc) {
        echo "Ocurrieron problemas y no se pudo registrar" . $exc->getTraceAsString();
    }

    
}