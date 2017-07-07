<?php

include_once("../../../config/context.php");
include("funcionesimg.php");
require_once(FOLDER_PROJECT . "/model/Pago.php");
require_once(FOLDER_PROJECT . "/model/Pago.php");
require_once(FOLDER_PROJECT . "/model/UsuarioHasApartamento.php");

session_start();

$id = $_SESSION['cedula'];


$pago = new Pago();
$usuariohas = new UsuarioHasApartamento();


$resl= $usuariohas->consultarId($id);

foreach ($resl as $value => $a) {
   $a['apartamentos_id_apartamentos'];
}
$apo=$a['apartamentos_id_apartamentos'];

 

$idap = $apo;
$ti = $_POST['tipo'];
$re = $_POST['referencia'];
$va = $_POST['valor'];
$fe =  $_POST['fecha'];
$es = "En observacion";




if (isset($_POST['registrar'])) {


    $vehiculo = new Pago();
    try {
        if ($_FILES['img']["error"] > 0) {
            echo "Error al cargar el archivo";
        } else {
            $permitidos = array("image/jpg", "image/jpeg", "image/png", "image/gif");
            $limite_kb = 1000;

            if (in_array($_FILES["img"]["type"], $permitidos) && $_FILES["img"]["size"] <= $limite_kb * 1024) {

                $ruta = 'files' .  '/'.$idap.'/';
                $archivo = $ruta . $_FILES["img"]["name"]=1;

                if (!file_exists($ruta)) {
                    mkdir($ruta);
                }
                if (!file_exists($archivo)) {

                    $resultado = @move_uploaded_file($_FILES["img"]["tmp_name"], $archivo);

                    if ($resultado) {
                        echo "Archivo Guardado Correctamente";
                    } else {

                        echo "No se guardo el archivo";
                    }
                } else {

                    echo "Archivo Ya existe";
                }
            } else {

                echo "Archivo no permitido por exeso de tamaño";
            }
        }

        $vehiculo->registrar($idap, $ti, $re, $va, $fe, $es);

        echo "<script>alert('Registro actualizado satisfactoriamente'); window.location.href='consultarPago.php';</script>";
    } catch (Exception $exc) {

        echo "<script>alert('El registro no se pudo actualizar'); window.location.href='consultarPago.php';</script>";
    }
}