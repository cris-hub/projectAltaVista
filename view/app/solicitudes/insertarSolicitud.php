<?php


include_once("../../../config/context.php");
require_once(FOLDER_PROJECT . "/model/Solicitud.php");

$idv = $_POST['vehiculo'];
$idp = $_POST['parqueadero'];
$fe = $_POST['fecha'];
$es = 'Pendiente';

try {
    $soli = new Solicitud();
    $resul = $soli->registrar($idv, $idp, $fe, $es);
    echo " Registro Satisfactorio";    
#echo "<script>alert('Registro actualizado satisfactoriamente'); window.location.href='listarSolicitudes.php';</script>";

} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}

