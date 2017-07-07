<?php
include_once("../../../config/context.php");
require_once(FOLDER_PROJECT . "/model/Parqueadero.php");
require_once(FOLDER_PROJECT . "/model/Solicitud.php");

$estadopago=$_GET['id'];
$estadosolicitud=$_GET['po'];
$idparqueader=$_GET['par'];
$idsolicitud = $_GET['pla'];

if ($estadopago=='Al dia') {
    
    echo $estadosolicitud='Activo';
    $estadoparque= 'Ocupado';
    $parq = new Parqueadero();
    $qo = new Solicitud();
    $rel = $parq->cambiarEstadoAd($idparqueader,$estadoparque);  
    $km = $qo->cambiarEstado($idsolicitud,$estadosolicitud);  
    echo "<script>alert('Cambio de estado exitoso'); window.location.href='listarSolicitudA.php';</script>";

    
}elseif( $estadopago=='En observa'){
    
echo "<script>alert('El estado del pago es En observación y no se puede asignar aun un parqueadero'); window.location.href='listarSolicitudA.php';</script>";

    
    
}elseif($estadopago=='En Mora'){
    
echo $estadosolicitud='En Mora';

}

