<?php

include_once("../../../config/context.php");
include(FOLDER_VIEW . "/template/head.php");
include(FOLDER_VIEW . "/template/scriptsModels.php");
require_once(FOLDER_PROJECT . "/model/Parqueadero.php");

try {
    $parq = new Parqueadero();
    $id = $_POST['id'];
    $estado = "Desocupado";
    $resultado = $parq->registrar($id, $estado);
    echo "Registro satisfactorio";
    echo "<script>alertify.alert('Parqueadero Registrado', 'Parqueadero registrado satisfactoriamente!', function(){ alertify.success('Ok'); });  window.location.href='listarParqueaderos.php';</script>";
} catch (Exception $exc) {
    echo "<script>alert('Fallo el registro'); window.location.href='listarParqueaderos.php';</script>";
    echo $exc->getTraceAsString();
}




