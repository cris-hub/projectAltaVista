<?php


require_once(FOLDER_PROJECT."/config/context.php");
require_once(FOLDER_PROJECT . "/model/Vehiculo.php");



$vehiculo = new Vehiculo();
$resultado = $vehiculo->consultar();




