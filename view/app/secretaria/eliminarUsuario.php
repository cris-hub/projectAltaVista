<?php

include_once("../../../config/context.php");
require_once(FOLDER_PROJECT . "/model/Usuario.php");

$pago = new Usuario();
$ced = $_GET['id'];

try {
    $result = $pago->eliminar($ced);

    echo "Eliminación exitosa";
    header('location: listarResidentes.php');
} catch (Exception $exc) {
    echo "No se pudo eliminar el usuario". $exc->getTraceAsString();
}



