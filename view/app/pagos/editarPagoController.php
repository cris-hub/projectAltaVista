<?php

include_once("../../../config/context.php");
require_once(FOLDER_PROJECT . "/model/Pago.php");

$pago = new Pago();
$ced = $_GET['id'];

$resultado = $pago->mostrarPago($ced);
if ($resultado == null) {
    echo "La consulta a la base de datos, fallo";
}


