<?php


require_once(FOLDER_PROJECT."/config/context.php");
require_once(FOLDER_PROJECT . "/model/Apartamento.php");



$apartamento = new Apartamento();
$apartachos = $apartamento->consultar();




