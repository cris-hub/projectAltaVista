<?php
include_once("../../../config/context.php");
require_once(FOLDER_PROJECT . "/model/Usuario.php");

$pago = new Usuario();
$ced = $_GET['id'];
$es =$_GET['es'];
$est='Activo';




if ($es==$est) {
    try {
        
        $est = 'Bloqueado';
        $pago->bloquear($ced, $est);
        echo "Bloqueo exitoso";
        header('location: listarResidentes.php');
    } catch (Exception $exc) {
        echo "Se produjo un error al bloquear el usuario".$exc->getTraceAsString();
    }

} else{
    try {
        $est = 'Activo';
        $pago->bloquear($ced, $est);
        echo "Activación exitoso";
        header('location: listarResidentes.php');
    } catch (Exception $exc) {
        echo "Se produjo un error al activar el usuario".$exc->getTraceAsString();
    }
    
    
}

