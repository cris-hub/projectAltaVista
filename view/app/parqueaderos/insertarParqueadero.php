<?php

include_once("../../../config/context.php");
require_once(FOLDER_PROJECT . "/model/Parqueadero.php");

try {
    $parq = new Parqueadero();
    $id = $_POST['id'];
    $estado = "Desocupado";
    $resultado = $parq->registrar($id, $estado);
    echo "Registro satisfactorio";
        echo "<script>alert('Registro actualizado satisfactoriamente'); window.location.href='listarParqueaderos.php';</script>";
} catch (Exception $exc) {
    echo "<script>alert('Fallo el registro'); window.location.href='listarParqueaderos.php';</script>";
echo $exc->getTraceAsString();
}




