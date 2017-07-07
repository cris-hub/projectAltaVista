<?php
require_once(FOLDER_PROJECT."/config/context.php");
require_once(FOLDER_PROJECT . "/model/Parqueadero.php");



$parqueadero = new Parqueadero();
$resultado = $parqueadero->consultar();

