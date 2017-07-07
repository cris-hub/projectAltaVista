<?php

require_once(FOLDER_PROJECT."/config/context.php");
require_once(FOLDER_PROJECT . "/model/Pago.php");
require_once(FOLDER_PROJECT . "/model/UsuarioHasApartamento.php");



$id=$_SESSION['cedula'];


$pago= new Pago();
$usuariohas= new UsuarioHasApartamento();

$resl= $usuariohas->consultarId($id);

foreach ($resl as $value => $a) {
   $a['apartamentos_id_apartamentos'];
}
$apo=$a['apartamentos_id_apartamentos'];



$resultado = $pago->consultarId($apo);


