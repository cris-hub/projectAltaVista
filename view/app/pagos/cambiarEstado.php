<?php

include_once("../../../config/context.php");
require_once(FOLDER_PROJECT . "/model/Pago.php");

$pago = new Pago();
$ced = $_GET['id'];
$es = $_GET['es'];
$est = 'Al dia';




if ($es == $est) {
    try {

        $est = 'En Mora';
        $pago->estado($ced, $est);
        header('location: listarPago.php');
        echo '<script type="text/javascript">alert("Actualizacion exitoso");</script>';
    } catch (Exception $exc) {
        echo "Se produjo un error al bloquear el usuario" . $exc->getTraceAsString();
    }
} else {
    try {
        $est = 'Al dia';
        $pago->estado($ced, $est);
        header('location: listarPago.php');
        echo '<script type="text/javascript">alert("Actualizacion exitoso");</script>';
    } catch (Exception $exc) {
        echo "Se produjo un error al activar el usuario" . $exc->getTraceAsString();
    }
}

