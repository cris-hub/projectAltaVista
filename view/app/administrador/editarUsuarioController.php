<?php

include_once("../../../config/context.php");
require_once(FOLDER_PROJECT . "/model/Usuario.php");

$user = new Usuario();
$ced = $_GET['id'];

$result = $user->consultarId($ced);
if ($result == null) {
    echo "La consulta a la base de datos, fallo";
}


