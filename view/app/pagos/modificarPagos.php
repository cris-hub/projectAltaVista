<?php

include_once("../../../config/context.php");
require_once(FOLDER_PROJECT . "/model/Pago.php");

$cedula = $_POST['id_pagos'];
$email = $_POST['id_apartamento'];
$nombres = $_POST['tipo_pago'];
$apellidos = $_POST['referencia'];
$contrasena = $_POST['valor'];
$fecha = $_POST['fecha'];
$fecha = $_POST['$estado'];



if (isset($_POST['registrar'])) {

    print_r($_POST);
    $usuario = new Usuario();
    try {
        $usuario->actualizar($cedula, $nombres, $apellidos, $fecha, $email, $contrasena);
        echo '<script language="javascript">alert("Actualizacion exitoso");</script>';
        header('location: listarResidentes.php');
    } catch (Exception $exc) {
        echo '<script language="javascript">alert("Ocurrieron problemas y no se pudo actualizar");</script>' . $exc->getTraceAsString();
        header('location: listarResidentes.php');
    }
}

