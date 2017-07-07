<?php

include_once("../../../config/context.php");
require_once(FOLDER_PROJECT . "/model/Usuario.php");

$pago = new Usuario();
$ced = $_GET['id'];

$result=$pago->consultarId($ced);
if ($result==null) {
    echo "La consulta a la base de datos, fallo";
}


