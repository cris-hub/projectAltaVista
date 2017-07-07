<?php

include_once("../../../config/context.php");
include(FOLDER_VIEW . "/template/head.php");
include(FOLDER_VIEW . "/template/scriptsModels.php");
require_once(FOLDER_PROJECT . "/model/Vehiculo.php");


$id = null;
$use = $_POST['user'];
$tipo = $_POST['tipo'];
$marca = $_POST['marca'];
$placa = $_POST['placa'];




if (isset($_POST['registrar'])) {

    $vehiculo = new Vehiculo();
    try {
        $vehiculo->registrar($id, $use, $tipo, $marca, $placa);
        echo "<script>alertify.alert('Vehiculo Registrado', 'Vehiculo registrado satisfactoriamente!', function(){ alertify.success('Ok'); });  window.location.href='listarVehiculo.php';</script>";
    } catch (Exception $exc) {

        echo "<script>alert('El registro no se pudo actualizar'); window.location.href='listarVehiculo.php';</script>";
    }
}