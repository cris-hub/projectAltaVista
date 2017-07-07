<?php

include_once("../../../config/context.php");
require_once(FOLDER_PROJECT . "/model/Usuario.php");
require_once(FOLDER_PROJECT . "/model/UsuarioHasApartamento.php");
require_once(FOLDER_PROJECT . "/model/UsuarioHasRol.php");

$cedula = $_POST['cedula'];
$email = $_POST['email'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$estado = "Activo";
$contrasena = $_POST['contrasena'];
$fecha = $_POST['fecha'];
$apartamentos = $_POST['apartamentos'];
$propietario = $_POST['propietario'];
$residente = $_POST['residente'];
$rol=2;



if (isset($_POST['registrar'])) {

    if (isset($propietario) && isset($residente)) {

        $propietario = "SI";
        $residente = "SI";
    } elseif (isset($propietario)) {

        $propietario = "SI";
        $residente = "NO";
    } elseif (isset($residente)) {
        $propietario = "NO";
        $residente = "SI";
    }

     
      
      
    
    $usuario = new Usuario();
    $usuhasapa = new UsuarioHasApartamento();
    $roles = new UsuarioHasRol();
    
   

    try {
        $usuario->registrar($cedula, $nombres, $apellidos, $fecha, $email, $estado, $contrasena);
        $usuhasapa->registrar($cedula, $apartamentos, $residente, $propietario);
        $roles->registrar($cedula, $rol);
       echo "Registro satisfactorio";
        echo "<script>alert('Registro actualizado satisfactoriamente'); window.location.href='listarResidentes.php';</script>";
    } catch (Exception $exc) {
        echo "Fallo registro";
        echo "<script>alert('El registro no se pudo actualizar'); window.location.href='listarResidentes.php';</script>";
    }
}