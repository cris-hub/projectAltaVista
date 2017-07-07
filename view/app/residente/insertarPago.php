<?php

include_once("../../../config/context.php");
include(FOLDER_VIEW . "/template/head.php");
include(FOLDER_VIEW . "/template/scriptsModels.php");
require_once(FOLDER_PROJECT . "/model/Pago.php");
require_once(FOLDER_PROJECT . "/model/Pago.php");
require_once(FOLDER_PROJECT . "/model/UsuarioHasApartamento.php");

session_start();

$id = $_SESSION['cedula'];


$pago = new Pago();
$usuariohas = new UsuarioHasApartamento();

$resl = $usuariohas->consultarId($id);

foreach ($resl as $value => $a) {
    $a['apartamentos_id_apartamentos'];
}
$apo = $a['apartamentos_id_apartamentos'];



$idap = $apo;
$ti = $_POST['tipo'];
$re = $_POST['referencia'];
$va = $_POST['valor'];
$fe = $_POST['fecha'];
$es = "En observacion";





if (isset($_POST['registrar'])) {

    $vehiculo = new Pago();
    try {
        $vehiculo->registrar($idap, $ti, $re, $va, $fe, $es);
        echo "<script>alertify.alert('Pago Registrado', 'Pago registrado satisfactoriamente!', function(){ alertify.success('Ok'); });  window.location.href='consultarPago.php';</script>";
    } catch (Exception $exc) {

        echo "<script>alert('El registro no se pudo actualizar'); window.location.href='consultarPago.php';</script>";
    }
}