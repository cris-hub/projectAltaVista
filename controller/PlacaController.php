<?php

require_once(FOLDER_PROJECT."/config/context.php");
require_once(FOLDER_PROJECT . "/model/Vehiculo.php");



$usuario = new Vehiculo();
$resultado = $usuario->consultar();


