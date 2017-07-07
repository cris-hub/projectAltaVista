<?php

include_once("../../../config/context.php");
require_once(FOLDER_PROJECT . "/model/Usuario.php");

$cedula = $_POST['cedula'];
$email = $_POST['email'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$contrasena = $_POST['contrasena'];
$fecha = $_POST['fecha'];


if (isset($_POST['registrar'])) {
    
    print_r($_POST);
    $usuario= new Usuario();
    try {
        $usuario->actualizar($cedula, $nombres, $apellidos, $fecha, $email, $contrasena);
        echo  '<script language="javascript">alert("Actualizacion exitoso");</script>'; 
        header('location: listarResidentes.php');
        
    } catch (Exception $exc) {
        echo '<script language="javascript">alert("Ocurrieron problemas y no se pudo actualizar");</script>' . $exc->getTraceAsString();
        header('location: listarResidentes.php');
    }
    
   
    
}

