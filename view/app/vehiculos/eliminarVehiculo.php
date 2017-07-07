<?php

include_once("../../../config/context.php");
require_once(FOLDER_PROJECT . "/model/Vehiculo.php");

$vehi = new Vehiculo();
$ced = $_GET['id'];

try {
    $result = $vehi->eliminar($ced);

    echo "Eliminación exitosa";
    header('location: listarVehiculo.php');
} catch (Exception $exc) {
    echo "No se pudo eliminar el usuario". $exc->getTraceAsString();
}



