<?php

include_once("../../../config/context.php");
require_once(FOLDER_PROJECT . "/model/Pago.php");
require_once(FOLDER_PROJECT . "/model/Pago.php");
require_once(FOLDER_PROJECT . "/model/UsuarioHasApartamento.php");

session_start();

$id=$_SESSION['cedula'];


$pago= new Pago();
$usuariohas= new UsuarioHasApartamento();

$resl= $usuariohas->consultarId($id);

foreach ($resl as $value => $a) {
   $a['apartamentos_id_apartamentos'];
}
$apo=$a['apartamentos_id_apartamentos'];


$id = null;
$idap = $apo;
$ti = $_POST['tipo'];
$re = $_POST['referencia'];
$va = $_POST['valor'];
$fe =  $_POST['fecha'];
$es = "En observacion";
$url = null;




if (isset($_POST['registrar'])) {

    $vehiculo = new Pago();
    try {
        $vehiculo->registrar($id, $idap, $ti, $re, $va, $fe, $es, $url);
       
       # echo "<script>alert('Registro actualizado satisfactoriamente'); window.location.href='consultarPago.php';</script>";
    } catch (Exception $exc) {
     
       # echo "<script>alert('El registro no se pudo actualizar'); window.location.href='consultarPago.php';</script>";
    }
}